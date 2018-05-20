<?php

namespace backend\controllers;

use Yii;
use backend\models\Newsletter;
use backend\models\NewsletterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * NewsletterController implements the CRUD actions for Newsletter model.
 */
class NewsletterController extends Controller
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
     * Lists all Newsletter models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsletterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Newsletter model.
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
     * Creates a new Newsletter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Newsletter();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Newsletter model.
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
     * Deletes an existing Newsletter model.
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
     * Deletes an existing Newsletter model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionSendmail()
    {
        $newsletters = new Newsletter;
        return $this->render('send', ['newsletters'=>$newsletters]);
    }
    
     public function actionHistory()
    {
       $searchModel = new NewsletterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('history', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionMail()
    {
        if(isset($_POST['letter'])){
       $id = $_POST['letter'];
       
       //-------------------
              $Letter = Newsletter::find()->where(['id'=>$id])->orderBy(['id' => SORT_DESC])->one();
              $News = Newsletter::find()->where(['id'=>$id])->orderBy(['id' => SORT_DESC])->one();
              $News->date =  date('Y-m-d');
              $News->save();
              $subject = "Newsletter";
              $message = $Letter['letter_content'];
              $message .="<br/>";
//              $message .= ; 
           
            
            
            $headers = "";
            $headers .= "MIME-Version: 1.0\n";
            $headers .= "Content-Type: multipart/mixed; boundary=\"\"\n\n";
            $headers .= "This is a multi-part message in MIME format.\n";
            $headers .= "--\n";
            $headers .= "Content-type: text/html; charset=utf-8\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\n";
            $headers .= "From: Devtesting<Info@virtual-developers.com >\n\n";
            $headers = "From: Info@virtual-developers.com \r\n";
            $headers .= "Reply-To: info@virtual-developers.com \r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                
                $too = \backend\models\NewsletterSubscription::find()->all();
                foreach($too as $tooo){
                   //echo $to = $tooo->email;
                     mail($to, $subject, $message, $headers);
                }
//               mail($to, $subject, $message, $headers);
                 Yii::$app->session->setFlash('success', "Newsletters Sent!");
        }
        
     
        
        return $this->redirect(['history']);
    }
    

    /**
     * Finds the Newsletter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Newsletter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Newsletter::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
