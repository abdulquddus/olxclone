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
		
									<strong>Login Password</strong>
							</li>
							</ol>
					
		<br />
<form role="form" method="post" class="form-horizontal form-groups-bordered validate" action="">
		
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
								<label for="field-1" class="col-sm-3 control-label">Password</label>
								
								<div class="col-sm-5">
                                                                    <input type="password" class="form-control" id="field-1" value="Neon">
								</div>
							</div>
			
							<div class="form-group">
								<label for="field-2" class="col-sm-3 control-label">Password Repeat</label>
								
								<div class="col-sm-5">
                                                                    <input type="password" class="form-control" id="field-2" value="Bootstrap Admin Theme">
									
								</div>
							</div>
			
							
			
							
							
						</div>
					
					</div>
				
				</div>
			</div>
			
			
		
		
												
			<div class="form-group default-padding">
				<button type="submit" class="btn btn-success">Save Changes</button>
				<!--<button type="reset" class="btn">Reset Previous</button>-->
			</div>
						
		</form>