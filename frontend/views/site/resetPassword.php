<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>



<main>
   <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 login-wrap">
      <div class="container">
         <div class="mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >
               <div class="panel-heading">
                  <div class="panel-title"><h1><?= Html::encode($this->title) ?></h1></div>
               </div>
               <div class="panel-body" >
                    

    
                  <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                  <!--<form class="form-horizontal" role="form">-->
               <?php $form = ActiveForm::begin(['id' => 'reset-password-form', 'layout' => 'horizontal', 'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            
            'error' => 'qwe',
            'hint' => '',
        ],
    ],]); ?>

                <?= $form->field($model, 'password', ['template'=>' <div class="input-group custom-field-wrap">
                        <label for="userEmail">Password</label>
                        {input}
                     </div> <span style="text-align: center; margin-top: -2px;">{error}</span> ', ])->passwordInput()->label("Please choose your new password:") ?>
                    <?= $form->field($model, 'rmpassword', ['template'=>' <div class="input-group custom-field-wrap">
                        <label for="userEmail">Re-Password</label>
                        {input}<br />
                     </div> <span style="text-align: center; margin-top: -2px;">{error}</span> '])->passwordInput()?>
               

                   <div class="form-group login-button-box">
                        <span>
                            <!--<a type="submit" id="btn-fblogin" href="#" class="btn btn-login">Log In</a>-->
                        <?=  Html::submitButton('Save', ['class' => 'btn btn-primary', 'id'=>'btn-fblogin']) ?>
                
                        </span>
                     </div>
<!--                <div class="form-group login-button-box">
                        <span>
                    <?= Html::submitButton('Save', ['class' => 'btn btn-login' ,'id' => 'btn-fblogin']) ?>
                 </span>
                     </div>-->

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
 
<!--  <div class="ads-vr ads-vr-left">Space Available For Ad</div>
  <div class="ads-vr ads-vr-right">Space Available For Ad</div>-->
<!-- /Ads Boxes -->
</main>









