<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use frontend\controllers\SiteController;

?>

   <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 glb-wrap">
      <div class="container">
        <?php 
        
        foreach ($page_content as $data){
            echo '<h1>' . $data['title'] . '</h1></br>';
            echo $data['content'];
        }
        
        ?>
       </div>
   </section>