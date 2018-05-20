<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */
/* @var $form yii\widgets\ActiveForm */
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

    <?php $form=ActiveForm::begin(); ?>
                    <div class="input-group custom-field-wrap">
<!--                        <label for="userEmail">Your Email</label>
                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="">-->
                     <?= $form->field($model, 'username', ['inputOptions'=>['id'=>'login-username','required'=>'true']])->label("Your Email") ?>
                     </div>
                     <div class="input-group custom-field-wrap">
<!--                        <label for="userPassword">Password</label>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="">-->
                      <?= $form->field($model, 'password_hash', ['inputOptions'=>['id'=>'login-username','required'=>'true']])->passwordInput()->label('Password'); ?>
                     </div>
						<div class="input-group custom-field-wrap">
<!--                        <label for="userPassword">Password</label>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="">-->
                      <?= $form->field($model, 'password_repeat', ['inputOptions'=>['id'=>'login-username','required'=>'true']])->passwordInput()->label('Repeat Password'); ?>
                     </div>
    
        
    <?php // $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?php  $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?php $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

    <?php $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php $form->field($model, 'status')->textInput() ?>

    <?php $form->field($model, 'created_at')->textInput() ?>

    <?php $form->field($model, 'updated_at')->textInput() ?>
                  
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

                  <p><input type="checkbox" name="remember" value="1"><b class="asterisk">*</b> By registering on adpost.no, you accept our OLX.com.pk <a href="#">Terms of Use</a>.</p>

                 
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
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
   <!--<div class="ads-vr-left">Space Available For Ad</div>
   <div class="ads-vr-right">Space Available For Ad</div>-->
   <!-- /Ads Boxes -->
</main>
