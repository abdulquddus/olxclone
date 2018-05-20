<?php

namespace backend\controllers;

use Yii;
use backend\models\OptionalFields;
use backend\models\OptionalFieldsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\AccessRule;
use yii\filters\AccessControl;
use common\models\Admin;
use backend\models\OptionalfieldBridgeTable;
use backend\models\FilterName;


/**
 * OptionalFieldsController implements the CRUD actions for OptionalFields model.
 */
class OptionalFieldsController extends Controller
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
    'only' => ['create', 'update', 'delete'],
    'rules' => [
        [
            'actions' => ['create'],
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
     * Lists all OptionalFields models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OptionalFieldsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OptionalFields model.
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
     * Creates a new OptionalFields model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OptionalFields();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
             $bridge =  OptionalfieldBridgeTable::findOne(['optional_field_key'=>$model->id]);
        if(isset($bridge))
        {
            
            $bridge->deleteAll();
        }
            $filtername = FilterName::find()->where(['id'=>$model->opk])->all();
            foreach($filtername as $fl)
            {
                $bridge2 = new OptionalfieldBridgeTable();
              echo  $bridge2->optional_field_key=$model->id;
               echo  $bridge2->filter_field_key=$fl->id;
                $bridge2->save();
            }
            if(!empty($_POST['additionalfields']))
            {
                $fields=$_POST['additionalfields'];
 
            }           
             return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing OptionalFields model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
       
         $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
             $model->save();
             //echo $model->id;
           
        $bridge =  OptionalfieldBridgeTable::findOne(['optional_field_key'=>$model->id]);
        if(isset($bridge))
        {
            
            $bridge->deleteAll();
        }
            $filtername = FilterName::find()->where(['id'=>$model->opk])->all();
            foreach($filtername as $fl)
            {
                $bridge2 = new OptionalfieldBridgeTable();
              echo  $bridge2->optional_field_key=$model->id;
               echo  $bridge2->filter_field_key=$fl->id;
                $bridge2->save();
            }
            if(!empty($_POST['additionalfields']))
            {
                $fields=$_POST['additionalfields'];
 
            }            
           return $this->redirect(['view', 'id' => $model->id]);
        }
        
        else {
              $query = "select id, filter_name from filter_name where id in (SELECT `filter_field_key` from `optionalfield_bridge_table` where `optional_field_key` = $model->id)";
            
            $caf = \Yii::$app->db->createCommand($query)->queryAll();
            
            if($caf != ''){
                return $this->render('update', [
                'model' => $model,'caf'=>$caf,
            ]);
            }

      
            }
    }

    /**
     * Deletes an existing OptionalFields model.
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
     * Finds the OptionalFields model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OptionalFields the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OptionalFields::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
