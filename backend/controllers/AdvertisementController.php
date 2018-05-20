<?php

namespace backend\controllers;

use Yii;
use backend\models\Advertisement;
use backend\models\AdvertisementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use common\components\AccessRule;
use yii\filters\AccessControl;
use common\models\Admin;
use app\models\Notifications;
use backend\models\Email;


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
     * Lists all Advertisement models.
     * @return mixed
     */
    public function actionIndex()
    {
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

    /**
     * Creates a new Advertisement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Advertisement();
        $model->scenario = Advertisement::SCENARIO_CREATE;

        if ($model->load(Yii::$app->request->post())) {
            
            if($model->photo_name = UploadedFile::getInstance($model, 'photo_name'))
                {
                    $model->save();
                    $photo_name =   $model->upload();        
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
     * Updates an existing Advertisement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
       
        $model = $this->findModel($id);
        $notification = new Notifications();
         

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            if($model->status==1){
                    
                     $user = \common\models\User::findOne($model->user_id);
          
             $email_user = Email::find()->where(['id'=>22])->orderBy(['id' => SORT_DESC])->one();
             Yii::$app->mailer->compose()
            ->setFrom('info@virtual-developers.com')
            ->setTo($user->email)
            ->setSubject($email_user->title)
            ->setHtmlBody($email_user->content)
            ->send();
                }
            
            
            if($model->photo_name = UploadedFile::getInstance($model, 'photo_name'))
            {
                $photo_name =   $model->upload();        
                $model->save();
            }
            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'notification'=>$notification
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

        return $this->redirect(['index']);
    }
public function actionDeleteImage($id)
    {
    // $id =  $tmpuser->id;
            \backend\models\Images::findOne($id)->delete(); 
            return true;
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
    public function actionNoti(){
         $request = Yii::$app->request;
        if ($request->isAjax) { 
            $user_id = $_POST['user_id'];
          $noti = $_POST['noti'];
          $c_noti = new Notifications();
          $c_noti->notification=$noti;
          $c_noti->user_id = $user_id;
          if($c_noti->save()){
              $user = \backend\models\User::findOne($user_id);
              Yii::$app->mailer->compose()
                ->setFrom('from@domain.com')
                ->setTo($user->email)
                ->setSubject('Ad rejected')
                ->setTextBody('Plain text content')
                ->setHtmlBody($noti)
                ->send();
          }
          return 1;
                  
        }
    }
}
