<?php
use yii\helpers\Html;
use yii\helpers\Url;

if (class_exists('yii\debug\Module')) {
    $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
}
?>


<!DOCTYPE html>
<?php $this->beginPage() ?>
<html lang="en">
    <?php // echo Html::csrfMetaTags() ?>

    

    <?php $this->head() 
            
            ?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Website Name | Slogan</title>

    <!-- Bootstrap -->
    <link href="<?php echo Yii::getAlias('@web') ?>/design/template/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo Yii::getAlias('@web') ?>/design/template/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom Font Family -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,900' rel='stylesheet' type='text/css'>
    <!-- Custom Stylesheet -->
    <link href="<?php echo Yii::getAlias('@web') ?>/design/template/css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>

  <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-ad-box">Space Available For Ad</section>
  
<header>
    <nav class="navbar navbar-default">
  <div class="container">
      <?php if(Yii::$app->session->hasFlash('success')):?>
<div class="alert alert-info fade in ">

        <a href="#" class="close" data-dismiss="alert">&times;</a>

        <strong>Attention!</strong> 
            
    
        <?php echo Yii::$app->session->getFlash('success'); ?>
        
    </div>
   <?php endif; ?>
<!--	<nav class="navbar navbar-default">
  <div class="container">
     Brand and toggle get grouped for better mobile display 
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-logo" href="<?= Yii::$app->homeUrl; ?>"><img src="<?php echo Yii::getAlias('@web') ?>/design/template/img/logo.png"></a>
    </div>

     Collect the nav links, forms, and other content for toggling 
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
         <li><a href="<?= Url::toRoute(['/site/login'])?>"><i class="fa fa-user"></i>My Account</a></li>
        <li><a class="btn-submit-ad" href="#">Submit an Ad</a></li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li> 
      </ul>
    </div> /.navbar-collapse 
  </div> /.container
</nav>-->
 <nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     <a class="navbar-logo" href="<?= Yii::$app->homeUrl; ?>"><img src="<?php echo Yii::getAlias('@web') ?>/design/template/img/logo.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <?php $user=explode("@", Yii::$app->user->identity->username); ?>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $user[0] ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Messages</a></li>
            <li><a href="#">Favourites</a></li>
            <li><a href="#">Ads</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?= Url::toRoute(['/user/setting'])?>">Account Settings</a></li>
            <li><a href="<?= Url::toRoute(['/user/cdetails'])?>">Dashboard</a></li>
             <li><a href="<?= Url::toRoute(['/site/logout'])?>">logout</a></li>
          </ul>
        </li>
        <li><a class="btn-submit-ad" href="<?= Url::toRoute(['/site/submitad'])?>">Submit an Ad</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-->
</nav>
</header>


<?= $content ?>


<footer>
  <section class="col-lg-12 col-md-12 col-sm-12 hidden-xs footer-top">
    <div class="container">
        <a href="#"><img src="<?php echo Yii::getAlias('@web') ?>/design/template/img/ftr-top-img.png"></a>
    </div>
  </section>

  <section class="col-lg-12 col-md-12 col-sm-12 footer-btm">
    <div class="container footer-btm-inr">

      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
        <a href="#"><img src="<?php echo Yii::getAlias('@web') ?>/design/template/img/ftr-logo.jpg"></a>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-4 col-xs-5 ftr-menu">
        <h3>Popular Cities</h3>
        <ul>
          <li><a href="#">Karachi</a></li>
          <li><a href="#">Karachi</a></li>
          <li><a href="#">Karachi</a></li>
          <li><a href="#">Karachi</a></li>
          <li><a href="#">Karachi</a></li>
          <li><a href="#">Karachi</a></li>
          <li><a href="#">Karachi</a></li>
          <li><a href="#">Karachi</a></li>
          <li><a href="#">Karachi</a></li>
          <li><a href="#">Karachi</a></li>
        </ul>
      </div>  

      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 ftr-menu">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="#">How it Works</a></li>
          <li><a href="#">Terms of Use</a></li>
          <li><a href="#">Safety Tips</a></li>
          <li><a href="#">Help & Contact</a></li>
          <li><a href="#">Who We Are</a></li>
          <li><a href="#">How it Works</a></li>
          <li><a href="#">Terms of Use</a></li>
          <li><a href="#">Safety Tips</a></li>
          <li><a href="#">Help & Contact</a></li>
          <li><a href="#">Who We Are</a></li>
        </ul>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ftr-social-wrap">
        <span>Connect with us</span>
        <ul id="ftr-social-btns" class="social-media-button" role="tabpanel" >
            <a target="_blank" rel="nofollow" href="https://www.facebook.com/vpnranks"><li class="social-fb"><i class="fa fa-facebook"></i></li></a>
            <a target="_blank" rel="nofollow" href="https://twitter.com/VPNRanks"><li class="social-tw"><i class="fa fa-twitter"></i></li></a>
            <a target="_blank" rel="nofollow" href="https://plus.google.com/+Vpnranks/posts"><li class="social-gp"><i class="fa fa-google-plus"></i></li></a>
        </ul>
      </div>    

    </div>
  </section>

  <section class="col-lg-12 col-md-12 col-sm-12 col-sm-12 footer-btm2">
    <div class="container">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 footer-btm2-left">
        © 2015 Abc Company, All Rights Reserved
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 footer-btm2-right pull-right">
        Powered By <a href="">Webxdesigner</a>
      </div>
    </div>
  </section>
</footer>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
  
  <?php  $this->endBody() ?>
  </body>
</html>
<?php  $this->endPage() ?>


<script>
$('li').click(function(){
            $('li').removeClass('active-tab');
            $(this).removeClass('active-tab');
            $(this).addClass('active-tab');
         });

</script>
    