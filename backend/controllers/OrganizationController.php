<?php

namespace backend\controllers;

use Yii;
use backend\models\Organization;
use backend\models\OrganizationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * OrganizationController implements the CRUD actions for Organization model.
 */
class OrganizationController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Organization models.
     * @return mixed
     */
    public function actionIndex()
    {
	$orgData = Organization::find()->one();
	return $this->redirect(['view', 'id' => $orgData->id]);    	 
    }

    /**
     * Displays a single Organization model.
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
     * Creates a new Organization model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   public function actionCreate()
    {
        $chkOrg = Organization::find()->all();
	if(!empty($chkOrg)) {
		throw new NotFoundHttpException('The requested page does not exist.');
	}
	
        $model = new Organization();
	if(isset($_POST['Organization']) && $model->load(Yii::$app->request->post()))
	{
		$model->attributes=$_POST['Organization'];
		$model->email = strtolower($_POST['Organization']['email']);
		

		ob_start();

		if(!empty($_FILES['Organization']['tmp_name']['logo']))
		{
			$file = UploadedFile::getInstance($model,'logo');
			$model->logo_type = $file->type;
			$fp = fopen($file->tempName, 'r');
			$content = fread($fp, filesize($file->tempName));
			fclose($fp);
			if($model->logo_type == "image/png") 
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
			if($model->logo_type == "image/jpg" || $model->logo_type == "image/jpeg") 
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
			if($model->logo_type == "image/gif") 
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
			$model->logo = $image_string;
		}
		if($model->save())
//		return $this->redirect(['view', 'id' => $model->id]);
                     return $this->redirect(['index']);
	}

		return $this->render('create', [
					'model' => $model,
				    ]);
    }

    /**
     * Updates an existing Organization model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
	$old_model=$this->findModel($id);

        if(isset($_POST['Organization']) && $model->load(Yii::$app->request->post()))
	{
		$model->attributes=$_POST['Organization'];
		
		$model->email = strtolower($_POST['Organization']['email']);
		
		ob_start();

		if(empty($_FILES['Organization']['tmp_name']['logo'])) 
		{
	
			$model->logo = $old_model->logo;
		}
		else 
		{

		if(!empty($_FILES['Organization']['tmp_name']['logo']))
   	 	{
			$file = UploadedFile::getInstance($model,'logo');
			$model->logo_type = $file->type;
			$fp = fopen($file->tempName, 'r');
			$content = fread($fp, filesize($file->tempName));
			fclose($fp);
			
			if($model->logo_type == "image/png") {
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
			if($model->logo_type == "image/jpeg" || $model->logo_type =="image/jpg") {
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
			if($model->logo_type == "image/gif") {
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
			$model->logo = $image_string;
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
		$model = Organization::find()->asArray()->all();

        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Content-Transfer-Encoding: binary');
		header('Content-type: '.$model[0]['logo_type']);
		echo $model[0]['logo'];  
	
    }

    /**
     * Deletes an existing Organization model.
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
     * Finds the Organization model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Organization the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Organization::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
