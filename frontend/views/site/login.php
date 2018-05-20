<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Login';
?>



<main>
   <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 login-wrap">
      <div class="container">
         <div id="loginbox" class="mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >
               <div class="panel-heading">
                  <div class="panel-title">Log In</div>
               </div>
               <div class="panel-body" >
                  <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                  <!--<form id="loginform" class="form-horizontal" role="form">-->
                       <?php $form=ActiveForm::begin(); ?>
                     <div class="input-group custom-field-wrap">
<!--                        <label for="userEmail">Your Email</label>
                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="">-->
                     <?= $form->field($model, 'username', ['inputOptions'=>['id'=>'login-username']])->label("E-post") ?>
                     </div>
                     <div class="input-group custom-field-wrap">
<!--                        <label for="userPassword">Password</label>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="">-->
                      <?= $form->field($model, 'password', ['inputOptions'=>['id'=>'login-username', 'template'=>'{input}']])->passwordInput(['class'=>'form-control abc'])->label('Password'); ?>
                     </div>
                     <div class="input-group checkbox-main">
                        <div class="checkbox">
                           <label>
                               <!--<input id="login-remember" type="checkbox" name="remember" value="1"> Remember me-->
                                <?= $form->field($model, 'rememberMe', ['inputOptions'=>['id'=>'login-remember']])->checkbox() ?>
                               <?php // echo $form->field($model, 'rememberMe', ['template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input}</div>\n<div class=\"col-lg-8\"><br />{error}</div>",])->checkbox() ?>

                           </label>
                        </div>
                     </div>
                     <div class="form-group login-button-box">
                        <span>
                            <!--<a type="submit" id="btn-fblogin" href="#" class="btn btn-login">Log In</a>-->
                        <?=  Html::submitButton('Logg inn', ['class' => 'btn btn-primary', 'id'=>'btn-fblogin', 'name' => 'login-button']) ?>
                
                        </span>
                     </div>
                    
                  <!--</form>-->
                  <?php ActiveForm::end(); ?>
                  <div class="login-button-btm">
                        <span>
                        <a href="<?= Url::toRoute(['/site/rst'])?>">Forgot passord?</a>
<!--                        <a href="<?= Url::toRoute(['/site/signup'])?>">New user? Register here</a>-->
                         <a href="<?= Url::toRoute(['/user/user-registration'])?>">New User? Signup</a>
                        </span>
                     </div>
               </div>
                 
               <div class="login-btm-box">
                  Already posted an Ad before? &nbsp<a id="" class="">Manage your Ads in a Smart Way</a>
               </div>
<!--               <div class="login-btm-box2">-->
<!--                  <span>Log in using your Facebook account</span>-->
<!--                  <a href="#" id="" class="btn-login-fb"></a>-->
<!--               </div>-->
            </div>
            <div class="tos-box">
               By logging in, you accept our <a href="#">Terms of Use</a>
            </div>
         </div>
      </div>
      <!-- /container-->
   </section>
   <!-- /login-wrap -->
   
  <!-- Ads Boxes -->
<!--  <div class="ads-vr ads-vr-left">Space Available For Ad</div>
  <div class="ads-vr ads-vr-right">Space Available For Ad</div>-->
<!-- /Ads Boxes -->
</main>

























