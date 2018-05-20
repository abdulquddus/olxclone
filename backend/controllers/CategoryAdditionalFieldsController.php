<?php

namespace backend\controllers;

use Yii;
use backend\models\CategoryAdditionalFields;
use backend\models\CategoryAdditionalFieldsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\AccessRule;
use yii\filters\AccessControl;
use common\models\Admin;


/**
 * CategoryAdditionalFieldsController implements the CRUD actions for CategoryAdditionalFields model.
 */
class CategoryAdditionalFieldsController extends Controller
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
     * Lists all CategoryAdditionalFields models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategoryAdditionalFieldsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CategoryAdditionalFields model.
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
     * Creates a new CategoryAdditionalFields model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CategoryAdditionalFields();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
             return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CategoryAdditionalFields model.
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
     * Deletes an existing CategoryAdditionalFields model.
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
     * Finds the CategoryAdditionalFields model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CategoryAdditionalFields the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CategoryAdditionalFields::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
