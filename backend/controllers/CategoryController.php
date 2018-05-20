<?php

namespace backend\controllers;

use backend\models\Category;
use backend\models\CategorySearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use common\components\AccessRule;
use yii\filters\AccessControl;
use common\models\Admin;
use mPDF;
use yii\web\Response;

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
        'access' => [
                   'class' => AccessControl::className(),
                   // We will override the default rule config with the new AccessRule class
                   'ruleConfig' => [
                       'class' => AccessRule::className(),
                   ],
                   'only' => ['index','create', 'update', 'delete'],
                   'rules' => [
                       [
                           'actions' => ['index','create'],
                           'allow' => true,
                           // Allow users, moderators and admins to create
                           'roles' => [
                               Admin::ROLE_USER,
                               Admin::ROLE_MODERATOR,
                               Admin::ROLE_ADMIN
                           ],
                       ],
                       [
                           'actions' => ['update'],
                           'allow' => true,
                           // Allow moderators and admins to update
                           'roles' => [
                               Admin::ROLE_MODERATOR,
                               Admin::ROLE_ADMIN
                           ],
                       ],
                       [
                           'actions' => ['delete'],
                           'allow' => true,
                           // Allow admins to delete
                           'roles' => [
                               Admin::ROLE_ADMIN
                           ],
                       ],
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
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $cate =  Category::find()->where(['parent_id'=>0])->all();
        $category = new Category();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'cate' => $cate,
            'category'=>$category
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

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();
        $model->scenario = Category::SCENARIO_CREATE;

        if ($model->load(Yii::$app->request->post())) 
            {
                if($model->image = UploadedFile::getInstance($model, 'image'))
                {
                    $model->save();
                    $image =   $model->upload();        
                }          
            
            if(!empty($_POST['additionalfields']))
            {
                $fields=$_POST['additionalfields'];
                foreach ($fields as $opfields)
                {
                    $sql="INSERT INTO `category_additional_fields`(`category_id`,`optional_field_id`) VALUES('".$model->id."','$opfields')";
                \Yii::$app->db->createCommand($sql)->execute();
                    
                }
            }
//            return $this->redirect(['view', 'id' => $model->id]);
             return $this->redirect(['index']);
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) 
        {
            if($model->image = UploadedFile::getInstance($model, 'image'))
            {
                $image =   $model->upload();        
                $model->save();
            }
           
            if(!empty($_POST['additionalfields']))
            {
                $fields= array_merge($_POST['additionalfields']);
                $model->custom_update($model->id, $fields);
                
            }  else {
                $model->custom_update_delete($model->id);
                
            }
                 
            return $this->redirect(['view', 'id' => $model->id]);
        }
        
        else
        {
            
            $query = "SELECT filter_name, optional_field_id FROM filter_name, category_additional_fields where category_additional_fields.category_id = $model->id and category_additional_fields.optional_field_id = filter_name.id";
            
            $caf = \Yii::$app->db->createCommand($query)->queryAll();
           
            if($caf != ''){
                return $this->render('update', [
                'model' => $model,'caf'=>$caf,
            ]);
            }
            
            if($additionalfields == Null)
            {
                return $this->render('update', [
                'model' => $model, 'caf'=>'',
            ]);
                
            }
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
    
    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    
    
    public function actionPdf() {
 
        $mpdf = new mPDF;
        $mpdf->WriteHTML('<p>Hallo World</p>');
        $mpdf->Output();
        exit;
    }
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionDd_options($id){
		
		if($id == null)
		{
			return 0;
		}
        Yii::$app->response->format = Response::FORMAT_JSON;    
        $results = \backend\models\FilterName::find()->where(['parent_filter'=>$id, 'status'=>1])->all();
        return $results;
    }
                
}
