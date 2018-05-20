<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\PasswordResetRequestsms;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\TmpUser;
use frontend\models\User;
use yii\helpers\Url;
use backend\models\Email;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use yii\data\Pagination;
use backend\models\NotificationAdmin;
use backend\models\OptionalfieldBridgeTable;
use backend\models\FilterName;
use yii\web\Response;
use kartik\date\DatePicker;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['GET'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
//      if (!\Yii::$app->user->isGuest) {
//           $this->layout = 'main_login';
//           }
       
       
       
        $content_inner=  \backend\models\ContentInner::find()->where(['status'=>1])->all();
       
    //       $regions = \frontend\models\Region::findAll(['status'=>1]);
 $regions =  \frontend\models\City::find()->where(['status'=>1])->limit(20)->all();     
      return $this->render('index', ['regions'=>$regions, 'content_inner'=>$content_inner]);
    }
    /**
     * Displays homepage.
     *
     * @return mixed
     */
     public function actionSearch($id)
    {
        $list = new \frontend\models\Category();
         $item = $list->getsubcateides($id);
        
        $regions = \frontend\models\Region::findAll(['status'=>1]);
        $category = \frontend\models\Category::find()->where(['status'=>1, 'parent_id'=>0])->all();
        $search = \frontend\models\Advertisement::find()->where(['status'=>1, 'category_id'=>$item]);
        $count=$search->count();
        $pagination=new Pagination(['totalCount'=>$count, 'pageSize'=>10]);
        $result=$search->offset($pagination->offset)->limit($pagination->limit)->all();
        $submenu = new \frontend\models\Category();
        return $this->render('adsearch', ['regions'=>$regions, 'category'=>$category, 'submenu'=>$submenu, 'search'=>$search,'result'=>$result, 'pagination'=>$pagination]);
    }
     /**
     * 
     *
     * @return location id(region id and state id)
     */
    public function city($city)
    {
   
           $city = trim($city);
          if(isset($city)){
            $city = \frontend\models\City::find()->where(['LIKE', 'name', $city])->one();
              if ($city)
         return $city->id;
            else
                return 0;
        }
        else{
            return 0;
        }      
    }
   
    public function category($cate)
    {
       
        $cate = trim($cate);
        $category = \frontend\models\Category::find()->where(['LIKE', 'title', $cate])->one();
        if(isset($category->id)){
         $id = $category->id;
        }
        else{
            $id = 0;           
        } 
      
      $item=[$id];
      $lists = \frontend\models\Category::find()->where(['parent_id'=>$id])->all();
      foreach($lists as $list ){
        
      array_push($item, $list->id);
      $lists2 = \frontend\models\Category::find()->where(['parent_id'=>$list->id])->all();
                        foreach($lists2 as $list2){
                        array_push($item, $list2->id);
                        }
         
      }
     return $item;
       
    }
    
    
    public function category_idby_name($cate)
    {
       
        $cate = trim($cate);
        $category = \frontend\models\Category::find()->where(['LIKE', 'title', $cate])->one();
        if(isset($category->id)){
         $id = $category->id;
        }
        else{
            $id = 0;           
        } 
      
     return $id;
       
    }



    
    
     public function related_category($cate)
    {
        $category = \frontend\models\Category::find()->where(['LIKE', 'title', $cate])->one();
        if(isset($category->id)){
         $id = $category->id; 
        }
        else{
            $id = 0;            
        }  
        
       
      $item=[$id];
      $lists = \frontend\models\Category::find()->where(['parent_id'=>$id])->all();
     
     return $lists;
        
        
        
    }
    
    public function region($region)
    {
        $region = str_replace(" ","", $region);
        if($region != 0)
        {
            $regions = \frontend\models\Region::find()->Where(['LIKE', 'name', $region])->one();
//         $regions = \frontend\models\Region::find()->where(['LIKE', 'slug', $region])->one();
//         print_r($regions);
//         return $regions->id;
            if(isset($regions->id)){
                return $regions->id;
            }
            else
            {
                return 0;
            }
        }
        else{
            return 0;
     }
       
      
        }
         public function actionTest()
    {
             $ads = \frontend\models\Advertisement::find()->where(['status'=>1])->all();
            foreach($ads as $ad){
                echo $ad->id."<br />";
                foreach($ad->formAdditionalValues as $adi){
                    echo "->".$adi->id;
                            }

                }
            
         }
        
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionSearchad()
    {
        $request = Yii::$app->request;
       
           if(!empty($_GET['location'])){
               $city =  $_GET['location'];
               $c = $this->city($city);
               $city = ['city_id'=> $c]; 
			   //print_r($city );
			   //print_r('99999999999999999999999999');
           } else{
               $city = array();
           }
           
           
           /* if(!empty($_GET['published'])){
             
           } else{
               $city = array();
           }
		   */
          # on home page there are two key words regin and city 
			# on search page there are two key words location and city. 
          
           if(!empty($_GET['category'])){
              $cate =  $_GET['category'];
              $category = $this->category($cate);
              $cat_ids = $category; 
              $category  = ['category_id'=>$category];
//              echo "category";
             
           }else{
               $category = array();
               $cat_ids = array() ;
              
           }
////// search filter 

           
          
             if(isset($_GET['Advertisements']['additional_optional'])){
             $mydata = array();
             //print_r($_GET['Advertisements']['additional_optional']);
           foreach($_GET['Advertisements']['additional_optional'] as $op_field => $value){
 //            print_r($value);
   //          print_r('-----');
             //  if($value=='Honda')
              // {
$temp = array();
foreach ($value as $key => $val)
{
//    print_r($val);

 $data = \frontend\models\FormAdditionalValues::find()->where(['LIKE', 'values', $val])->andWhere(['field_id'=>$op_field])->all();

 foreach($data as $data_item)
                    {
//                        if (in_array($data_item->ad_id, $mydata)) {
//                            
//                        }
// else {
                     array_push($temp, $data_item->ad_id);
 //}
                       // print_r($data_item->ad_id.'<br/>');
     
               } } //}
                    //exit();
if (count($mydata)>0)
{
$mydata = array_intersect($mydata, $temp);
}
 else {
    $mydata =  $temp;
}
                    $myids = ['id'=>$mydata];
             }}  else {
                 
              $myids = [];
    
    
}
//           print_r($myids);  
            if(!empty($_GET['skey'])){
            $key =  $_GET['skey'];
            $key = ['LIKE', 'advertise_title', $key];
           }else{
            $key = array();
           }
           
            if(!empty($_GET['min_price']) ){
            $min_price = ['>=', 'price', $_GET['min_price'] ];
           }else{
            $min_price = array();
           }
           
            if(!empty($_GET['max_price'])){
            $max_price = ['<=', 'price', $_GET['max_price']];
            }else{
                $max_price = array();
           }
            if(!empty($_GET['published']) && $_GET['published'] !=0){
            $day =  $_GET['published'];
            $created = ['>=', 'created_date', date('Y-m-d',strtotime("-$day days"))];
           }else{
               $created = array();
           
           }
           
            if(!empty($_GET['condition']) && $_GET['condition'] !='all' ){
            $condition =  $_GET['condition'];
            $condition = ['=','condition', $condition];
            }
            else 
            {
               $condition = array(); 
            }
            
            if(!empty($_GET['type'])){
            $type = ['=','type', $_GET['type']];
            }
           else
           {  
              $type = array();
           }
            
           if (isset($_GET['sort_by']) && $_GET['sort_by'] =='low_price')
           {
               $order_by = ['price'=>SORT_ASC];
           }
           elseif (isset($_GET['sort_by']) && $_GET['sort_by'] =='high_price')
           {
               $order_by = ['price'=>SORT_DESC];
           }
           else 
           {
               $order_by = ['id'=>SORT_DESC];
           }
            if(!empty($_GET['op_fi'])){
            $op_fi =  $_GET['op_fi'];
           }
           $ctegory_name = '';
             if(!empty($_GET['id'])){

            $ctegory_name = \frontend\models\Category::find()->where(['id'=> $_GET['id'] ] )->one()->title;
           // print_r($ctegory_name);
               
               $list = new \frontend\models\Category();
      $cate = $list->getsubcateidesname($_GET['id']);
       $category = $this->category($cate);

              $cat_ids = $category; 
              $category  = ['category_id'=>$category];
           
             // print_r($category);
           }
           
           $list = new \frontend\models\Category();
    
 if(!empty($_GET['category'])){
              $cate =  $_GET['category'];
              $relcategory = $this->related_category($cate);
            
           }else{
               $relcategory = array();
              
           }

    $search = \backend\models\Advertisement::find()->
              where(['status'=>1])->
              andWhere($category)->
              // andWhere($category_filters)->
              andWhere($max_price)->
              andWhere($min_price)->
              andWhere($created)->
              andWhere($condition)->
              andWhere($type)->
              andWhere($city)->
              andWhere(['sold_status'=>0])->
              andWhere($key)->
            andWhere($myids)->
              orderBy($order_by);
    //print_r($search);
 
/// commercial adds 
    $search_commer = \backend\models\CommercialSearchAds::find()->
              where(['status'=>1])->
              andWhere($category)->
//              andWhere($category_filters)->
//              andWhere($max_price)->
//              andWhere($min_price)->
//              andWhere($created)->
//              andWhere($condition)->
//              andWhere($type)->
//              andWhere($city)->
//              andWhere($key)->
              orderBy($order_by);
    
    
          $count = $search_commer->count();
          $pagination = new Pagination(['totalCount'=>$count, 'pageSize'=>3]);
          $adscomm=$search_commer->offset($pagination->offset)->limit($pagination->limit)->all();
    
          $count = $search->count();
          $pagination = new Pagination(['totalCount'=>$count, 'pageSize'=>10]);
          $ads=$search->offset($pagination->offset)->limit($pagination->limit)->all();
         // print_r($ads);
          $regions = \frontend\models\Region::findAll(['status'=>1]);
        $categories_list = \frontend\models\Category::find()->where(['status'=>1, 'parent_id'=>0])->all();
        $submenu = new \frontend\models\Category();
        
        if ($request->isAjax) {
         $regions = \frontend\models\Region::findAll(['status'=>1]);
    //    $category = \frontend\models\Category::find()->where(['status'=>1, 'parent_id'=>0])->all();
        $submenu = new \frontend\models\Category();
        $_GET['skey'] = $key;
        //echo 'good';
        //exit();
         return $this->renderPartial('_adsearch', ['regions'=>$regions,
                                                  'category'=>$category,
                                                  'submenu'=>$submenu, 
                                                  'result'=>$ads,
                                                  'pagination'=>$pagination, 
                                                  'ajax'=>1,
                                                   'search_commer'=>$adscomm                                      
            ]);
    
        } else{
            //print_r($cat_ids); 
            
       $filtes_ids = \backend\models\CategoryAdditionalFields::find()->where([ 'category_id'=>$cat_ids])->select(['optional_field_id'])->all();

              $f_ids =array(); 
              foreach ($filtes_ids as $filtes_id) {
                array_push($f_ids, $filtes_id->optional_field_id);
                }
          $filerts=   \backend\models\FilterName::findAll(['status'=>1,'id'=>$f_ids, 'parent_filter'=>0]);      ;
        return $this->render('adsearch', ['regions'=>$regions,
                                          'category'=>$categories_list,
                                          'submenu'=>$submenu,
                                          'result'=>$ads,
                                          'pagination'=>$pagination,
                                          'relcategory'=>$relcategory,
                                          'filters'=>$filerts,
                                          'ajax'=>0,
                                          'selected_category'=>$cat_ids,
                                          'search_commer'=>$adscomm,
                                          'ctegory_name'=>$ctegory_name
                                          ]);
              
          } 
   
           }
    
    
    
public function actionGetfilters($cat_ids='')
    { 
      $cat_name = $_GET['cate_name'];


           if(!empty($cat_name)){
              //$cate =  $_GET['category'];
              $cat_id = $this->category_idby_name($cat_name);
              //$cat_ids = $category; 
              //$category  = ['category_id'=>$category];
//             echo $cat_id;
//             exit();
           }else{
                exit();
           }


      //print_r('ssssss'); exit();
                   $filtes_ids = \backend\models\CategoryAdditionalFields::find()->where([ 'category_id'=>$cat_id])->
                      select(['optional_field_id'])->all();

                  $f_ids =array(); 
                  foreach ($filtes_ids as $filtes_id) {
                    array_push($f_ids, $filtes_id->optional_field_id);
                    }
                  $filters =   \backend\models\FilterName::findAll(['status'=>1,'id'=>$f_ids, 'parent_filter'=>0]); 

                  foreach ($filters as $filter) {
                                           
                                          $dd_option_id =   \backend\models\FilterName::find()->where(['parent_filter'=>$filter->id])->all();

                                          if($filter->display_for_screen_page == 1) //Dropdown
                                          {
                                               $fi=0;
                                 if($fi==0){
                                     echo '<h3>Filters <?php ?></h3>
                        <ul id="myList" class="rdio_btn" >';
                                 }
                                 $fi++;
                                             echo "<div class='input-group contact-field-wrap'>
                                                       <label>" . $filter['filter_name'] . "</label>
                                                       <select onclick='submit_frm()' name='Advertisements[additional_optional][". $filter['id'] ."][]' id='advertisements-advertise_title' onchange='subdropdown(this)' name='' class='form-control'><option>Please select</option>
                                                       ";
                                             
                                             foreach ($dd_option_id as $a_value) 
                                             {
                                                  
                                                  echo '<option data_value="'. $a_value['id']  .'" value="'. $a_value['filter_name']  .'">'. $a_value['filter_name'] .'</option>';         
                                             }
                                             echo "</select></div><div id='additional_optional'></div>";
                                          }

                                          if($filter->display_for_screen_page == 2) //CheckBox
                                          {
                                            echo "<div class='input-group contact-field-wrap'>
                                                     <label>" . $filter['filter_name'] . "</label></div>";

                                            foreach ($dd_option_id as $a_value) 
                                            {
                                               
                                               echo "<input onclick='submit_frm()' name='Advertisements[additional_optional][". $filter['id'] ."][]' type='checkbox' class='checkbox'  value='" . $a_value['filter_name'] . "'>" . $a_value['filter_name'] ."<br>";
                                            }
                                          }
                                          if($filter->display_for_screen_page == 3) //TextBox Number
                                          {
                                              echo "<div class='input-group contact-field-wrap'>
                                              <label>" . $filter['filter_name'] . "</label>
                                              <input onclick='submit_frm()' class='form-control' type='number' name='Advertisements[additional_optional][". $filter['id'] ."][]' value=''>
                                              </div>";
                                          }

                                          if($filter->display_for_screen_page == 4) //TextBox
                                          {
                                              echo "<div class='input-group contact-field-wrap'>
                                              <label>" . $filter['filter_name'] . "</label>
                                              <input onclick='submit_frm()' class='form-control' type='text' name='Advertisements[additional_optional][". $filter['id'] ."][]' value=''>
                                              </div>";
                                          }

                                         
                                          if($filter->display_for_screen_page == 5) //Range
                                          {
                                            //First Range Textbox
                                            echo "<div class='input-group contact-field-wrap'>
                                            <label>" . $filter['filter_name'] . "</label>
                                                  <input type='number' placeholder='To' class='form-control' name='Advertisements[additional_optional][". $filter['id'] ."][]' value=''></div>";

                                            //Second Range Textbox
                                            echo "<div class='input-group contact-field-wrap'>
                                            <label>" .                         "</label>
                                                  <input onclick='submit_frm()' type='number' placeholder='From' class='form-control'  name='Advertisements[additional_optional][". $filter['id'] ."][]'
                                              value=''></div>";
                                          }
                                          
                                          if($filter->display_for_screen_page == 6) //DatePicker
                                          {
                                                //Datepicker Range Textbox
                                                echo "<div class='input-group contact-field-wrap'>";      
                                                echo '<label class="control-label">Birth Date</label>';
                                                echo '<input type="text" id="datafilter" name="Advertisements[additional_optional]['. $filter['id'] .'][]" /> ';
                                                echo "</div>";
                                            }
                                        } 


    }





     public function actionLoadimage()
    {
	$model = \backend\models\CommercialSearchAds::find()->asArray()->all();

        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Content-Transfer-Encoding: binary');
		header('Content-type: '.$model[0]['image_type']);
		echo $model[0]['image'];  
	
    }
    
    
    

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionSignout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    public function actionSelect_city(){
        $code = $_GET['id'];
       $city_code= \frontend\models\City::find()->where(['region_id'=>$code])->all();
      
        echo '<label>City<b class="asterisk">*</b></label><select id="advertisement-state_id" class="form-control abc" name="Advertisements[city_id]">';
        foreach ($city_code as $city){
             echo' <option value="'. $city->id .'">'. $city->name .'</option>';
             }
              echo '</select>';
    }
    
    public function actionSelect_city_for_user_details(){
        $code = $_GET['id'];
       $city_code= \frontend\models\City::find()->where(['region_id'=>$code])->all();
      
        echo '<label>City<b class="asterisk">*</b></label><select id="advertisement-state_id" class="form-control" name="city">';
        foreach ($city_code as $city){
             echo' <option value="'. $city->id .'">'. $city->name .'</option>';
             }
              echo '</select>';
    }

        public function actionSubmitad()
    {
        
        if (\Yii::$app->user->isGuest) {    
             Yii::$app->session->setFlash('success', 'Please Login First.');
              return $this->redirect(['login']);
        }

        $id = Yii::$app->user->id;
        $user = User::findOne(['id'=>$id]);
        $model = new \frontend\models\Advertisements(); 
       
//        $counter=ArrayHelper::map($city,'code','name');
       
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
        $credits_purchased=\frontend\models\CreditsDetails::find()
        ->where(['user_id' => Yii::$app->user->id])
        ->orderBy(['id' => SORT_DESC,])->sum('credits');
         
            
        //echo $credits_purchased;
        $credits_expense=  \frontend\models\CreditsExpense::find()
        ->where(['user_id' => Yii::$app->user->id])
        ->orderBy(['id' => SORT_DESC,])->sum('credit_exp');
         
        // echo $credits_expense;
         $categoryce=  \frontend\models\Category::find()->Where(['id'=>$model->category_id])->one();
         
         $credits_left= $credits_purchased-$credits_expense;
        // echo $credits_left;
         
         if($credits_left >= $categoryce->credits)
         {       
            
       $model->user_id = Yii::$app->user->id;
       $model->created_date = date("Y-m-d H:i:s");
        $model->v_code = rand(1000, 9999);
      $model->email = $user->email;
      $type= $user->is_company;
      if($user->is_company==0){
         $type=2;  
      }
       $model->type = $type;
        
           if($model->save()){
            
               if(isset($_POST['Advertisements']['additional_optional'])){

             foreach($_POST['Advertisements']['additional_optional'] as $op_field => $value){

                  $ad_f = new \frontend\models\FormAdditionalValues();
                  $ad_f->ad_id = $model->id;
                  $ad_f->field_id = $op_field;

                  $val_string = "";
                  if(gettype($value) == 'array'){
                  foreach ($value as $val) {
                    $val_string.='|'.$val;
                    
                  }
                }
                else{
                  $val_string = $value;
                }

                  $ad_f->values = $val_string;
                 
                 $ad_f->save();
               }
               
             }
           }
           $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
          
           $model->advertise_title;
           
            if ($model->upload()) {
                // file is uploaded successfully
//                $this->Sentsms($model->mobile_number, $model->v_code);
                
                if ( $_POST['perview_true']==1)
                {
                //  return $this->redirect(\Yii::$app->urlManager->createUrl("site/edit-ad",['id'=>$model->id,"new"=>1])); 
                Yii::$app->response->redirect(['advertisement/ad-view','id'=>$model->id,"new"=>1]);
                    
                }
                else
                {
                $this->Sentsms($model->mobile_number, $model->v_code);
               Yii::$app->session->setFlash('success', 'Please enter the ad confirmation code sent your mobile.');
                return $this->redirect(\Yii::$app->urlManager->createUrl("site/verifysms_ad")); 
                }
            }
        }
        
        else{
            
             Yii::$app->session->setFlash('success', 'You do not have enough credits');
            return $this->redirect(['user/setting','credits'=>1]); 
        }
        }
         $main_cat = \frontend\models\Category::find()->where(['parent_id'=>0])->all();
        $sub_cat = \frontend\models\Category::find()->where('parent_id != :parent_id', ['parent_id'=>0])->all();
        $regions =  \frontend\models\Region::find()->all();

        $counter=ArrayHelper::map($regions,'id','name');
        
        $po = \backend\models\Postcode::find()->all();

        $pocounter=ArrayHelper::map($po,'id','code');

        
        
       return $this->render('submitad',['model'=>$model,
                                        'user'=>$user, 
                                        'po'=>$po,
                                        'region'=>$counter,
                                        'main_cat'=>$main_cat,
                                        'sub_cat'=> $sub_cat  
                                          ]);
    }
    
    public function actionConfirmsubmit($id)
    {
        $model =  \frontend\models\Advertisements::findOne(['id'=>$_GET['id']]);
        $this->Sentsms($model->mobile_number, $model->v_code);
        Yii::$app->session->setFlash('success', 'Enter your confirmation code.');
        return $this->redirect(\Yii::$app->urlManager->createUrl("site/verifysms_ad")); 
    }

    public function actionEditAd($id)
    {
        $pid=$_GET['id'];
        if (\Yii::$app->user->isGuest) {    
             Yii::$app->session->setFlash('success', 'Please Login First.');
              return $this->redirect(['login']);
        }

        $id = Yii::$app->user->id;
        $user = User::findOne(['id'=>$id]);
        $model =  \frontend\models\Advertisements::findOne(['id'=>$pid]); 
       $model->category_id;
      $cat = \frontend\models\Category::findOne(['id'=>$model->category_id]);
      $cat_name = $cat->title;
       $cat_id = $cat->id;
       
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
       $model->user_id = Yii::$app->user->id;
       $model->created_date = date("Y-m-d H:i:s");
       $model->v_code = rand(1000, 9999);
       $model->email = $user->email;
       $model->status = 0;
       $model->ad_status = 0;
        
        
           if($model->save()){
            if(isset($model->additional_field)){
             foreach($model->additional_field as $op_field){
                  $ad_f = new \frontend\models\FormAdditionalValues;
                 $ad_f->ad_id = $model->id;
                 $ad_f->field_id = $op_field;
                 $ad_f->values = $_POST['Advertisements'][$op_field];
                 $ad_f->save();
           
               }}
               
           }
           $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
          
          $model->advertise_title;
           
            if ($model->upload()) {
                // file is uploaded successfully
                if(isset($_POST['perview_true'])){
                    $preview = $_POST['perview_true'];
                }else{
                     $preview = 0;
                }
               if ( $preview==1){
                //  return $this->redirect(\Yii::$app->urlManager->createUrl("site/edit-ad",['id'=>$model->id,"new"=>1])); 
                Yii::$app->response->redirect(['advertisement/ad-view','id'=>$model->id,"new"=>1]);
                    
                }else{
                $this->Sentsms($model->mobile_number, $model->v_code);
                $this->Sentsms($model->mobile_number, $model->v_code);
                Yii::$app->session->setFlash('success', 'Enter your confirmation code.');
                return $this->redirect(\Yii::$app->urlManager->createUrl("site/verifysms_ad")); 
                }
            }
        }
        $main_cat = \frontend\models\Category::find()->where(['parent_id'=>0])->all();
        $sub_cat = \frontend\models\Category::find()->where('parent_id != :parent_id', ['parent_id'=>0])->all();
        $regions =  \frontend\models\Region::find()->all();

        $counter=ArrayHelper::map($regions,'id','name');
        
        

        $imgs=  \backend\models\Images::find()->where(['advertise_id'=>$pid])->all();
        
       return $this->render('edit-ad',['model'=>$model,
                                        'user'=>$user, 
                                        'region'=>$counter,
                                       'main_cat'=>$main_cat,
                                        'sub_cat'=> $sub_cat,
                                        'imgs'=>$imgs,
                                        'cat_name'=>$cat_name,
                                        'cat_id'=>$cat_id,
                                        'cat'=>$cat
                                          ]);
    }
    

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }
    
    
    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new TmpUser();
        
        if ($model->load(Yii::$app->request->post())) {
              if(isset($_GET['type'])){
                  $is_company=$_GET['type'];
              }else{
                  $is_company=0;
              }
            if ($model->validate()) {
                $model->username = $model->email;

                $model->v_code =  rand(1000, 9999);
                $model->created_at = date('y-m-d');
                $model->is_company = $is_company;
                $model->com_url = "$model->com_url";
                $model->save();
                $v_code = $model->v_code;
                $mobile = $model->mobile;
             $err = $this->sentsms($mobile, $v_code);
                //-------------------
                $email_user = Email::find()->where(['id'=>4])->orderBy(['id' => SORT_DESC])->one();
                $email_admin = Email::find()->where(['id'=>5])->orderBy(['id' => SORT_DESC])->one();
                
                $to = $model->email;
                
                $to_admin = "info@virtual-developers.com";
                
                
            $subject = $email_user->title;
            $link = Yii::$app->urlManager->createAbsoluteUrl('site/verifycode')."&code=".$v_code;
            $message = str_replace("{link}", $link, $email_user->content);
            $subject_admin = $email_admin->title;
            $message_admin = $email_admin->content; 
            
//            $headers = "";
//            $headers .= "MIME-Version: 1.0\n";
//            $headers .= "Content-Type: multipart/mixed; boundary=\"\"\n\n";
//            $headers .= "This is a multi-part message in MIME format.\n";
//            $headers .= "--\n";
//            //$headers .= "Content-type: text/html; charset=utf-8\n";
//            $headers .= "Content-type: text/html; charset=iso-8859-1\n";
//            $headers .= "From: Devtesting<Info@devtesting.com >\n\n";
//            $headers = "From: Info@devtesting.com \r\n";
//            $headers .= "Reply-To: info@virtual-developers.com \r\n";
//            $headers .= "MIME-Version: 1.0\r\n";
//            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
//                
//                
//            mail($to, $subject, $message, $headers);
//            mail($to_admin, $subject_admin, $message_admin, $headers);
            Yii::$app->mailer->compose()
            ->setFrom('info@virtual-developers.com')
            ->setTo($to)
            ->setSubject($subject)
            ->setHtmlBody($message)
            ->send();

            Yii::$app->mailer->compose()
            ->setFrom('info@virtual-developers.com')
            ->setTo($to_admin)
            ->setSubject($subject_admin)
            ->setHtmlBody($message_admin)
            ->send();
       
            Yii::$app->session->setFlash('success', 'Please Enter your registration Code to complete your registration');
                return $this->redirect(\Yii::$app->urlManager->createUrl("site/verifycode"));   
            }
        }
       
        return $this->render('signup', [
            'model' => $model,
        ]);
    }
    public function Sentsms($mobile, $v_code) {
        
       $email_user = Email::find()->where(['id'=>6])->orderBy(['id' => SORT_DESC])->one();
       $message = str_replace("{code}", $v_code, $email_user->content);
      
        $username = '923453130776';
        $password = '1785';
        $destination = $mobile;
        $source    = 'FROM NAME';
        $text = strip_tags($message);
        
    $content =  '&username='.rawurlencode($username).
                '&password='.rawurlencode($password).
                '&mobile='.rawurlencode($destination).
                '&sender='.rawurlencode($source).
                '&message='.rawurlencode($text);
    
        $ch = curl_init('http://sendpk.com/api/sms.php?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec ($ch);
        curl_close ($ch);
       // print_r($output); exit;
        return $output;    
    
    }
    
    /**
     * Signs user up after cod verification.
     *
     * @return mixed
     */
    public function actionVerifycode(){
        if(isset($_POST['code'])){
         $code = $_POST['code'];
         $find = \frontend\models\TmpUser::find()->where(['v_code'=>$code])->one();
       
         if (!empty($find)){
             // users exists
//              Yii::$app->session->setFlash('success', 'Your Registion Completed Sucessfully Please login ');
              $find = \frontend\models\TmpUser::find()->where(['v_code'=>$code])->one();
            $find->email;
            $find->password_hash;
            $find->username;
            $find->mobile;
            $user = new \frontend\models\User2;
            $user->username=$find->username;
            $user->email = $find->email;
            $user->mobile = $find->mobile;
            $user->is_company = $find->is_company;
            $user->status = 10;
             $user->com_url =  $find->com_url;
            $user->password_hash = Yii::$app->getSecurity()->generatePasswordHash($find->password_hash);
          if($user->save()){
            Yii::$app->session->setFlash('success', 'Your Registration has been completed sucessfully... Please login');
          $noti = new NotificationAdmin;
         if( $noti->usercreated($user->id)){
            return  $this->redirect(array("login"));
         }
          }
            } else {
             // user does not exist 
               Yii::$app->session->setFlash('success', 'Please tyr again ');
               return $this->render('verifycode');    
                  
                }
                 
        }
         if(isset($_GET['code'])){
            $code = $_GET['code'];
            $find = \frontend\models\TmpUser::find()->where(['v_code'=>$code])->one();
           
            $user = new \frontend\models\User2;
            $user->username=$find->username;
            $user->email = $find->email;
            $user->mobile = $find->mobile;
            $user->is_company = $find->is_company;
            $user->status = 10;
            $user->password_hash = Yii::$app->getSecurity()->generatePasswordHash($find->password_hash);
          if($user->save()){
            Yii::$app->session->setFlash('success', 'Your Registration has been completed sucessfully ... Please login');
            return  $this->redirect(array("login"));
          }
             
         }
        return $this->render('verifycode'); 
                  }
                  
        public function actionVerifycodesms(){
        if(isset($_POST['code'])){
         $code = $_POST['code'];
         $find = \frontend\models\User::find()->where(['sms_verify'=>$code])->one();
       
         if (!empty($find)){
             // users exists
//              Yii::$app->session->setFlash('success', 'Your Registion Completed Sucessfully Please login ');
              
             $find->email;
             $find->password_hash;
             $find->username;
             $find->mobile;
//           
          return  $this->redirect(["password", 'id'=>$find->id]);
             if($user->save()){
            Yii::$app->session->setFlash('success', 'Your Registration has been completed sucessfully... Please login');
            return  $this->redirect(array("login"));
          }
            } else {
             // user does not exist 
               Yii::$app->session->setFlash('success', 'Please tyr again ');
               
                  
                }
                 
        }
        
        return $this->render('verifycode'); 
                  }
                  
                  
     public function actionPassword($id){
        $model = new \frontend\models\Password();
          if ($model->load(Yii::$app->request->post())) {
           $model->password_hash;
//           $id = $_GET['id'];
            $hash = Yii::$app->getSecurity()->generatePasswordHash($model->password_hash);
      
           
            $sql="UPDATE `user` SET `password_hash`='$hash' WHERE `id`='$id'";
            \Yii::$app->db->createCommand($sql)->execute();
          $query =  Yii::$app->session->setFlash('success', 'Passwor Updated.');
//          if(isset($query)){
          return $this->redirect(['site/index']);
//          }
          }
       
                 
         return $this->render('resetPasswordsms', [
            'model' => $model,
        ]);
                      
                  }
         
                   /**
     * Requests password reset.
     *
     * @return mixed
     */
     public function actionRstsms()
    {
        $model = new PasswordResetRequestsms();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($v_code=$model->sendSms()) {
//            echo $model->mobile."<br />";
//            echo $v_code;
          $this->Sentsms($model->mobile, $v_code);
                  Yii::$app->session->setFlash('success', 'Please Enter your Code to Reset your Password');
//                return $this->goHome();
                 return $this->redirect(\Yii::$app->urlManager->createUrl("site/verifycodesms")); 
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset your password for the provided email.');
            }
        }

        return $this->render('requestPasswordResetTokensms', [
            'model' => $model,
        ]);
    }
                  

    /**
     * Requests password reset.
     *
     * @return mixed
     */
     public function actionRst()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Please check your email for further instructions.');

                Yii::$app->mailer->compose()
                ->setFrom('from@domain.com')
                ->setTo('to@domain.com')
                ->setSubject('Message subject')
                ->setTextBody('Plain text content')
                ->setHtmlBody('<b>HTML content</b>')
                ->send();
                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset your password for the provided email.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Please check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for provided email.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'Congratulation! New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    
    public function actionCjob()
    {
         //$tam = new TmpUser();
        $tmpusers = TmpUser::find()->all();
        foreach($tmpusers as $tmpuser){
          $datetime1 = date_create($tmpuser->created_at);
          $datetime2 = date_create(date('y-m-d'));
          $interval = date_diff($datetime1, $datetime2);
          
          if($interval->format('%a') >= 2){
            $id =  $tmpuser->id;
            TmpUser::findOne($id)->delete();
            }
        }     
    }
    
    public function actionPromotiondeals(){
        $page_content = \backend\models\PromotionDeals::find()->where(['key'=>'key_1'])->all();
        return $this->render('promotiondeals', [
            'page_content' => $page_content,
        ]);
        
    }
    
    public function actionNewpromotiondeals(){
        $page_content = \backend\models\PromotionDeals::find()->where(['key'=>'key_2'])->all();
        return $this->render('newPromotionDeals', [
            'page_content' => $page_content,
        ]);
        
    }
    
    public function actionPackages(){
        $page_content = \backend\models\PromotionDeals::find()->where(['key'=>'key_3'])->all();
        return $this->render('packages', [
            'page_content' => $page_content,
        ]);
        
    }
    function actionSms() {
        
//       $email_user = Email::find()->where(['id'=>6])->orderBy(['id' => SORT_DESC])->one();
//       $message = str_replace("{code}", $v_code, $email_user->content);
      
        $username = '923453130776';
        $password = '1785';
        $destination = '+923150208667';
        $source    = 'FROM NAME';
        $text = 'ponka';
        
    $content =  '&username='.rawurlencode($username).
                '&password='.rawurlencode($password).
                '&mobile='.rawurlencode($destination).
                '&sender='.rawurlencode($source).
                '&message='.rawurlencode($text);
    
        $ch = curl_init('http://sendpk.com/api/sms.php?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec ($ch);
        curl_close ($ch);
       // print_r($output); exit;
        return $output;    
   
    }
    
    /**
     * This will return the array of additional/optional fields
     * Takes id of category
     * @return mixed
     */
    public function actionOptionalfields($id)
    {
        $cat_op_fld = \backend\models\CategoryAdditionalFields::find()->where(['category_id'=>$id])->all();

        foreach($cat_op_fld as $optionals){
        $field = \backend\models\FilterName::find()->where(['id'=>$optionals->optional_field_id, 'status'=>1])->one();

        $dd_option_id =   \backend\models\FilterName::find()->where(['parent_filter'=>$field->id])->all();

        if($field->display_for_adpost_page == 1) //Dropdown
        {
            echo "<div class='input-group contact-field-wrap'>
                      <label>" . $field['filter_name'] . "</label>
                      <select  name='Advertisements[additional_optional][". $field['id'] ."][]' id='advertisements-advertise_title' onchange='subdropdown(this)' name='' class='form-control'><option>Please select</option>
                      </div>";

            foreach ($dd_option_id as $a_value) 
            {
                 //print_r($a_value->id);
                // $dd_option_main = \backend\models\FilterName::find()->where(['id'=>$a_value->filter_field_key])->all();
                 echo '<option data_value="'. $a_value['id']  .'" value="'. $a_value['filter_name']  .'">'. $a_value['filter_name'] .'</option>';         
            }
            echo "</select></div>";
       }
       
       if($field->display_for_adpost_page == 2) //CheckBox
       {
           echo "<div class='custm-check'>
                     <label>" . $field['filter_name'] . "</label>";
           
           foreach ($dd_option_id as $a_value) 
           {
               echo "<input name='Advertisements[additional_optional][". $field['id'] ."][]' type='checkbox' class='custom-box-ch' value='" . $a_value['filter_name'] . "'><span class='txt-shk'>" . $a_value['filter_name'] . "</span>";               
           }
           
           echo "</div>";
       }
       
       if($field->display_for_adpost_page == 3) //TextBox Number
       {
            echo "<div class='input-group contact-field-wrap'>
            <label>" . $field['filter_name'] . "</label>
            <input class='form-control' type='number' name='Advertisements[additional_optional][". $field['id'] ."][]' value=''>
            </div>";
       }
       
       if($field->display_for_adpost_page == 4) //TextBox
       {
            echo "<div class='input-group contact-field-wrap'>
            <label>" . $field['filter_name'] . "</label>
            <input class='form-control' type='text' name='Advertisements[additional_optional][". $field['id'] ."][]' value=''>
            </div>";
       }
       
       if($field->display_for_adpost_page == 5) //Range
       {
           //First Range Textbox
            echo "<div class='input-group contact-field-wrap'>
            <label>" . $field['filter_name'] . "</label>
                  <input type='number' placeholder ='To' class='form-control' name='Advertisements[additional_optional][". $field['id'] ."][]' value=''></div>";
            
            //Second Range Textbox
            echo "<div class='input-group contact-field-wrap'>
            <label>" .                         "</label>
                  <input type='number' placeholder ='From' class='form-control'  name='Advertisements[additional_optional][". $field['id'] ."][]'
              value=''></div>";

            echo "<input class='form-control' type='hidden' name='Advertisements[additional_optional][id]' value='" . $field['id'] . "'></div>";
       }
       
       if($field->display_for_adpost_page == 6) //DatePicker
        {
            //Datepicker Range Textbox
            echo "<div class='input-group contact-field-wrap'>";      
            echo '<label class="control-label">Birth Date</label>';
            echo '<input type="text" id="datafilter" name="Advertisements[additional_optional]['. $field['id'] .'][]" /> ';
            echo "</div>";
        }
       }       
    }    
    public function actionGetimg($id)
    {
       $cateimg = \frontend\models\Category::find()->where(['id'=>$id])->one();
       echo $cateimg->image;    
    }
       
    public function actionVerifysms_ad(){
    if(isset($_POST['code'])){
     $code = $_POST['code'];
     $find = \frontend\models\Advertisements::find()->where(['v_code'=>$code])->one();
     if (!empty($find)){
         // users exists
          Yii::$app->session->setFlash('success', 'Your ad is now pending for Admin Approval');

          $user = \common\models\User::findOne(Yii::$app->user->id);
          
            $email_user = Email::find()->where(['id'=>21])->orderBy(['id' => SORT_DESC])->one();
            Yii::$app->mailer->compose()
            ->setFrom('info@virtual-developers.com')
            ->setTo($user->email)
            ->setSubject($email_user->title)
            ->setHtmlBody($email_user->content)
            ->send();
          
          
        $find->v_code = 1;
       $find->save();
       
                $categoryce=  \frontend\models\Category::find()->Where(['id'=>$find->category_id])->one();
                $modelce= new \frontend\models\CreditsExpense();
           

         $modelce->user_id=Yii::$app->user->id;
         $modelce->ad_id=$find->id;
         $modelce->credit_exp= $categoryce->credits;
         $modelce->date= date('Y-m-d');
         $modelce->save();
       
       return  $this->goHome();
        Yii::$app->session->setFlash('success', 'Your');

        } else {
         // user does not exist 
           Yii::$app->session->setFlash('success', 'Please try again ');


            }

    }

    return $this->render('verifycode'); 

    }
    
    public function actionSubmitad_preview(){
        if (\Yii::$app->user->isGuest)
        {
            Yii::$app->session->setFlash('success', 'Please Login First.');
            return $this->redirect(['login']);
        }

        $id = Yii::$app->user->id;
        $user = User::findOne(['id'=>$id]);
        $model = new \frontend\models\Advertisements(); 
        //$model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
        
        
        if(isset($_POST['preview']))
        {
            
            
            if ($model->load(Yii::$app->request->post())){
                $model->user_id = Yii::$app->user->id;
                $model->created_date = date("Y-m-d H:i:s");
                $model->email = $user->email;
                $model->advertise_title;
                $model->category_id;
                $model->description;
                $model->price;
                $model->contact_name;
                $model->mobile_number;
                $model->state_id;
                $model->city_id;
                $model->address;
                $model->mobile_number;
                //$model->imageFiles[];                
                $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
                $model->uploadtmp();
//                print_r($model->imageFiles);
//                echo '<pre>';                
//                print_r($_FILES['imageFiles'][0]);
//                echo '</pre>';
//                exit();
               
                
            }
            
            
            
            
            
            
            
            if(isset($model->additional_field)){
                foreach($model->additional_field as $op_field){
                    $ad_f = new \frontend\models\FormAdditionalValues;
                    $ad_f->ad_id = $model->id;
                    $ad_f->field_id = $op_field;
                    $ad_f->values = $_POST['Advertisements'][$op_field];
           
               }}
               
            $main_cat = \frontend\models\Category::find()->where(['parent_id'=>0])->all();
        $sub_cat = \frontend\models\Category::find()->where('parent_id != :parent_id', ['parent_id'=>0])->all();
        $regions =  \frontend\models\Region::find()->all();
        
        $counter=ArrayHelper::map($regions,'id','name');   
        return $this->render('ad-viewpreview',['model'=>$model,
                'user'=>$user, 
                'region'=>$counter,
                'main_cat'=>$main_cat,
                'sub_cat'=> $sub_cat  
                  ]);
            
        }
//        $main_cat = \frontend\models\Category::find()->where(['parent_id'=>0])->all();
//        $sub_cat = \frontend\models\Category::find()->where('parent_id != :parent_id', ['parent_id'=>0])->all();
//        $regions =  \frontend\models\Region::find()->all();
//        
//        $counter=ArrayHelper::map($regions,'id','name');
//        
//        
//       return $this->render('submitad',['model'=>$model,
//                                        'user'=>$user, 
//                                        'region'=>$counter,
//                                        'main_cat'=>$main_cat,
//                                        'sub_cat'=> $sub_cat  
//                                          ]);
        
    }
    

    
    public function actionDeleteImage($id)
    {
    // $id =  $tmpuser->id;
            \backend\models\Images::findOne($id)->delete(); 
            return true;
    }
    
    //This function use then user click any dropdown option to bring the new dynamic dropdown or checkbox field.
    public function actionSub_dd_options($id){
		
    		// if($id == null)
    		// {
    		// 	return 0;
    		// }
        Yii::$app->response->format = Response::FORMAT_JSON;

        $filter_main =   \backend\models\FilterName::find()->where(['id'=>$id])->one();

        $dd_option_id =   \backend\models\FilterName::find()->where(['parent_filter'=>$id])->all();
        $dd_option_id_count =   \backend\models\FilterName::find()->where(['parent_filter'=>$id])->count();
     
       if($filter_main->display_for_adpost_page == 1) //Dropdown
       {
           if($dd_option_id_count != 0){
           echo "<div class='input-group contact-field-wrap'>
                     <label>" . $filter_main['filter_name'] . "</label>
                     <select name='Advertisements[additional_optional][". $filter_main['id'] ."][]' id='advertisements-advertise_title' onchange='subDropdown(this)' name='' class='form-control'><option>Please select</option>
                     ";
           
           foreach ($dd_option_id as $a_value) 
           {
                //print_r($a_value->id);
               // $dd_option_main = \backend\models\FilterName::find()->where(['id'=>$a_value->filter_field_key])->all();
                echo '<option value="'. $a_value['filter_name']  .'">'. $a_value['filter_name'] .'</option>';         
           }
           echo "</select></div>";
            }
       }
       
       if($filter_main->display_for_adpost_page == 2) //CheckBox
       {
           if($dd_option_id_count != 0){
           echo "<div class='custm-check'>
                     <label>" . $filter_main['filter_name'] . "</label>";
           
           foreach ($dd_option_id as $a_value) 
           {
               echo "<input name='Advertisements[additional_optional][". $filter_main['id'] ."][]' type='checkbox' class='custom-box-ch' value='" . $a_value['filter_name'] . "'><span class='txt-shk'>" . $a_value['filter_name'] . "</span>";              
           }
           
           echo "</div>";
           }
       }
    }        
    
  public function actionHowitworks()
    {
        
        $content=  \backend\models\Content::find()->where(['status'=>1])->andWhere(['id'=>7])->one();
        
        return $this->render('howitworks',['content'=>$content]);
    }
    
    public function actionWhoweare()
    {
        
        $content=  \backend\models\Content::find()->where(['status'=>1])->andWhere(['id'=>1])->one();
        
        return $this->render('whoweare',['content'=>$content]);
    }
    
    public function actionSafetyTips()
    {
        
        $content=  \backend\models\Content::find()->where(['status'=>1])->andWhere(['id'=>2])->one();
        
        return $this->render('safety-tips',['content'=>$content]);
    }
    
    public function actionTermsOfUse()
    {
        
        $content=  \backend\models\Content::find()->where(['status'=>1])->andWhere(['id'=>3])->one();
        
        return $this->render('terms-of-use',['content'=>$content]);
    }
    
    public function actionHelpAndContact()
    {
        
        $content=  \backend\models\Content::find()->where(['status'=>1])->andWhere(['id'=>4])->one();
        
        return $this->render('help-and-contact',['content'=>$content]);
    }
    
    
    public function actionFaqs()
    {
        
        $content=  \backend\models\Content::find()->where(['status'=>1])->andWhere(['id'=>5])->one();
        
        return $this->render('faqs',['content'=>$content]);
    }
    
    public function actionMission()
    {
        
        $content=  \backend\models\Content::find()->where(['status'=>1])->andWhere(['id'=>6])->one();
        
        return $this->render('mission',['content'=>$content]);
    }
    public function actionUsingApplication()
    {
       $content=  \backend\models\Content::find()->where(['status'=>1])->andWhere(['id'=>8])->one();
        
        return $this->render('using-application',['content'=>$content]);
    }

    public function Filter_options($category_id){
      
      $cat_op_fld = \backend\models\CategoryAdditionalFields::find()->where(['category_id'=>$category_id])->all();
        
        foreach($cat_op_fld as $optionals){
    $field = \backend\models\FilterName::find()->where(['id'=>$optionals->optional_field_id, 'status'=>1])->one();

     $dd_option_id =   \backend\models\FilterName::find()->where(['parent_filter'=>$field->id])->all();
     
       if($field->display_for_adpost_page == 1) //Dropdown
       {
           echo "<div class='input-group contact-field-wrap'>
                     <label>" . $field['filter_name'] . "</label>
                     <select name='Advertisements[additional_optional][". $field['id'] ."][]' id='advertisements-advertise_title' onchange='subDropdown(this)' name='' class='form-control'><option>Please select</option>
                     </div>";
           
           foreach ($dd_option_id as $a_value) 
           {
                //print_r($a_value->id);
               // $dd_option_main = \backend\models\FilterName::find()->where(['id'=>$a_value->filter_field_key])->all();
                echo '<option value="'. $a_value['id']  .'">'. $a_value['filter_name'] .'</option>';         
           }
           echo "</select>";
       }
    }
    
    }
    
}       
