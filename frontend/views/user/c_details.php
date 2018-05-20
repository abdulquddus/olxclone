<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Dropdown;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1 class="margin-bottom">Settings</h1>
					<ol class="breadcrumb 2" >
								<li>
						<a href="index.html"><i class="fa-home"></i>Deshboard</a>
					</li>
							<li>
		
									<a href="extra-icons.html">Setting</a>
							</li>
						<li class="active">
		
									<strong>Contact Details</strong>
							</li>
							</ol>
					
		<br />
<form role="form" method="post" class="form-horizontal form-groups-bordered validate" action="">
		  <?php $form=ActiveForm::begin([
                       'method'=>'post',
                     'options' => [
                'class' => 'form-horizontal form-groups-bordered validate',
                         'role' => 'form'
                                   ],
                      ]); ?>
			<div class="row">
				<div class="col-md-12">
					
					<div class="panel panel-primary" data-collapsed="0">
					
						<div class="panel-heading">
							<div class="panel-title">
								General Settings
							</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
								<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							</div>
						</div>
						
						<div class="panel-body">
				
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Name</label>
								
								<div class="col-sm-5">
                                                                    <?= $detail_model->name ?>
									<!--<input type="text" class="form-control" id="field-1" value="Neon">-->
                                                                    <?php // $form->field($detail_model, 'username')->textInput(['class'=>'form-control', 'id'=>'field-1'])->label(FALSE) ?>
								    <?= $form->field($detail_model, 'name')->textInput(['value'=>$detail_model->name, 'maxlength' => true])->label(FALSE) ?>
                                                                </div>
							</div>
			
							<div class="form-group">
								<label for="field-2" class="col-sm-3 control-label">Mobile</label>
								
								<div class="col-sm-5">
<!--									<input type="text" class="form-control" id="field-2" value="Bootstrap Admin Theme">
									<span class="description">Few words that will describe your site.</span>-->
                                                                     <?= $form->field($detail_model, 'mobile')->textInput(['value'=>$detail_model->mobile,'class'=>'form-control', 'id'=>'field-1'])->label(FALSE) ?>
								</div>
							</div>
			
							
                                                    
                                                    <div class="form-group">
								<label for="field-4" class="col-sm-3 control-label">State</label>
								
								<div class="col-sm-5">
								 <?php
    echo Html::dropDownList('state',  $selection = $detail_model->state, $city, ['class'=>'form-control']);
  // echo $form->field($detail_model, 'state')->dropDownList($city, ['class'=>'form-control'], $selection = 13 );
    ?>	
								</div>
							</div>
			
							
							
						</div>
					
					</div>
				
				</div>
			</div>
			<div class="user-form">

    

</div>
			
		
		
												
			<div class="form-group default-padding">
				<!--<button type="submit" class="btn btn-success">Save Changes</button>-->
				<?=  Html::submitButton('Save', ['class' => 'btn btn-success', 'name' => 'save']) ?>
                
                                <!--<button type="reset" class="btn">Reset Previous</button>-->
			</div>
						
		<!--</form>-->
                 <?php ActiveForm::end(); ?>