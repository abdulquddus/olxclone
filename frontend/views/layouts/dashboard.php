<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<title>User Dashboard</title>

	<link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/deshboard/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/deshboard/assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/deshboard/assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/deshboard/assets/css/neon-core.css">
	<link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/deshboard/assets/css/neon-theme.css">
	<link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/deshboard/assets/css/neon-forms.css">
	<link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/deshboard/assets/css/custom.css">

	<script src="<?php echo Yii::getAlias('@web') ?>/deshboard/assets/js/jquery-1.11.0.min.js"></script>
	<script>$.noConflict();</script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	
	<div class="sidebar-menu">

		<div class="sidebar-menu-inner">
			
			<header class="logo-env">

				<!-- logo -->
				<div class="logo">
					<a href="index.html">
						<img src="<?php echo Yii::getAlias('@web') ?>/deshboard/assets/images/logo@2x.png" width="120" alt="" />
					</a>
				</div>

				<!-- logo collapse icon -->
				<div class="sidebar-collapse">
					<a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
						<i class="entypo-menu"></i>
					</a>
				</div>

								
				<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
				<div class="sidebar-mobile-menu visible-xs">
					<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
						<i class="entypo-menu"></i>
					</a>
				</div>

			</header>
			
									
			<ul id="main-menu" class="main-menu">
				<!-- add class "multiple-expanded" to allow multiple submenus to open -->
				<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
				<li>
					<a href="<?= Url::toRoute(['/site/'])?>">
						<i class="entypo-gauge"></i>
						<span class="title">Home</span>
					</a>
					
				</li>
				
				
				
                                <li class="opened active">
					<a href="mailbox.html">
						<i class="entypo-mail"></i>
						<span class="title">Message</span>
						<span class="badge badge-secondary">8</span>
					</a>
					<ul>
						<li>
							<a href="mailbox.html">
								<i class="entypo-inbox"></i>
								<span class="title">Inbox</span>
							</a>
						</li>
						<li>
							<a href="mailbox-compose.html">
								<i class="entypo-pencil"></i>
								<span class="title">Compose Message</span>
							</a>
						</li>
						<li>
							<a href="mailbox-message.html">
								<i class="entypo-attach"></i>
								<span class="title">View Message</span>
							</a>
						</li>
					</ul>
				</li>
				
				<li>
					<a href="extra-icons.html">
						<i class="entypo-bag"></i>
						<span class="title">Setttings</span>
						<span class="badge badge-info badge-roundless">New Items</span>
					</a>
					<ul>
						
						
						<li>
							<a href="<?= Url::toRoute(['/user/cdetails'])?>">
								<span class="title">Change contact details</span>
							</a>
						</li>
                                                
                                                <li>
							<a href="<?= Url::toRoute(['/user/password'])?>">
								<span class="title">Change password</span>
							</a>
						</li>
                                                
						
						
					</ul>
				</li>
				
			
			</ul>
			
		</div>

	</div>

	<div class="main-content">
				<?= $content ?>
		
		<br />
		
		<!-- lets do some work here... -->
		<!-- Footer -->
		<footer class="main">
			
			
		
		</footer>
	</div>

	
	
</div>




	<!-- Bottom scripts (common) -->
	<script src="<?php echo Yii::getAlias('@web') ?>/deshboard/assets/js/gsap/main-gsap.js"></script>
	<script src="<?php echo Yii::getAlias('@web') ?>/deshboard/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="<?php echo Yii::getAlias('@web') ?>/deshboard/assets/js/bootstrap.js"></script>
	<script src="<?php echo Yii::getAlias('@web') ?>/deshboard/assets/js/joinable.js"></script>
	<script src="<?php echo Yii::getAlias('@web') ?>/deshboard/assets/js/resizeable.js"></script>
	<script src="<?php echo Yii::getAlias('@web') ?>/deshboard/assets/js/neon-api.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="<?php echo Yii::getAlias('@web') ?>/deshboard/assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="<?php echo Yii::getAlias('@web') ?>/deshboard/assets/js/neon-demo.js"></script>

</body>
</html>