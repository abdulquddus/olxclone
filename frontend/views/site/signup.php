<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<main>
   <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 login-wrap">
      <div class="container">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 register-wrap">
            <div class="panel panel-info" >
               <div class="panel-heading">
                  <div class="panel-title">Create an account</div>
               </div>
               <div class="panel-body" >
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 register-box-left">
                  <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                  <!--<form class="form-horizontal" role="form">-->
                      <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                     
                  <div class="input-group custom-field-wrap">
                        <!--<label for="userEmail">Email <b class="asterisk">*</b></label>-->
                        <!--<input id="login-username" type="text" class="form-control" name="username" value="" placeholder="">-->
                          <?= $form->field($model, 'email', ['template'=>'<label for="userEmail">Email <b class="asterisk">*</b></label>{input}<span>{error}</span>'])->label(FALSE) ?>
                        <!--<span>Enter your email</span>-->
                     </div>
                   <div class="input-group custom-field-wrap">
                          <!--<label for="userPassword">Password <b class="asterisk">*</b></label>-->
                        <!--<input id="login-password" type="password" class="form-control" name="password" placeholder="">-->
                         <?= $form->field($model, 'mobile', ['template'=>'<label for="userPassword">Mobile <b class="asterisk">*</b></label>{input}<span>{error}</span>'])->input('integer', ['pattren'=>'[\+]\d{2}[\(]\d{2}[\)]\d{4}[\-]\d{4}'])->label(FALSE) ?>
                        
                         <!--<span>Enter your password</span>-->
                     </div>
                  
                    <div class="input-group custom-field-wrap">
                          <!--<label for="userPassword">Password <b class="asterisk">*</b></label>-->
                        <!--<input id="login-password" type="password" class="form-control" name="password" placeholder="">-->
                        
           <?php if(isset($_GET['type'])) echo $form->field($model, 'com_url', ['template'=>'<label for="userPassword">Compnay URL <b class="asterisk">*</b></label>{input}<span>{error}</span>'])->input('integer', ['pattren'=>'[\+]\d{2}[\(]\d{2}[\)]\d{4}[\-]\d{4}'])->label(FALSE) ?>
                        
                         <!--<span>Enter your password</span>-->
                     </div>
                  
                     <div class="input-group custom-field-wrap">
                          <!--<label for="userPassword">Password <b class="asterisk">*</b></label>-->
                        <!--<input id="login-password" type="password" class="form-control" name="password" placeholder="">-->
                         <?= $form->field($model, 'password_hash', ['template'=>'<label for="userPassword"> Password <b class="asterisk">*</b></label>{input}<span>{error}</span>'])->passwordInput()->label(FALSE) ?>
                        <!--<span>Enter your password</span>-->
                     </div>
                     <div class="input-group custom-field-wrap">
<!--                        <label for="userPassword">Repeat Password <b class="asterisk">*</b></label>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="">-->
                     <?= $form->field($model, 'confirmpassword', ['template'=>'<label for="userPassword">Repeat Password <b class="asterisk">*</b></label>{input}<span>{error}</span>'])->passwordInput()->label('confirmpassword <b class="asterisk">*</b>') ?>                        
                      <!--<span>Repeat your password</span>-->
                     </div>
                  <!--</form>-->
                 
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 register-box-rt">
                  <p>By having a password you will have access to <b>My ads</b> where you can:</p>
                  <ul>
                    <li><i class="fa fa-arrow-right">&nbsp</i>Edit or Delete your Ads</li>
                    <li><i class="fa fa-arrow-right">&nbsp</i>Check responses for your Ads</li>
                    <li><i class="fa fa-arrow-right">&nbsp</i>See saved Ads</li>
                  </ul>
                  <p>Provide your e-mail address & password and click confirm link in e-mail which will be sent to you..</p>
                </div>

                <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 register-box-btm">
                  

                 <?= $form->field($model, 'accept', ['checkboxTemplate'=>'<p>{input}<b class="asterisk">*</b> By registering on adpost.se, you accept our adpost.se <a href="#">Terms of Use</a>.{error}</p>'])->checkbox(); ?>

                  <!--<a href="#" class="btn btn-login">Create</a>-->
                  <?= Html::submitButton('Create', ['class' => 'btn btn-login', 'name' => 'signup-button']) ?>
                  </div>   <?php ActiveForm::end(); ?>
               </div>
               <!-- /panel-body-->
            </div>
         </div>
         <!-- /panel-->
      </div>
      <!-- /container-->
   </section>
   <!-- /login-wrap -->
  <!-- Ads Boxes -->
 <!-- <div class="ads-vr ads-vr-left">Space Available For Ad</div>
  <div class="ads-vr ads-vr-right">Space Available For Ad</div>-->
<!-- /Ads Boxes -->
</main>