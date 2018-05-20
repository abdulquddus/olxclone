<?php

namespace backend\controllers;

use Yii;
use backend\models\CommercialSearchAds;
use backend\models\CommercialSearchAdsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\components\AccessRule;
use yii\filters\AccessControl;
use common\models\Admin;

/**
 * CommercialSearchAdsController implements the CRUD actions for CommercialSearchAds model.
 */
class CommercialSearchAdsController extends Controller
{
    /**
     * @inheritdoc
     */
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
     * Lists all CommercialSearchAds models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CommercialSearchAdsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CommercialSearchAds model.
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
     * Creates a new CommercialSearchAds model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   public function actionCreate()
    {
       $model = new CommercialSearchAds();
//        $chkOrg = CommercialSearchAds::find()->all();
//	if(!empty($chkOrg)) {
//		throw new NotFoundHttpException('The requested page does not exist.');
//	}
	
       
	if(isset($_POST['commercial-search-ads']) && $model->load(Yii::$app->request->post()))
	{
		$model->attributes=$_POST['commercial-search-ads'];
		$model->url = strtolower($_POST['commercial-search-ads']['url']);
		$model->user_id = \yii::$app->user->id;

		ob_start();

		if(!empty($_FILES['commercial-search-ads']['tmp_name']['image']))
		{
			$file = UploadedFile::getInstance($model,'image');
			$model->image_type = $file->type;
			$fp = fopen($file->tempName, 'r');
			$content = fread($fp, filesize($file->tempName));
			fclose($fp);
			if($model->image_type == "image/png") 
			{
				$src_img = imagecreatefrompng($file->tempName);
				$dst_img = imagecreatetruecolor(90, 70);
				imagealphablending($dst_img, false);
				imagesavealpha($dst_img,true);
				$transparent = imagecolorallocatealpha($dst_img, 255, 255, 255, 127);
				imagefilledrectangle($dst_img, 0, 0, 90, 70, $transparent);
				imagecopyresampled($dst_img, $src_img, 0,0,0,0, 90, 70, imagesx($src_img), imagesy($src_img));
				imagepng($dst_img);                                
				ob_start();
				imagepng($dst_img);
				$image_string = ob_get_contents();
				ob_end_flush();
			}
			if($model->image_type == "image/jpg" || $model->image_type == "image/jpeg") 
			{
				$src_img = imagecreatefromjpeg($file->tempName);
				$dst_img = imagecreatetruecolor(90, 70);
				imagealphablending($dst_img, false);
				imagesavealpha($dst_img,true);
				$transparent = imagecolorallocatealpha($dst_img, 255, 255, 255, 127);
				imagefilledrectangle($dst_img, 0, 0, 90, 70, $transparent);
				imagecopyresampled($dst_img, $src_img, 0,0,0,0, 90, 70, imagesx($src_img), imagesy($src_img));
				imagejpeg($dst_img);                                
				ob_start();
				imagepng($dst_img);
				$image_string = ob_get_contents();
				ob_end_flush();
			}
			if($model->image_type == "image/gif") 
			{
				$src_img = imagecreatefromgif($file->tempName);
				$dst_img = imagecreatetruecolor(90, 70);
				imagealphablending($dst_img, false);
				imagesavealpha($dst_img,true);
				$transparent = imagecolorallocatealpha($dst_img, 255, 255, 255, 127);
				imagefilledrectangle($dst_img, 0, 0, 90, 70, $transparent);
				imagecopyresampled($dst_img, $src_img, 0,0,0,0, 90, 70, imagesx($src_img), imagesy($src_img));
				imagepng($dst_img);                                
				ob_start();
				imagecreatefromgif($dst_img);
				$image_string = ob_get_contents();
				ob_end_flush();
			}
			$model->image = $image_string;
		}
		if($model->save())
//		return $this->redirect(['view', 'id' => $model->id]);
                     return $this->redirect(['index']);
	}
else{
		return $this->render('create', [
					'model' => $model,
]);}
    }

    /**
     * Updates an existing CommercialSearchAds model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
	$old_model=$this->findModel($id);

        if(isset($_POST['CommercialSearchAds']) && $model->load(Yii::$app->request->post()))
	{
		$model->attributes=$_POST['CommercialSearchAds'];
		
		$model->url = strtolower($_POST['CommercialSearchAds']['url']);
		
		ob_start();

		if(empty($_FILES['CommercialSearchAds']['tmp_name']['image'])) 
		{
	
			$model->image = $old_model->image;
		}
		else 
		{

		if(!empty($_FILES['CommercialSearchAds']['tmp_name']['image']))
   	 	{
			$file = UploadedFile::getInstance($model,'image');
			$model->image_type = $file->type;
			$fp = fopen($file->tempName, 'r');
			$content = fread($fp, filesize($file->tempName));
			fclose($fp);
			
			if($model->image_type == "image/png") {
				$src_img = imagecreatefrompng($file->tempName);
		                $dst_img = imagecreatetruecolor(90, 70);
				imagealphablending($dst_img, false);
				imagesavealpha($dst_img,true);
				$transparent = imagecolorallocatealpha($dst_img, 255, 255, 255, 127);
				imagefilledrectangle($dst_img, 0, 0, 90, 70, $transparent);
				imagecopyresampled($dst_img, $src_img, 0,0,0,0, 90, 70, imagesx($src_img), imagesy($src_img));
		                imagepng($dst_img);                                
		                ob_start();
		                imagepng($dst_img);
		                $image_string = ob_get_contents();
		                ob_end_flush();
			}
			if($model->image_type == "image/jpeg" || $model->image_type =="image/jpg") {
				$src_img = imagecreatefromjpeg($file->tempName);
		                $dst_img = imagecreatetruecolor(90, 70);
				imagealphablending($dst_img, false);
				imagesavealpha($dst_img,true);
				$transparent = imagecolorallocatealpha($dst_img, 255, 255, 255, 127);
				imagefilledrectangle($dst_img, 0, 0, 90, 70, $transparent);
		                imagecopyresampled($dst_img, $src_img, 0,0,0,0, 90, 70, imagesx($src_img), imagesy($src_img));
		                imagejpeg($dst_img);                                
		                ob_start();
		                imagejpeg($dst_img);
		                $image_string = ob_get_contents();
		                ob_end_flush();
			}
			if($model->image_type == "image/gif") {
				$src_img = imagecreatefromgif($file->tempName);
		                $dst_img = imagecreatetruecolor(90, 70);
				imagealphablending($dst_img, false);
				imagesavealpha($dst_img,true);
				$transparent = imagecolorallocatealpha($dst_img, 255, 255, 255, 127);
				imagefilledrectangle($dst_img, 0, 0, 90, 70, $transparent);
		                imagecopyresampled($dst_img, $src_img, 0,0,0,0, 90, 70, imagesx($src_img), imagesy($src_img));
		                imagegif($dst_img);                                
		                ob_start();
		                imagegif($dst_img);
		                $image_string = ob_get_contents();
		                ob_end_flush();
			
			}
			$model->image = $image_string;
		}
	     }			                

		if ($model->save()) 
            		return $this->redirect(['view', 'id' => $model->id]);
	
	} else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    
    
    public function actionLoadimage()
    {
		$model = CommercialSearchAds::find()->asArray()->all();

        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Content-Transfer-Encoding: binary');
		header('Content-type: '.$model[0]['image_type']);
		echo $model[0]['image'];  
	
    }

    /**
     * Deletes an existing CommercialSearchAds model.
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
     * Finds the CommercialSearchAds model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CommercialSearchAds the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CommercialSearchAds::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
