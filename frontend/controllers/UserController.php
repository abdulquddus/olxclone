<?php

namespace frontend\controllers;

use Yii;
use frontend\models\User;
use frontend\models\UserSearch;
use frontend\models\User2;
use frontend\models\User2Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Password;
Use yii\helpers\ArrayHelper; 
use frontend\models\Details;
use frontend\models\Advertisement;
use frontend\models\AdsCredit;
use frontend\models\AdsCreditSearch;
use yii\web\Response;
use yii\db\Query;
use frontend\models\Conversation;
use frontend\models\Messages;
use common\components\paypal;
use yii\web\Session;
use mPDF;
use frontend\models\ConvStatus;
use yii\data\Pagination;
use app\models\UploadForm;
use yii\web\UploadedFile;
use backend\models\CreditPackages;
use backend\models\NewsletterSubscription;
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    
    
    
    public function actionDeleteuser()
    {
         $id = Yii::$app->user->getId();
         $sql="UPDATE `user` SET `status`=0 WHERE `id`='$id'";
          $sql = \Yii::$app->db->createCommand($sql)->execute();
      if($sql){
           Yii::$app->session->setFlash('success', 'User Deleted.');
           return $this->goHome();
          }else{
            Yii::$app->session->setFlash('success', 'User not Deleted.');
      }
    }
    
    
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }
    
    
    public function actionCopyad($id){
         if (\Yii::$app->user->isGuest) {
            return $this->goHome();
           }
          Yii::$app->session->setFlash('success', 'Creaeted new copy and pending form admin to approve ad');
        $request = Yii::$app->request;
//        if ($request->isAjax) {
       
            $model = \frontend\models\Advertisements::find()->where(['id'=>$id])->one();
            $clone = new \frontend\models\Advertisements();
            $clone->attributes = $model->attributes;
//            $clone->save();
            
            print_r($clone);
            if(  $clone->save()){
            echo $clone->id; }else{
                echo "not saved";
            }
           $modelimg = \frontend\models\Images::find()->where(['advertise_id'=>$id])->all();
//           echo "<pre>";
//           print_r($modelimg);
//           echo "</pre>";
//           if(!empty($model)){
               \yii\helpers\BaseFileHelper::copyDirectory('uploads/'.$model->id, 'uploads/'.$clone->id);
//               \yii\helpers\BaseFileHelper::copyDirectory($src, $dst)
           foreach($modelimg as $img){
                echo "<pre>";
                print_r($img->image);
                echo "</pre>";
            $clone2 = new \frontend\models\Images();
            $clone2->image = $img->image;
             $clone2->advertise_id = $clone->id;
//            $clone->save();
            if($clone2->save()){
                echo "img saved $clone2->image";
                
            }
           }
           
//           }
//        }
        
    }

    

    public function actionSetting()
    {
         if (\Yii::$app->user->isGuest) {
            return $this->goHome();
           }
//           $this->layout = 'main_login';
           
           //print_r($_REQUEST);
          
          $id = Yii::$app->user->getId();
          $pass_model = new Password();

          $detail_model = Details::findOne($id);
          $adscredit = new \frontend\models\CreditsDetails();
          $temp = $detail_model->img;
          if ($detail_model->load(Yii::$app->request->post()) && $detail_model->validate()) {
              $myimg = UploadedFile::getInstances($detail_model, 'img');

                   if(isset($myimg[0]->name)){
               $detail_model->imgu = UploadedFile::getInstances($detail_model, 'img');

               $detail_model->upload();
                   }else{
                       $detail_model->img = $temp;
                   }
                   
           
               
                       if(isset($_POST['state'])){ $detail_model->state = $_POST['state']; }
                        if(isset($_POST['city'])){  $detail_model->city = $_POST['city'];}
                       
                       
                      
                        
//                        $user_city = $_POST['city'];
//                        $id = Yii::$app->user->getId();

//                        $sql="UPDATE `user` SET `name`='$detail_model->name', `mobile`='$detail_model->mobile', `city`='$user_city' ,`state`='$detail_model->state',`address`='$detail_model->address' WHERE `id`='$id'";
//                        $sql = \Yii::$app->db->createCommand($sql)->execute();
                         if( $detail_model->save()){
                          Yii::$app->session->setFlash('success', 'User settings saved successfully.');
                         }else{
                           Yii::$app->session->setFlash('success', 'User settings not saved successfully.');
                         }
           
         
         }
         $pre_detail = \frontend\models\User::find()->where(['id'=>$id])->one();
         if ($pass_model->load(Yii::$app->request->post())) {
            
            $hash = Yii::$app->getSecurity()->generatePasswordHash($pass_model->password_hash);
      
            $id = Yii::$app->user->getId();
            $sql="UPDATE `user` SET `password_hash`='$hash' WHERE `id`='$id'";
            \Yii::$app->db->createCommand($sql)->execute();
           Yii::$app->session->setFlash('success', 'Your password has been updated successfully.');
          
         
         }
         
         
          if ($adscredit->load(Yii::$app->request->post())) {   
           $adscredit->created = date('Y-m-d');
           $adscredit->user_id = $id;
           $adscredit->save();

              Yii::$app->session->setFlash('success', 'Your password has been updated successfully.');
         }
          
         
         
         $array = \frontend\models\City::find()->all();
         $city = ArrayHelper::map($array, 'id', 'name'); 
         
         $packages = CreditPackages::find()->all();
         
         $array_region = \frontend\models\Region::find()->all();
         $state = ArrayHelper::map($array_region, 'id', 'name');
         $conversation = new Conversation();
          $conversation_data = Conversation::find()->where(['from'=>yii::$app->user->id])->
                  orWhere(['to'=>yii::$app->user->id])->orderBy(['id' => SORT_ASC]);
          
//              $search = \backend\models\Advertisement::find()->
//              where(['status'=>1])->
//              andWhere($category)->
//              andWhere($category_filters)->
//              andWhere($max_price)->
//              andWhere($min_price)->
//              andWhere($created)->
//              andWhere($condition)->
//              andWhere($type)->
//              andWhere($city)->
//              andWhere($key)->
//              orderBy($order_by);
//    
          $count = $conversation_data->count();
          $pagination = new Pagination(['totalCount'=>$count, 'pageSize'=>20]);
          $conversation_ids=$conversation_data->offset($pagination->offset)->limit($pagination->limit)->all();
  
          
          if(empty($conversation_ids)){
//           $conversation_ids = Conversation::find()->where(['to'=>yii::$app->user->id])->all();
          }
//          echo"<pre>";
//          print_r($conversation_ids); echo "</pre>";exit();
//        $inbox=  \backend\models\Messages::find()->where(['conv_id'=>$conversation_ids->id])->all();
        $sent=  \backend\models\Messages::find()->where(['from'=>$id])->andWhere(['from_deleted'=>0])->all();
        $addin=[];
        $receiveri=[];
        $senderi=[];
//         foreach($inbox as $ads){
//             
//             $addin=  \backend\models\Advertisement::find()->where(['id'=>$ads->ad_id])->one();
//             $receiveri= User::find()->where(['id'=>$ads->to])->one();
//             $senderi= User::find()->where(['id'=>$ads->from])->one();
//         }
         $addse=[];
         $receivero=[];
        $sendero=[];
         foreach($sent as $adssent){
        
             $addse=  \backend\models\Advertisement::find()->where(['id'=>$adssent->ad_id])->one();
             $receivero= User::find()->where(['id'=>$adssent->to])->one();
                
             $sendero= User::find()->where(['id'=>$adssent->from])->one();
         }
         $company_user = User::find()->where(['id'=>$id])->one();
         
        //Getting the login UserID
        $login_userID = Yii::$app->user->id;        
//$ad_data->ad_status==1 && $ad_data->status==1   Active add
        $advert_counter_active = \backend\models\Advertisement::find()
            ->where("user_id = '$login_userID'")->
                andWhere(['ad_status'=>1])->
                andWhere(['status'=>1])->
                orderBy(['id' => SORT_DESC]);
        
        $count_add = $advert_counter_active->count();
        $pagination_advert_active = new Pagination(['pageParam' => 'active-page','totalCount'=>$count_add, 'pageSize'=>20]);
        $advert_active = $advert_counter_active->offset($pagination_advert_active->offset)->limit($pagination_advert_active->limit)->all();

        //ad_status =0 ,un active 
        $advert_counter_unactive = \backend\models\Advertisement::find()
            ->where("user_id = '$login_userID'")->
                //andWhere(['ad_status'=>1])->
                andWhere(['ad_status'=>0])->
                orderBy(['id' => SORT_DESC]);
        
        $count_add = $advert_counter_unactive->count();
        $pagination_advert_unactive = new Pagination(['pageParam' => 'unactive-page','totalCount'=>$count_add, 'pageSize'=>20]);
        $advert_data_unactive = $advert_counter_unactive->offset($pagination_advert_unactive->offset)->limit($pagination_advert_unactive->limit)->all();


                //status =2 ,Moderate 
        $advert_counter_moderate = \backend\models\Advertisement::find()
            ->where("user_id = '$login_userID'")->
                //andWhere(['ad_status'=>1])->
                andWhere(['status'=>2])->
                orderBy(['id' => SORT_DESC]);
        
        $count_add = $advert_counter_moderate->count();
        $pagination_advert_moderate = new Pagination(['pageParam' => 'moderate-page','totalCount'=>$count_add, 'pageSize'=>20]);
        $advert_data_moderate = $advert_counter_moderate->offset($pagination_advert_moderate->offset)->limit($pagination_advert_moderate->limit)->all();

         $advert_counter_pending = \backend\models\Advertisement::find()
            ->where("user_id = '$login_userID'")->
                //andWhere(['ad_status'=>1])->
                andWhere(['status'=>0])->
                orderBy(['id' => SORT_DESC]);
        
        $count_add = $advert_counter_pending->count();
        $pagination_advert_pending = new Pagination(['pageParam' => 'moderate-page','totalCount'=>$count_add, 'pageSize'=>20]);
        $advert_data_pending = $advert_counter_pending->offset($pagination_advert_moderate->offset)->limit($pagination_advert_moderate->limit)->all();
        $active_ads = \backend\models\Advertisement::find()->distinct()
            ->where("user_id = '$login_userID'")
            ->andWhere(['status' => 1])
            ->andWhere(['ad_status' => 1])
            ->count();
        
        $inactive_ads = \backend\models\Advertisement::find()->distinct()
            ->where("user_id = '$login_userID'")
            ->andWhere(['status' => 1])
            ->andWhere(['ad_status' => 0])
            ->count();
        $rejected_ads = \backend\models\Advertisement::find()->distinct()
            ->where("user_id = '$login_userID'")
            ->andWhere(['status' => 2])
            ->count();
        $pending_ads = \backend\models\Advertisement::find()->distinct()
            ->where("user_id = '$login_userID'")
            ->andWhere(['status' => 0])
            ->count();
        
        
   if(isset($_GET['success'])){
           
            
           $modelcd = new \frontend\models\CreditsDetails();
           $session = Yii::$app->session;
           $uid= $session['user_id'];
           $cb= $session['creditsbuy'];
           
           $modelcd->user_id=$uid;
           $modelcd->credits=$cb;
           $modelcd->amount_paid= $cb;
           $modelcd->date= date('Y-m-d');
           $modelcd->save();
            
        }
        
        $credits_details= \frontend\models\CreditsDetails::find()
            ->where("user_id = '$login_userID'")
            ->orderBy(['id' => SORT_DESC,])
            ->all();
        
         $credits_expense= \frontend\models\CreditsExpense::find()
            ->where("user_id = '$login_userID'")
            ->orderBy(['id' => SORT_DESC,])
            ->all();
         
         if(!empty($credits_expense)){        
         foreach($credits_expense as $ads){
             $ad_info=  \frontend\models\Advertisements::find()->where(['id'=>$ads->ad_id])->one();
         }}
         
         else{
             $ad_info=0;
         }
      $title = new Conversation();
      $letter = NewsletterSubscription::find()->where(['email'=>\Yii::$app->user->identity->username])->one();
      
        // $city = ['M'=>'Male', 'F'=>'Female'];
         return $this->render('setting',['pass_model'=>$pass_model, 
                                         'city'=>$city, 
                                         'state'=>$state, 
                                         'detail_model'=>$detail_model,
                                         'pre_detail'=>$pre_detail,
//                                       'inbox'=>$inbox,
                                         'sent'=>$sent,
                                         'title'=>$title,
                                         'company_user'=>$company_user,
                                         'adscredit'=>$adscredit,
                                         //'advert_data' => $advert_data,
                                         'addin'=>$addin,
                                         'addse'=>$addse,
                                         'senderi' =>$senderi,
                                         'receiveri' =>$receiveri,
                                         'sendero' =>$sendero,
                                         'receivero' =>$receivero,
                                         'conversation_ids'=>$conversation_ids,
                                         'conversation'=>$conversation,
                                         'pagination_advert_active'=>$pagination_advert_active,
                                         'active_ads'=> $active_ads,
                                         'inactive_ads'=>$inactive_ads,
                                         'rejected_ads'=>$rejected_ads,
                                         'credits_details'=>$credits_details,
                                         'credits_expense'=>$credits_expense,
                                         'ad_info'=>$ad_info,
                                         'advert_active'=>$advert_active,
                                         'advert_data_moderate'=>$advert_data_moderate,
                                         'advert_data_unactive'=>$advert_data_unactive,
                                         'pagination_advert_unactive'=>$pagination_advert_unactive,
                                         'pagination_advert_moderate'=>$pagination_advert_moderate,
                                         'pagination'=>$pagination,
                                         'advert_data_pending'=>$advert_data_pending,
                                         'pending_ads'=>$pending_ads,
                                         'packages'=>$packages,
                                         'letter'=>$letter
                 ]);
         
    }
    
     public function actionReaded($id){
    echo $user = \Yii::$app->user->identity->id;
     $conv_id = $id;
     
     Messages::updateAll(['to_viewed' => 1], ['to'=>$user, 'conv_id'=>$conv_id]);
     }
     public function actionArchive($id){
//         $con = Conversation::findOne($id);
//         $con->status=2;
//         $con->save();
         
        $user = \Yii::$app->user->identity->id;
        $conv = ConvStatus::find()->where(['conv_id'=>$id, 'user_id'=>$user])->one();
        $conv->status=2;
        $conv->save();
     }
      public function actionArest($id){
//         $con = Conversation::findOne($id);
//         $con->status=1;
//         $con->save();
          
          $user = \Yii::$app->user->identity->id;
          $conv = ConvStatus::find()->where(['conv_id'=>$id, 'user_id'=>$user])->one();
          $conv->status=1;
          $conv->save();
     }
    
    public function actionMessagesDetail(){
      return  $this->render('messages-detail');
    }
    
    public function actionCdetails()
    {
         $this->layout='dashboard';
           $array = \frontend\models\City::find()->all();
         $city = ArrayHelper::map($array, 'id', 'name');
         $id = Yii::$app->user->getId();
         
          $detail_model = Details::findOne($id);
//         $detail_model = \backend\models\User::findOne($id);
         
             if ($detail_model->load(Yii::$app->request->post())) {
                echo $detail_model->name."<br />";
//                echo $detail_model->username;

                $detail_model->save();
             }
             
       return $this->render('c_details', ['detail_model'=>$detail_model, 'city'=>$city]);
    }
    
    
    
     public function actionPassword()
    {
         $this->layout='dashboard';
       return $this->render('password');
    }
    
     public function actionUserRegistration()
    {
       return $this->render('user-registration');
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionMessagelist($id)
    {
       Yii::$app->response->format = Response::FORMAT_JSON;
      $messagelist = Messages::find()->where(['conv_id'=>$id])->all();
       return $messagelist;
    }
    

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
         
            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    
    
//    public function actionSetting()
//    {
//        return $this->render('setting');
//    }
    
    
    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

     public function actionMarksold($id)
    {
        $request = Yii::$app->request;
//        if ($request->isAjax) {
            $model= \frontend\models\Advertisements::find()->where(['id'=>$id])->one();
//            $model= \frontend\models\Advertisements::findOne($id);
//            echo "<pre>";
//            print_r($model);
//            echo "</pre>";
//            exit();
            if ($model->sold_status== 0){
                $model->sold_status= 1; $model->save();
            echo 'sold';
            
            }
             
//        }
    }
    
     public function actionChangestatus($id)
    {
        $request = Yii::$app->request;
        if ($request->isAjax) {
            $model= \frontend\models\Advertisements::findOne($id);
            if ($model->ad_status== 0){
                $model->ad_status= 1; $model->save();
            echo '<a id="danger'.$model->id.'" onClick="change_status('.$model->id.')" class="btn btn-danger"><i class="fa fa-arrow-down"></i>In Active</a>';
            
            }
             else {
                 $model->ad_status= 0;
                         $model->save();
            echo '<a id="danger'.$model->id.'" onClick="change_status('.$model->id.')" class="btn btn-primary"><i class="fa fa-arrow-up"></i>Active</a>';
             }
        }
    }
    
    
    public function actionGet_search_ad($search_value){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $login_id = Yii::$app->user->id;
        //print_r($login_id);

        $search_result_ads = \frontend\models\Advertisement::find()->distinct()
                ->where(['user_id' => $login_id])
                ->andWhere(['like', 'advertise_title', $search_value.'%', false])
                ->andWhere(['status' => 1])
                ->andWhere(['ad_status' => 1])
                ->orderBy(['id' => SORT_DESC])
                //->limit(10)
                ->all();       
        
        //Yii::$app->response->content =$search_result_ads; 
        //return ['param' => $search_result_ads];
        
        if($search_value == ''){
            $search_result_ads = \backend\models\Advertisement::find()
            ->where("user_id = '$login_id'")
            ->andWhere(['status' => 1])
            ->andWhere(['ad_status' => 1])
            ->orderBy(['id' => SORT_DESC])
            //->limit(10)
            ->all();       
            return $search_result_ads;
        }
        return $search_result_ads;
        
    }
    
    public function actionGet_search_unactive_ad($search_value){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $login_id = Yii::$app->user->id;
        //print_r($login_id);

        $search_result_ads = \frontend\models\Advertisement::find()->distinct()
                ->where(['user_id' => $login_id])
                ->andWhere(['like', 'advertise_title', $search_value.'%', false])
                ->andWhere(['status' => 1])
                ->andWhere(['ad_status' => 0])
                ->orderBy(['id' => SORT_DESC])
                //->limit(10)
                ->all();       
        
        //Yii::$app->response->content =$search_result_ads; 
        //return ['param' => $search_result_ads];
        
        if($search_value == ''){
            $search_result_ads = \backend\models\Advertisement::find()->distinct()
            ->where("user_id = '$login_id'")
            ->andWhere(['status' => 1])
            ->andWhere(['ad_status' => 0])
            ->orderBy(['id' => SORT_DESC])
            //->limit(10)
            ->all();       
            return $search_result_ads;
        }
        return $search_result_ads;
        
    }
   
    public function actionGet_search_moderate_ad($search_value){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $login_id = Yii::$app->user->id;

        $search_result_ads = \frontend\models\Advertisement::find()->distinct()
                ->where(['user_id' => $login_id])
                ->andWhere(['like', 'advertise_title', $search_value.'%', false])
                ->andWhere(['status' => 2])
                ->orderBy(['id' => SORT_DESC])
                ->all();   
        
//        print_r($search_result_ads);
//        exit();
        
        //Yii::$app->response->content =$search_result_ads; 
        //return ['param' => $search_result_ads];
        
        if($search_value == ''){
            $search_result_ads = \backend\models\Advertisement::find()->distinct()
            ->where("user_id = '$login_id'")
            ->andWhere(['status' => 2])
            ->orderBy(['id' => SORT_DESC])
            ->all();       
            return $search_result_ads;
        }
        return $search_result_ads;
        
    }
    
    public function actionGet_inbox_messages_ad($search_value){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $login_id = Yii::$app->user->id;
        
        $search_result_ads = \frontend\models\Advertisement::find()->distinct()
                ->where(['user_id' => $login_id])
                ->andWhere(['like', 'advertise_title', $search_value.'%', false])
                ->orderBy(['id' => SORT_DESC])
                ->all();  
        
        if($search_value == ''){
            $search_result_ads = \frontend\models\Advertisement::find()->distinct()
            ->where("user_id = '$login_id'")
            ->orderBy(['id' => SORT_DESC])
            ->all();       
            return $search_result_ads;
        }
        return $search_result_ads;
    }
    
    
    
    public function actionPaypal(){
        
     // print_r(Yii::$app->request->post());
      
      //exit();
      $credits=$_POST['CreditsDetails']['credits'];
    
      $session = Yii::$app->session;
      $session['creditsbuy'] = $credits;
      $session['user_id']= \Yii::$app->user->identity->id;
       
            
        $p = new paypal();
        $response = $p->teszt(10,[]);
        //echo '<pre/>';
        $url = $response->links[1]->href;
        
        //echo 'Redirect user here:'.$url.'<br/><br/>';
        //var_dump($response);
        header('Location: '.$url);
        die();
    }
    
    public function actionInvoice(){
          $login_userID = Yii::$app->user->id;   
  $credits_details= \frontend\models\CreditsDetails::find()
            ->where("user_id = '$login_userID'")
            ->orderBy(['id' => SORT_DESC,])
            ->all();
  
  $sumamount=\frontend\models\CreditsDetails::find()
            ->where("user_id = '$login_userID'")
            ->orderBy(['id' => SORT_DESC,])->sum('amount_paid');
         return $this->renderpartial('invoice',['credits_details'=>$credits_details,'sumamount'=>$sumamount]);
    }
    
    public function actionDetail(){
          $login_userID = Yii::$app->user->id;   
  $credits_details= \frontend\models\CreditsDetails::find()
            ->where("user_id = '$login_userID'")
            ->orderBy(['id' => SORT_DESC,])
            ->all();
  
  $sumamount=\frontend\models\CreditsDetails::find()
            ->where("user_id = '$login_userID'")
            ->orderBy(['id' => SORT_DESC,])->sum('amount_paid');
         return $this->renderpartial('detail',['credits_details'=>$credits_details,'sumamount'=>$sumamount]);
    }
    public function actionQuickpay(){
         return $this->renderpartial('quickpay');
    }
    
//    public function actionPrint(){
//        $mpdf= new mPDF();
//        $mpdf->WriteHTML('Sample Code');
//        $mpdf->Output();
//                exit;
//    }
    public function actionPrint() {
 $this->layout='mainp';
  $login_userID = Yii::$app->user->id;   
  $credits_details= \frontend\models\CreditsDetails::find()
            ->where("user_id = '$login_userID'")
            ->orderBy(['id' => SORT_DESC,])
            ->all();
  $mpdf=new mPDF();
  $mpdf->WriteHTML($this->render('print',['credits_details'=>$credits_details]));
  $mpdf->Output('MyPDF.pdf', 'D');
  exit;
 }
 
 //news-letter
 
 public function actionEmailnotification(){
     echo $user = \Yii::$app->user->identity->id;
     echo $useremail = \Yii::$app->user->identity->username;
     NewsletterSubscription::deleteAll(['email'=>$useremail]);
     $subsrip = new NewsletterSubscription();
     $subsrip->email = $useremail;
     $subsrip->status = 1;
     $subsrip->save();
    
     }
     
        public function actionEmailnotificationun(){
     echo $user = \Yii::$app->user->identity->id;
     echo $useremail = \Yii::$app->user->identity->username;
     $subsrip =  NewsletterSubscription::find()->andFilterWhere(['like','email', $useremail])->one();
//     print_r($subsrip);
     $subsrip->status = 0;
     $subsrip->save();
    
     }
 
 
 
}
