<?php



namespace frontend\controllers;



use Yii;

use frontend\models\Category;

use frontend\models\CategorySearch;

use yii\web\Controller;

use yii\web\NotFoundHttpException;

use yii\filters\VerbFilter;

use yii\web\Response;

use yii\helpers\ArrayHelper;



/**

 * CategoryController implements the CRUD actions for Category model.

 */

class CategoryController extends Controller

{

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

     * Lists all Category models.

     * @return mixed

     */

    public function actionIndex()



    { 

        if (!\Yii::$app->user->isGuest) {

           $this->layout = 'main_login';

           }  else {

               return $this->goHome(); 

           }

        $searchModel = new CategorySearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);



        return $this->render('index', [

            'searchModel' => $searchModel,

            'dataProvider' => $dataProvider,

        ]);

    }



    /**

     * Displays a single Category model.

     * @param integer $id

     * @return mixed

     */

    public function actionView($id)

    {

        return $this->render('view', [

            'model' => $this->findModel($id),

        ]);

    }



    

    public function actionCategories()

    {       
        $this->layout = 'main_inner';
        if(isset($_GET['id'])){

       $id = $_GET['id'];

    }else{

        $id=1;

    }

         

        $categories = \backend\models\Category::find()

            ->where("parent_id = '$id' and status=1")

            ->all();



//        Slient this code because users are not able to open

//        next sub category page of this login required.

//        if (!\Yii::$app->user->isGuest) {

//        $this->layout = 'main_login';

//        }  else {

//            return $this->goHome(); 

//        }

        $ads = new \frontend\models\Advertisement();

    

       return $this->render('categories', ['categories' => $categories, 'id'=>$id, 'ads'=>$ads]);

    }

    /**

     * Creates a new Category model.

     * If creation is successful, the browser will be redirected to the 'view' page.

     * @return mixed

     */

    public function actionCreate()

    {

        $model = new Category();



        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);

        } else {

            return $this->render('create', [

                'model' => $model,

            ]);

        }

    }



    /**

     * Updates an existing Category model.

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

     * Deletes an existing Category model.

     * If deletion is successful, the browser will be redirected to the 'index' page.

     * @param integer $id

     * @return mixed

     */

    public function actionDelete($id)

    {

        $this->findModel($id)->delete();



        return $this->redirect(['index']);

    }



    

     public function actionGetchild($id)

    {

        Yii::$app->response->format = Response::FORMAT_JSON;

        $childs = new Category();

//        print_r($childs->getchildtlist($id));

      return $childs->getchildtlist($id);

    }

     public function actionGetname($id)

    {

        Yii::$app->response->format = Response::FORMAT_JSON;

        $childs = Category::findOne($id);

//        print_r($childs->getchildtlist($id));

      return $childs->title;

    }

     

    public function actionGetfilters($id)

    {

        Yii::$app->response->format = Response::FORMAT_JSON;

        $cat_fields = \frontend\models\CatetoryAdditionalFields::find()->where(['category_id'=>$id])->all();

           $ids = ArrayHelper::map($cat_fields, 'id', 'optional_field_id');

           

//                     foreach($ids as $id){

//                         echo $id."<br />";

//                     }          

           

           $opf= \frontend\models\OptionalFields::find()->where(['id'=>$ids])->all();

//          print_r($opf);

        return $opf;

    }

    public function mfunction($v)

                 {

                

                 return $v->optional_field_id;

                 }  

    

    /**

     * Finds the Category model based on its primary key value.

     * If the model is not found, a 404 HTTP exception will be thrown.

     * @param integer $id

     * @return Category the loaded model

     * @throws NotFoundHttpException if the model cannot be found

     */

    protected function findModel($id)

    {

        if (($model = Category::findOne($id)) !== null) {

            return $model;

        } else {

            throw new NotFoundHttpException('The requested page does not exist.');

        }

    }



    public function actionGet_all_categories(){

        Yii::$app->response->format = Response::FORMAT_JSON;

        $id = $_GET['id'];



        $all_categories = \backend\models\Category::find()

            ->where("parent_id = '$id' and status=1")

            ->all();

            return $all_categories;

    }

    

    public function actionGet_main_category(){

        Yii::$app->response->format = Response::FORMAT_JSON;

        $id = $_GET['id'];



        $all_categories = \backend\models\Category::find()

            ->where("id = '$id' and status=1")

            ->all();

            return $all_categories;

    }

    

    public function actionAds_counts($id){

       $ads = new \frontend\models\Advertisement();

       $total_ads = $ads->getadcount($id);

    

       return $total_ads;

    }

}

