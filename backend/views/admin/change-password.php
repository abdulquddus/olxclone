<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="panel panel-default">
                  <div class="panel-heading">
                      <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#changepassword">Change password</a>
                      </h4>
                  </div>
                  <div id="changepassword" class="panel-collapse collapse">
                      <div class="panel-body">
                          <?php $form=ActiveForm::begin(); ?>
                        <div class="input-group setting-input-group">
<!--                          <label>New password<b class="asterisk">*</b></label>
                          <input type="text" class="form-control" value="" placeholder="">-->
                         <?= $form->field($pass_model, 'password_hash')->passwordInput(); ?>
                        </div><!-- /.setting-input-group-->

                        <div class="input-group setting-input-group">
<!--                          <label>Reset New password<b class="asterisk">*</b></label>
                          <input type="text" class="form-control" value="" placeholder="">-->
                         <?= $form->field($pass_model, 'password_repeat')->passwordInput(); ?>
                        </div><!-- /.setting-input-group-->

                        <!--<a href="#" class="btn btn-login">Change Password</a>-->
                       <?=  Html::submitButton('Change Password', ['class' => 'btn btn-login', 'name' => 'change-pass']) ?>
                
                          <?php ActiveForm::end(); ?>
                        
                      </div>
                  </div>
              </div><!-- /Panel Default -->

