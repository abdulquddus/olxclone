<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'verification';


?>



<main>
   <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 login-wrap">
      <div class="container">
         <div id="loginbox" class="mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >
               <div class="panel-heading">

                  <div class="panel-title">Enter Varification Code</div>

               </div>
               <div class="panel-body" >
                  <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                  <!--<form id="loginform" class="form-horizontal" role="form" method="post" action="">-->
                      
                     <!--<div class="input-group custom-field-wrap">-->
                        <!--<label for="userEmail">Your Verification Code</label>-->
                       
                      <!--</div>-->
                      
                  <!--</form>-->
                 
                 <?php
                 
                 $form = ActiveForm::begin([
                                      'id' => 'active-form',
                                       'options' => [
				       'class' => 'form-horizontal',
				       'enctype' => 'multipart/form-data'
				                    ],
                                            ]);
?>
     <input id="login-username" type="text" class="form-control" name="code" value="" placeholder="Enter Your Code"></br>
     <input class="form-control" type="submit" value="Submit"></br>
         
 <?php
                  
 
                  ActiveForm::end();
                 ?>
                  <div class="login-button-btm">
                        <span>
                        <a href="<?= Url::toRoute(['/site/resetPassword'])?>">Forgot password?</a>
                        <a href="<?= Url::toRoute(['/user/create'])?>">New user? Register here</a>
                        </span>
                     </div>
               </div>
                 
               <div class="login-btm-box">
                  Already posted an Ad before? &nbsp<a href="#" id="" class="">Manage your Ad in a Smart Way</a>
               </div>
<!--               <div class="login-btm-box2">
                  <span>Log in using your Facebook account</span>
                  <a href="#" id="" class="btn-login-fb"></a>
               </div>-->
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
 <!-- <div class="ads-vr ads-vr-left">Space Available For Ad</div>
  <div class="ads-vr ads-vr-right">Space Available For Ad</div>-->
<!-- /Ads Boxes -->
</main>

























