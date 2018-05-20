<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Advertisement;
use frontend\models\AdvertisementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Conversation;
use yii\helpers\ArrayHelper;
use frontend\models\ConvStatus;

/**
 * AdvertisementController implements the CRUD actions for Advertisement model.
 */
class AdvertisementController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                  //  'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Advertisement models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'main_1';
        $searchModel = new AdvertisementSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Advertisement model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    
    public function actionAdPosting()
    {
       return $this->render('ad-posting');
    }

    
    
    

     public function actionAdView()
    {
//         Count views start here   Yii::$app->user->getId()
         $user = Yii::$app->user->getId();
        $countview = Advertisement::findOne($_GET['id']);
       
        if($user!=$countview->user_id){
        $views = $countview->views;
        $views++;
       $countview->views = $views;
    if($countview->save()){ }
        }
//         Count views End here
        $id = $_GET['id'];
        
        // echo $id;
        $ads= Advertisement::find()->where(['id'=>$id])->one();
       // print_r($ads);
       // exit();
//        echo $ads->category_id;
      $cate = \frontend\models\Category::find()->where(['id'=>$ads->category_id])->one();
//       echo "<br />";
      
       if($cate->parent_id!=0){
            
           $cate = $cate->parent_id; 
           $category = new \frontend\models\Category();
           $cate = $category->getsubcateides($cate);
      
          $related = Advertisement::find()->where(['category_id'=>$cate,'ad_status'=>1])->asArray()->all() ;
          $count = Advertisement::find()->where(['category_id'=>$cate,'ad_status'=>1])->count() ;
     
         if($count <= 5 || empty($related)){
             $related = Advertisement::find()->where(['ad_status'=>1])->all();
         }
//         exit();
          $items = ArrayHelper::map($related, 'id', 'category_id');
//      echo "<pre>";
//      print_r($items);
//      echo "</pre>";
          if(count($items)>1){
        $random_keys=array_rand($items, 5);}else{
             $random_keys=array_rand($items, 1);
        }
       }else{
                   
                  $related = Advertisement::find()->where(['ad_status'=>1])->asArray()->all() ;
                  $count = Advertisement::find()->where(['ad_status'=>1])->count() ;

                 if($count <= 5 || empty($related)){
                     $related = Advertisement::find()->where(['ad_status'=>1])->all();
                 }
        //         exit();
                  $items = ArrayHelper::map($related, 'id', 'category_id');
        //      echo "<pre>";
        //      print_r($items);
        //      echo "</pre>";
                  $random_keys=array_rand($items, 5);
           
       }
     
//      echo "<pre>";
//      print_r($random_keys);
//      echo "</pre>";
       $random_ads= Advertisement::find()->where(['id'=>$random_keys])->all();
//        echo "<pre>";
//      print_r($random_ads);
//      echo "</pre>";
//      exit();
      $additional = \frontend\models\FormAdditionalValues::find()->where(['ad_id'=>$ads->id])->all();
        $imgs=  \backend\models\Images::find()->where(['advertise_id'=>$id])->all();
       
        $state= \backend\models\Region::find()->where(['id'=>$ads->state_id])->one();
        $city= \backend\models\City::find()->where(['id'=>$ads->city_id])->one();
         
                                               return $this->render(    'ad-view',['ads'=>$ads,
									'id'=>$id,
									'imgs'=>$imgs,
									'state'=>$state,
									'city'=>$city,
									'additional'=>$additional,
                                                                        'random_ads'=>$random_ads
                        ]);
    }
    
    public function actionAdPreview()
    {
        $id = $_GET['id'];
         
         
        $ads= Advertisement::find()->where(['id'=>$id])->one();
        $additional = \frontend\models\FormAdditionalValues::find()->where(['ad_id'=>$ads->id])->all();
        $imgs=  \backend\models\Images::find()->where(['advertise_id'=>$id])->all();
        $state= \backend\models\Region::find()->where(['id'=>$ads->state_id])->one();
        $city= \backend\models\City::find()->where(['id'=>$ads->city_id])->one();
         
		return $this->renderPartial('ad-view',['ads'=>$ads,
									'id'=>$id,
									'imgs'=>$imgs,
									'state'=>$state,
									'city'=>$city,
									'additional'=>$additional]);
    }
    
    
    public function actionSubmitmsg()
    {
        
        $request = Yii::$app->request;
        if ($request->isAjax) {
                
            $msg =$_GET['msg'];
            $adid =$_GET['id'];
           
                       
            $aduser = \frontend\models\Advertisement::findOne(['id'=>$adid]);
            
            
           $conversation_id = Conversation::find()->where(['ad_id'=>$adid, 'from'=>yii::$app->user->id, 'to'=>$aduser->user_id])->orWhere(['ad_id'=>$adid])->one();         
          if(isset($conversation_id)){
              $con = $conversation_id->id;
          }else{
           $conv = new \frontend\models\Conversation();
           $conv->ad_id = $adid;
           $conv->from = yii::$app->user->id;
           $conv->to = $aduser->user_id;
           $conv->save();
           $con = $conv->id;
          }
            
          $conv_status = ConvStatus::find()->where(['conv_id'=>$con, 'user_id'=>yii::$app->user->id])->one();
          if(!isset($conv_status)){
              $c_s = new ConvStatus();
              $c_s->conv_id = $con;
              $c_s->user_id = yii::$app->user->id;
              $c_s->status = 1;
              $c_s->save();
              
               $c_s = new ConvStatus();
              $c_s->conv_id = $con;
              $c_s->user_id = $aduser->user_id;
              $c_s->status = 1;
              $c_s->save();
          }else{
              $conv_status->conv_id = $con;
              $conv_status->user_id = yii::$app->user->id;
              $conv_status->status = 1;
              $conv_status->save();
              
                $conv_status->conv_id = $con;
              $conv_status->user_id = $aduser->user_id;
              $conv_status->status = 1;
              $conv_status->save();
          }
          
            
           $model = new \frontend\models\Messages(); 
           $model->conv_id= $con;
           $model->ad_id=$adid;
           $model->message=$msg;
           $model->from=yii::$app->user->id;
           $model->to=$aduser->user_id;
           $model->created=date("Y-m-d H:i:s");
           $model->save();
           
                  
//        
                           }
          Yii::$app->getSession()->setFlash('success', 'Your message sended successfully!');
         }
     public function actionSubmitmsg2()
    {
        
        $request = Yii::$app->request;
//        if ($request->isAjax) {
                
        echo    $msg =$_GET['msg'];echo "<br />";
        echo    $adid =$_GET['id'];echo "<br />";
        echo    $conv_id = $_GET['con_id'];echo "<br />";
        echo    $login = yii::$app->user->id;echo "<br />";
           echo "<br />";
                       
            $aduser = \frontend\models\Advertisement::findOne(['id'=>$adid]);
           echo $aduser->user_id;
            
//          $conversation_id = Conversation::find()->where(['ad_id'=>$adid, 'from'=>yii::$app->user->id, 'to'=>$aduser->user_id])->all();        
      $conversation_id = Conversation::find()->where(['ad_id'=>$adid, 'from'=>$login])->one();
    
       if(!isset($conversation_id)){
             $conversation_id = Conversation::find()->where(['ad_id'=>$adid, 'to'=>$login])->one(); 
              $to = $conversation_id['from'];
          }  else {
                $to = $conversation_id['to'];
          }
          print_r($conversation_id);
         
             
           $conv_status = ConvStatus::find()->where(['conv_id'=>$conv_id, 'user_id'=>yii::$app->user->id])->one();
          if(!isset($conv_status)){
              $c_s = new ConvStatus();
              $c_s->conv_id = $conv_id;
              $c_s->user_id = yii::$app->user->id;
              $c_s->status = 1;
              $c_s->save();
          }else{
              $conv_status->conv_id = $conv_id;
              $conv_status->user_id = yii::$app->user->id;
              $conv_status->status = 1;
              $conv_status->save();
          }
            
           $model = new \frontend\models\Messages(); 
           $model->conv_id= $conv_id;
           $model->ad_id=$adid;
           $model->message=$msg;
           $model->from=yii::$app->user->id;
           $model->to=$to;
           $model->created=date("Y-m-d H:i:s");
          if($model->save()){
              echo "saved";
          }else {
              echo 'not';
          }
           
                  
//        
//                           }
                                     }
    /**
     * Creates a new Advertisement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Advertisement();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Advertisement model.
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
     * Deletes an existing Advertisement model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['user/setting']);
    }

    
    
    
    /**
     * Finds the Advertisement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Advertisement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Advertisement::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
