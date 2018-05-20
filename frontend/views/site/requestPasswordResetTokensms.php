<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>


<main>
   <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 login-wrap">
      <div class="container">
         <div class="mainbox col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 forget-password-box">
            <div class="panel panel-info" >
               <div class="panel-heading">
                  <div class="panel-title">Forget Password</div>
               </div>
               <div class="panel-body" >
                  <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                  <!--<form class="form-horizontal" role="form">-->
                      <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
                     <p class="bg-warning">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sit amet vehicula velit. Nulla non lacus vitae sem congue pellentesque. Suspendisse mattis lectus iaculis nulla convallis, eget molestie dui euismod. In ullamcorper fringilla arcu eu lacinia. Pellentesque tempor, nunc in placerat molestie, nisl nisl volutpat ligula, in sagittis purus ex eget nisi. Nam in urna odio. </p>
                     <div class="input-group custom-field-wrap">
                     
              

                <?= $form->field($model, 'mobile') ?>
                         <div class="login-button-btm">
                 
                  <br>
                    <?= Html::submitButton('Change', ['class' => 'btn btn-login']) ?>
                
                  <?= Html::a('GoTo Login', Url::toRoute(['/site/login']), ['class' => 'btn btn-login']); ?>
                         </div>

           
                     </div>
                  
                   <?php ActiveForm::end(); ?>
               
               </div>
               <!-- panel body -->
            </div>
            <!-- panel -->
         </div>
      </div>
      <!-- /container-->
   </section>
   
   <!-- Ads Boxes -->
 
  <!--<div class="ads-vr ads-vr-left">Space Available For Ad</div>
  <div class="ads-vr ads-vr-right">Space Available For Ad</div>-->
<!-- /Ads Boxes -->
</main>




