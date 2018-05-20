<?php

namespace backend\controllers;

use Yii;
use backend\models\CommercialAds;
use backend\models\CommercialAdsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\AccessRule;
use yii\filters\AccessControl;
use common\models\Admin;
use yii\web\UploadedFile;


/**
 * CommercialAdsController implements the CRUD actions for CommercialAds model.
 */
class CommercialAdsController extends Controller
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
     * Lists all CommercialAds models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CommercialAdsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CommercialAds model.
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
     * Creates a new CommercialAds model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CommercialAds();

        $model->scenario = CommercialAds::SCENARIO_CREATE;

        if ($model->load(Yii::$app->request->post()))
        {
            $model->top_ad = UploadedFile::getInstance($model, 'top_ad');
            $model->left_ad = UploadedFile::getInstance($model, 'left_ad') ;
            $model->right_ad = UploadedFile::getInstance($model, 'right_ad');
            $model->centre_ad = UploadedFile::getInstance($model, 'centre_ad');
            $model->bottom_ad = UploadedFile::getInstance($model, 'bottom_ad');

            $model->save();
            $model->upload();
//            return $this->redirect(['view', 'id' => $model->id]);
             return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CommercialAds model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
//        $model->scenario = CommercialAds::SCENARIO_UPDATE;
        
         $one = $model->top_ad;
         $two = $model->left_ad;
         $three = $model->right_ad;
         $four = $model->centre_ad;
         $five = $model->bottom_ad;
        if ($model->load(Yii::$app->request->post())){
          
            $model->top_ad = UploadedFile::getInstance($model, 'top_ad');
            $model->left_ad = UploadedFile::getInstance($model, 'left_ad') ;
            $model->right_ad = UploadedFile::getInstance($model, 'right_ad');
            $model->centre_ad = UploadedFile::getInstance($model, 'centre_ad');
            $model->bottom_ad = UploadedFile::getInstance($model, 'bottom_ad');

                $model->upload();
           if(!isset($model->top_ad->baseName)){ echo $model->top_ad=$one; } 
           if(!isset($model->left_ad->baseName)){ echo $model->left_ad=$two; }
           if(!isset($model->right_ad->baseName)){ echo $model->right_ad=$three; }
           if(!isset($model->centre_ad->baseName)){ echo $model->centre_ad=$four; }
           if(!isset($model->bottom_ad->baseName)){ echo $model->bottom_ad=$five; }
                $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CommercialAds model.
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
     * Finds the CommercialAds model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CommercialAds the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CommercialAds::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
