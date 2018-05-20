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
    <title>Hangshop.PK | Need Help - Octopus Hands</title>

    <!-- Bootstrap -->
    <link href="<?php echo Yii::getAlias('@web') ?>/design/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/design/css/bootstrap-select.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <link href="<?php echo Yii::getAlias('@web') ?>/design/css/font-awesome.min.css" rel="stylesheet">
     <link href="<?php echo Yii::getAlias('@web') ?>/design/css/theme.css" rel="stylesheet">
    <!-- Custom Font Family -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,900' rel='stylesheet' type='text/css'>
    <!-- Custom Stylesheet -->
    <link href="<?php echo Yii::getAlias('@web') ?>/design/css/custom.css" rel="stylesheet">
    <link href="<?php echo Yii::getAlias('@web') ?>/design/css/slider.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" media="screen" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.css" />

    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

 
    <!--<script src="<?php echo Yii::getAlias('@web') ?>/design/js/jquery-1.9.1.min.js"></script>-->
	<!--<script src="<?php echo Yii::getAlias('@web') ?>/design/js/jquery.js"></script>-->
	<!--<script src="<?php echo Yii::getAlias('@web') ?>/design/js/jssor.js" type="text/javascript"></script>-->
    <!--<script src="<?php echo Yii::getAlias('@web') ?>/design/js/jssor.slider.js" type="text/javascript"></script>-->
     <!--<script src="<?php echo Yii::getAlias('@web') ?>/design/js/bootstrap-select.js"></script>-->
	<script type="text/javascript">

        jQuery(document).ready(function ($) {

            var _SlideshowTransitions = [
            //Fade in L
                {$Duration: 1200, x: 0.3, $During: { $Left: [0.3, 0.7] }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            //Fade out R
                , { $Duration: 1200, x: -0.3, $SlideOut: true, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            //Fade in R
                , { $Duration: 1200, x: -0.3, $During: { $Left: [0.3, 0.7] }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            //Fade out L
                , { $Duration: 1200, x: 0.3, $SlideOut: true, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }

            //Fade in T
                , { $Duration: 1200, y: 0.3, $During: { $Top: [0.3, 0.7] }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            //Fade out B
                , { $Duration: 1200, y: -0.3, $SlideOut: true, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            //Fade in B
                , { $Duration: 1200, y: -0.3, $During: { $Top: [0.3, 0.7] }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            //Fade out T
                , { $Duration: 1200, y: 0.3, $SlideOut: true, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }

            //Fade in LR
                , { $Duration: 1200, x: 0.3, $Cols: 2, $During: { $Left: [0.3, 0.7] }, $ChessMode: { $Column: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            //Fade out LR
                , { $Duration: 1200, x: 0.3, $Cols: 2, $SlideOut: true, $ChessMode: { $Column: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            //Fade in TB
                , { $Duration: 1200, y: 0.3, $Rows: 2, $During: { $Top: [0.3, 0.7] }, $ChessMode: { $Row: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            //Fade out TB
                , { $Duration: 1200, y: 0.3, $Rows: 2, $SlideOut: true, $ChessMode: { $Row: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }

            //Fade in LR Chess
                , { $Duration: 1200, y: 0.3, $Cols: 2, $During: { $Top: [0.3, 0.7] }, $ChessMode: { $Column: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            //Fade out LR Chess
                , { $Duration: 1200, y: -0.3, $Cols: 2, $SlideOut: true, $ChessMode: { $Column: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            //Fade in TB Chess
                , { $Duration: 1200, x: 0.3, $Rows: 2, $During: { $Left: [0.3, 0.7] }, $ChessMode: { $Row: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            //Fade out TB Chess
                , { $Duration: 1200, x: -0.3, $Rows: 2, $SlideOut: true, $ChessMode: { $Row: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }

            //Fade in Corners
                , { $Duration: 1200, x: 0.3, y: 0.3, $Cols: 2, $Rows: 2, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $ChessMode: { $Column: 3, $Row: 12 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            //Fade out Corners
                , { $Duration: 1200, x: 0.3, y: 0.3, $Cols: 2, $Rows: 2, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $SlideOut: true, $ChessMode: { $Column: 3, $Row: 12 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }

            //Fade Clip in H
                , { $Duration: 1200, $Delay: 20, $Clip: 3, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            //Fade Clip out H
                , { $Duration: 1200, $Delay: 20, $Clip: 3, $SlideOut: true, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseOutCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            //Fade Clip in V
                , { $Duration: 1200, $Delay: 20, $Clip: 12, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            //Fade Clip out V
                , { $Duration: 1200, $Delay: 20, $Clip: 12, $SlideOut: true, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseOutCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
                ];

            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlayInterval: 1500,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                                //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 800,                                //Specifies default duration (swipe) for slide in milliseconds

                $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                    $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                    $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                    $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                    $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
                },

                $ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 1                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                },

                $ThumbnailNavigatorOptions: {                       //[Optional] Options to specify and enable thumbnail navigator or not
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                    $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                    $SpacingX: 8,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $DisplayPieces: 10,                             //[Optional] Number of pieces to display, default value is 1
                    $ParkingPosition: 360                          //[Optional] The offset position to park thumbnail
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider1.$ScaleWidth(Math.max(Math.min(parentWidth, 800), 300));
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script>
    
    
    
    
  </head>
  <body>
<?php 
if(isset($_GET['id'])){
    $id=$_GET['id'];
}  else {
$id=0;    
}
?>
    <!-- <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top-ad-box-wrap">
          <div class="container top-ad-box"><?php 
            $imgsrc = \backend\models\CommercialAds::find()->orderBy(['id'=>SORT_DESC])->where(['category_id'=>$id])->one();
          if(isset($imgsrc)){}
          else{
           $imgsrc = \backend\models\CommercialAds::find()->orderBy(['id'=>SORT_DESC])->where(['category_id'=>0])->one();
          }
          if(file_exists(Yii::$app->request->baseUrl.'/admin/uploads/'.$imgsrc->top_ad))
          { ?>
             <a target="_blank" href="<?= $imgsrc->top_ad_url ?>">
             <img class="img-responsive" src="<?= Yii::$app->request->baseUrl ?>/admin/uploads/<?= $imgsrc->top_ad ?>"></a>
          <?php } else{ ?>
              <img class="img-responsive" src="<?= Yii::$app->request->baseUrl?>/admin/uploads/top-banner.jpg">
         <?php }
          ?>
              
          </div>
      </section>-->
  
<header>
   <?= \lajax\languagepicker\widgets\LanguagePicker::widget([
    'skin' => \lajax\languagepicker\widgets\LanguagePicker::SKIN_BUTTON,
    'size' => \lajax\languagepicker\widgets\LanguagePicker::SIZE_SMALL
]); ?>
    
<!--    <h1><? // \Yii::t('yandex', 'Congratulations!') ?></h1>-->
  <div class="container">
  
      <?php if(Yii::$app->session->hasFlash('success')):?>
<div class="alert alert-info fade in ">

        <a href="#" class="close" data-dismiss="alert">&times;</a>

        <strong>Attention!</strong> 
            
    
        <?php echo \Yii::t('yandex', Yii::$app->session->getFlash('success')); ?>
        
    </div>
   <?php endif;
   if(!Yii::$app->user->isGuest){
     if(!Yii::$app->user->isGuest) $user=explode("@", Yii::$app->user->identity->username); ?>
   
      <nav class="navbar navbar-default">
  <div class="container">
     <!--Brand and toggle get grouped for better mobile display--> 
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     <a class="navbar-logo" href="<?= Yii::$app->homeUrl; ?>"><img src="<?php echo Yii::getAlias('@web') ?>/design/img/logo.png"></a>
    </div>

     <!--Collect the nav links, forms, and other content for toggling--> 
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown sub">
            
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $user[0] ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li class="sub"><a href="<?= Url::toRoute(['/user/setting', 'message'=>'1'])?>">Messages</a></li>
             <li id="" class="sub"><a href="<?= Url::toRoute(['/user/setting','ads'=>1])?>">Ads</a></li>
            <li role="separator" class="divider sub"></li>
            <li class="sub"><a href="<?= Url::toRoute(['/user/setting', 'setting'=>1])?>">Account Settings</a></li>
             <li class="sub"><a href="<?= Url::toRoute(['/site/logout'])?>">logout</a></li>
          </ul>
        </li>
        <li class="sub"><a class="btn-submit-ad" href="<?= Url::toRoute(['/site/submitad'])?>">Post ad</a></li>
      </ul>
    </div> 
     <!--.navbar-collapse--> 
  </div> 
          <!--/.container-->
</nav>
	
      <?php
   }else{
       
   
   ?>
 
<nav class="navbar navbar-default navbar-static">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-logo" href="<?= Yii::$app->homeUrl; ?>"><img src="<?php echo Yii::getAlias('@web') ?>/design/img/logo.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
         <li class="sub"><a href="<?= Url::toRoute(['/site/login'])?>"><i class="fa fa-user"></i>My Account</a></li>
         <li class="sub"><a class="btn-submit-ad" href="<?= Url::toRoute(['/site/submitad'])?>">Post Ad</a></li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-->
</nav>

   <?php } ?>
   
 </div>
 
   
</header>

<div class="main-pg">
  <div class="banner-head">
   		<h1>Pakistan's Largest Portal</h1>
        <p>Best place for free ads. High exposure, just watch out for scams</p>
   </div>
</div>

<?= $content ?>


  <!-- Ads Boxes -->
  
  
  
  
 <!-- <div class="ads-vr ads-vr-left">
    <img class="img-responsive" src="<?= Yii::$app->request->baseUrl?>/admin/uploads/<?= $imgsrc->left_ad ?>" >
  </div>
  <div class="ads-vr ads-vr-right">
      <a target="_blank" href="<?php echo $imgsrc->right_ad_url; ?>" >
          <img class="img-responsive" src="<?= Yii::$app->request->baseUrl?>/admin/uploads/<?=$imgsrc->right_ad ?>" >
      </a>
  </div>-->
  <!-- /Ads Boxes -->

<footer>
<!--  <section class="col-lg-12 col-md-12 col-sm-12 hidden-xs footer-top">
    <div class="container">
        <a href="#"><img src="<?php echo Yii::getAlias('@web') ?>/design/img/ftr-top-img.png"></a>
    </div>
  </section>-->

  <section class="col-lg-12 col-md-12 col-sm-12 footer-btm footer-bg " style="margin-top: 20px;">
    <div class="container footer-btm-inr">

      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
        <a href="#" class="ftr-log"><img src="<?php echo Yii::getAlias('@web') ?>/design/img/ftr-logo.png"></a>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-4 col-xs-5 ftr-menu">
        <h3>Popular Cities</h3>
        <ul>
          <li><a  href="<?= Url::toRoute(['/site/searchad'])?>&city=Abbotabad">Abbotabad</a></li>
          <li><a  href="<?= Url::toRoute(['/site/searchad'])?>&city=Faislabad">Faislabad</a></li>
          <li><a  href="<?= Url::toRoute(['/site/searchad'])?>&city=Gujranwala">Gujranwala</a></li>
          <li><a  href="<?= Url::toRoute(['/site/searchad'])?>&city=Gujrat">Gujrat</a></li>
          <li><a  href="<?= Url::toRoute(['/site/searchad'])?>&city=Hyderabad">Hyderabad</a></li>
          <li><a  href="<?= Url::toRoute(['/site/searchad'])?>&city=Islamabad">Islamabad</a></li>
          <li><a  href="<?= Url::toRoute(['/site/searchad'])?>&city=Karachi">Karachi</a></li>
          <li><a  href="<?= Url::toRoute(['/site/searchad'])?>&city=Lahore">Lahore</a></li>
          <li><a  href="<?= Url::toRoute(['/site/searchad'])?>&city=Multan">Multan</a></li>
          <li><a  href="<?= Url::toRoute(['/site/searchad'])?>&city=Peshawar">Peshawar</a></li>
          <li><a  href="<?= Url::toRoute(['/site/searchad'])?>&city=Quetta">Quetta</a></li>
          <li><a  href="<?= Url::toRoute(['/site/searchad'])?>&city=Rawalpindi">Rawalpindi</a></li>
          <li><a  href="<?= Url::toRoute(['/site/searchad'])?>&city=Sargodha">Sargodha</a></li>
          <li><a  href="<?= Url::toRoute(['/site/searchad'])?>&city=Sialkot">Sialkot</a></li>
                 
        </ul>
      </div>  

      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 ftr-menu">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="<?php echo Url::to(['site/whoweare']);?>">Who We Are</a></li>
          <li><a href="<?php echo Url::to(['site/terms-of-use']);?>">Terms of Use</a></li>
          <li><a href="<?php echo Url::to(['site/safety-tips']);?>">Safety Tips</a></li>
          <li><a href="<?php echo Url::to(['site/help-and-contact']);?>">Help & Contact</a></li>
          <li><a href="<?php echo Url::to(['site/faqs']);?>">FAQS</a></li>
          <li><a href="<?php echo Url::to(['site/mission']);?>">Our Mission</a></li>
          <li><a href="<?php echo Url::to(['site/howitworks']);?>">How It Works</a></li>
          <li><a href="<?php echo Url::to(['site/using-application']);?>">Application Explained</a></li>
          <li><a href="<?php echo Url::to(['user/user-registration']);?>">Register</a></li>
          <li><a href="#"></a></li>
        </ul>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ftr-social-wrap">
        <span>Connect with us</span>
        <ul id="ftr-social-btns" class="social-media-button" role="tabpanel" >
            <a target="_blank" rel="nofollow" href="#"><li class="social-fb"><i class="fa fa-facebook"></i></li></a>
            <a target="_blank" rel="nofollow" href="#"><li class="social-tw"><i class="fa fa-twitter"></i></li></a>
            <a target="_blank" rel="nofollow" href="#"><li class="social-gp"><i class="fa fa-google-plus"></i></li></a>
        </ul>
      </div>    

    </div>
  </section>

  <section class="col-lg-12 col-md-12 col-sm-12 col-sm-12 footer-btm2">
    <div class="container">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 footer-btm2-left">
        © 2018 Hangshop.pk, All Rights Reserved
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 footer-btm2-right pull-right">
        Powered By <a href="http://behance.net/khurramgfx" target="_blank">khurramgfx</a>
      </div>
    </div>
  </section>
</footer>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  
  
<script>

		
		
    
    $(document).ready(function () {
       // alert('ssssss')
//        $('.searchable tr').hide();
    (function ($) {

        $('#filter').keyup(function () {

            var rex = new RegExp($(this).val(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        })

    }(jQuery));

});
    
  function data(item){
//    var d =  $(item).attr('data-conv_id').value();
     var d =  $(item).attr('data-conv_id');
     
  $.ajax({


        type: "GET",
        url: "<?php echo Yii::$app->getUrlManager()->createUrl('user/messagelist'); ?>",
        data: {
            id: d
        },

        success: function(data) {
               var list='';
//            document.getElementById("optional").innerHTML = data;
                 
              $.each(data, function(index,jsonObject){
                var meta = getside(jsonObject.from);
                var adid = jsonObject.ad_id
                 document.getElementById("adid").value = jsonObject.ad_id;
//                  alert(jsonObject.message);
                  list += `<div class="row center-block"> <span class="span-4"><a class=`+meta[0]+` href="#">
            <img class="media-object img-circle" src=`+meta[1]+` alt="" />
            </a>
            </span>
               <div class="`+meta[2]+`">`+jsonObject.message+`<br />
                <small class=" text-muted">
                <span class="glyphicon glyphicon-time"></span>
                `+jsonObject.created+`
                </small>
           </div></div>`;
               
            });
            document.getElementById("modal-body").innerHTML = list;
        }
    });
 
}    
 
 
 function readed(id){
      
    $.ajax({
      type: "GET",
      url: "<?php  echo Yii::$app->getUrlManager()->createUrl('user/readed'); ?>",
      data: {id:id },
                          
       success: function(data){
       // $('#myModal').modal("hide");
//            $('#close').click();
      }
    });
    }
    
//    Archive conversation start here
    function archive(id){
//      alert(id);
    $.ajax({
      type: "GET",
      url: "<?php  echo Yii::$app->getUrlManager()->createUrl('user/archive'); ?>",
      data: {id:id },
                          
       success: function(data){
           location.reload(); 
       // $('#myModal').modal("hide");
//            $('#close').click();
      }
    });
    
    }
//  Archive conversation End here
  
//  //    Archive conversation start here
    function archive(id){
//      alert(id);
    $.ajax({
      type: "GET",
      url: "<?php  echo Yii::$app->getUrlManager()->createUrl('user/archive'); ?>",
      data: {id:id },
                          
       success: function(data){
           location.reload(); 
       // $('#myModal').modal("hide");
//            $('#close').click();
      }
    });
    
    }
//  Archive conversation End here
//    Archive conversation start here
    function arest(id){
//      alert(id);
    $.ajax({
      type: "GET",
      url: "<?php  echo Yii::$app->getUrlManager()->createUrl('user/arest'); ?>",
      data: {id:id },
                          
       success: function(data){
           location.reload(); 
       // $('#myModal').modal("hide");
//            $('#close').click();
      }
    });
    
    }
//  Archive restore End here
       
    
   function msg(id){
     
   id = id || 0;
   if(id == 0){
    var id = document.getElementById("adid").value;
    
//     alert(id);
    }
//    alert(id);
     var msg = document.getElementById("msg").value;
    $.ajax({
      type: "GET",
      url: "<?php  echo Yii::$app->getUrlManager()->createUrl('advertisement/submitmsg'); ?>",
      data: { msg: msg, id:id },
                          
       success: function(data){
       // $('#myModal').modal("hide");
//            $('#close').click();
            location.reload();
      }
    });
    }
    
     function msg2(id, msgid){
     
//   id = id || 0;
//   if(id == 0){
//    var id = document.getElementById("adid").value;
//   
//    }
//    alert(id);
    var conv_id = document.getElementById(id).value;
//     alert(conv_id);
var msgdata = 'msg'+msgid;
//    alert(msgdata);
     var msg = document.getElementById(msgdata).value;
//     alert(msg);
    $.ajax({
      type: "GET",
      url: "<?php  echo Yii::$app->getUrlManager()->createUrl('advertisement/submitmsg2'); ?>",
      data: { msg:msg, id:id, con_id:conv_id },
                          
       success: function(data){
       // $('#myModal').modal("hide");
//            location.reload(); 
             $("#answersContainer"+msgid).append("<li class='saying root my'><div class='titlebar'><p><a  class='tdnone link'><span class='pull-right time'>Now</span>Your answer</p></div> <div class='cloud br5'><p>" +msg+"</p> </div><div class='statusbar'>not seen</div></li>");
      }
    });
    }
    

function getside(id){
    <?php $d=0; if(!Yii::$app->user->isGuest) $d=\Yii::$app->user->identity->id; ?>
         if(id=="<?= $d ?>"){
  var side = ["pull-right", "http://placehold.it/50/FA6F57/fff&text=ME", "bubble you span-8"];
   }else{
    var side = ["pull-left", "http://placehold.it/50/55C1E7/fff&text=U", "bubble me span-8"];}
return side

}

//    $('#showcat').on('focus', function() {
//    // alert("hello");
//    $('#showcat').click();
//
//});
$(".hiddene").hide();
$('.main li').click(function() {
    var sel = $(this).attr("id");
    text1 = $(this).text();
    //            alert(text);
    $('.subm').hide();
    $('#s' + sel).fadeIn(100);
});


$('.subm:not(.ssb ) li').click(function() {
    var sel2 = $(this).attr("target");
    text2 = $(this).text();

    $('.sb').hide();
    $('#' + sel2).fadeIn(100);
});
$('.ssb:not(.lst) li').click(function() {
    var sel2 = $(this).attr("target");
    text3 = $(this).text();
    //	 alert(sel2);
    //         alert(text);
    //         alert(text2);
    $('.lst').hide();
    $('#' + sel2).fadeIn(100);
});

$('.lst li').click(function() {

    text4 = $(this).text();
    //        var text0= text1+","+text2+","+text3+","+text4;
    //          alert(text4);
    //          alert(text2);
    //   alert(text0);
    // $('.sb').hide();
    //  $('#'+sel2).fadeIn(100);
    $('#cate').html('<a data-target="#category" data-toggle="modal" class="btn btn-primary tog"  href="#">Change</a><label>Category<b class="asterisk">*</b></label><h5> <span id="cat_image"></span> ' + text1 + ' >> ' + text2 + ' >> ' + text3 + ' >> ' + text4 + '</h5>');
    //         $('#category').modal('toggle');
    var id = $(this).attr("catid");
    optionalfields(id);
    $("#advertisement-category_id").val(id);
    getimg(id);
    $('.close').click();
});



//        $('.ssb li').click(function(){
//          var sel2 = $(this).attr("target");
//           var catid = $(this).attr("catid");
//          text3=$(this).text();
//          var text0= text+","+text2+","+text3;
//
//          $('.sb').hide();
//          $('#'+sel2).fadeIn(100);
//          $('#cate').html('<label>Category<b class="asterisk">*</b></label><h5> <i class="fa fa-car"></i> '+text+' >> '+text2+'>>'+text3+'</h5><a data-target="#category" data-toggle="modal" class="btn btn-primary tog"  href="#">change</a>');
////          $('#category').modal('toggle');
//            $(".hiddene").hide();
//            $("#"+catid).show();
//            $("#advertisement-category_id").val(catid);
//            $('.close').click();
//        });         

$('.end').click(function() {

    var text0 = text1 + "," + text2 + "," + text3;

    $('#cate').html('<label>Category<b class="asterisk">*</b></label><h5> <span id="cat_image"></span> ' + text1 + ' >> ' + text2 + '>>' + text3 + '</h5><a data-target="#category" data-toggle="modal" class="btn btn-primary tog"  href="#">Change</a>');
    var id = $(this).attr("catid");
    optionalfields(id);
    $("#advertisement-category_id").val(id);
    getimg(id);
    $('.close').click();
});


$('.end2').click(function() {

    var text0 = text1 + "," + text2;

    $('#cate').html('<label>Category<b class="asterisk">*</b></label><span id="cat_image"></span><a class="cat_image_name"> ' + text1 + ' » ' + text2 + '</a><a data-target="#category" data-toggle="modal" class="btn btn-primary tog"  href="#">Change</a>');
    var id = $(this).attr("catid");
    optionalfields(id);
    $("#advertisement-category_id").val(id);
    getimg(id);
    $('.close').click();
});
$('.end3').click(function() {

    var text0 = text1 + "," + text2 + "," + text3;

    $('#cate').html('<label>Category<b class="asterisk">*</b></label><span id="cat_image"></span><a class="cat_image_name"> ' + text1 + ' » ' + text2 + '»' + text3 + '</a> <a data-target="#category" data-toggle="modal" class="btn btn-primary tog"  href="#">Change</a>');
    var id = $(this).attr("catid");
    optionalfields(id);
    $("#advertisement-category_id").val(id);
    getimg(id);
    $('.close').click();
});

$('.payment').click(function() {

    var sel2 = $(this).attr("link");
    //             alert(sel2);
    $("#payform").attr("action", sel2);
    document.payment.submit();
});
$(document).ready(function() {
    $('#payform').formValidation();
});


//   this is for optional fields
function optionalfields(id) {

    //                alert(id);
    //             alert(item.value)
    $.ajax({


        type: "GET",
        url: "<?php echo Yii::$app->getUrlManager()->createUrl('site/optionalfields'); ?>",
        data: {
            id: id
        },
        success: function(data) {
            document.getElementById("optional").innerHTML = data;
            
                    $('#datafilter').datepicker();
    
                        }
                    });
}
// optional fields End

function getimg(id) {

    //                alert(id);
    //             alert(item.value)
    $.ajax({


        type: "GET",
        url: "<?php echo Yii::$app->getUrlManager()->createUrl('site/getimg'); ?>",
        data: {
            id: id
        },

        success: function(data) {
            //  alert('<img src="/my_classified/admin/uploads/ '+ data +'" class="img-responsive">');
            document.getElementById("cat_image").innerHTML = '<img style="padding-top:4px" width="60px" height="65px" src="<?= Yii::$app->request->baseUrl?>/admin/uploads/' + data + '">';
        }
    });
}


function getimg(id) {

    //                alert(id);
    //             alert(item.value)
    $.ajax({


        type: "GET",
        url: "<?php echo Yii::$app->getUrlManager()->createUrl('site/getimg'); ?>",
        data: {
            id: id
        },

        success: function(data) {
            //  alert('<img src="/my_classified/admin/uploads/ '+ data +'" class="img-responsive">');
            document.getElementById("cat_image").innerHTML = '<img style="padding-top:4px" width="60px" height="65px" src="<?= Yii::$app->request->baseUrl?>/admin/uploads/' + data + '">';
        }
    });
}


function search() {

    $("#ads").html('<img width="200" height="200" src="<?= Yii::getAlias("@web") ?>/design/img/loading.gif" />');
    var loca = document.getElementById('location').value;
    var category = document.getElementById('category').value;
    var regio = document.getElementById('region').value;
    var key = document.getElementById('key').value;
    var min =  document.getElementById("min_price").value;
     var max =  document.getElementById("max_price").value;
     var day = document.getElementById("day").value;
     var condition = $('input[name="condition"]:checked').val();
     var type = $('input[name="type"]:checked').val();
     var op_fi = [];
     $('input[name="optional"]:checked').each(function() {
     op_fi.push(this.value);
     });
     console.log(op_fi);
   
    $.ajax({
        type: "GET",
        url: "<?php  echo Yii::$app->getUrlManager()->createUrl('site/searchad'); ?>",

        data: {
            city: loca,
            category: category,
            region: regio,
            skey: key,
            min_price: min,
            max_price: max,
            day: day,
            condition: condition,
            type: type,
            op_fi : op_fi
        },
        //       setTimeout(function(){ alert("No result found"); }, 3000);          
        success: function(data) {
            //       alert(data);
            document.getElementById("ads").innerHTML = data;
        }
    });
}
function set_day(item){
var day=item;

 document.getElementById("day").value = day;
 search();
}

function change_status(id) {


    $.ajax({
        type: "GET",
        url: "<?php  echo Yii::$app->getUrlManager()->createUrl('user/changestatus'); ?>",
        data: {
            id: id
        },

        success: function(data) {
            //       alert(data);
            document.getElementById("danger" + id).innerHTML = data;
        }
    });
}


jQuery(document).ready(function() {
    jQuery('#wwa').on('click', function(event) {
        jQuery('#wwa-content').toggle('show');
    });
});
jQuery(document).ready(function() {
    jQuery('#wwa1').on('click', function(event) {
        jQuery('#wwa1-content').toggle('show');
    });
});
jQuery(function($) {
    $('.widget_head_type').each(function() {
        // closures
        var $toggle = $(this);
        var $parent = $toggle.closest('.some_parent_class');
        var $target = $parent.find('.widget_body_type');
        var $label = $toggle.find('.test');
        var bIsTweening = false;
        // OR var $target = $toggle.next('.widget_body_type');
        // event methods (closures)
        var fClickToggle = function() {
            if (!bIsTweening) {
                bIsTweening = true;
                $target.slideToggle('slow', fToggleCallback);
            }
        };
        var fToggleCallback = function() {
            bIsTweening = false;
            fSetLabel();
        };
        var fSetLabel = function() {
            var sLabel = $label.text().replace('see more', '').replace('less', '');
            sLabel = ($target.is(':visible') ? 'less' : 'see more') + sLabel;
            $label.html(sLabel);
        };
        // handle event
        $toggle.click(fClickToggle);
        $target.hide();
        fSetLabel();
    });
});
<!---------this script use in list gallary---->
$('.detail').click(function(){
		$('.selectedcat-box').animate({
                    float: 'left',
                    width:'98%',
                    margin: '0 0px 10px 12px',
                    padding:'10px',
                    position:'relative',
                    height:'220px',
                    transition: 'background-color 0.5s ease',
                    //margin-bottom: '20px',
                    
                },500);
	
    $('.product_detail').animate({
        float:'left',
        width: '66%',
    }, 500);
    $('.extracls').animate({
        width:'34%',
    }, 500);
    $('.product_detail a.title_head').animate({
        float: 'left',
        margin: '10px 0',
        width: '100%'
    }, 500);
    $('.verifyadd').animate({
        height: '40px',
    width: '85px',
    position:'absolute',
    bottom:'15px',
    right:'10px'
    }, 500);
    $('.productprice').animate({
       // width:'auto',
    position:'absolute',
    top:'3px',
    right:'4px',
    color:'#2965be',
    background: '#f3f3f3',
    padding: '4px',
  
    }, 500);
    
    $('.image-box').animate({
        width: '200px',
        height:'200px'
    }, 500);
       
	});

$('.small-icon').click(function() {
    $('.selectedcat-box').animate({
        width: '28%',
        height:'400px'
    }, 500);
    $('.extracls').animate({
        width: '100%',
        margin:'0',
    }, 500);
    $('.product_detail').animate({
        width: '100%',
        margin:'0',
        padding:'0',
    }, 500);
    $('.product_detail a.title_head').animate({
        width: '100%',
    }, 500);
    $('.verifyadd').animate({
        top: '90px',
    }, 500);
    $('.productprice').animate({
        color: '#fff'
    }, 500);
    
    
    
    
    $('.image-box').animate({
        width: '100%',
        height:'120px'
    }, 500);
    $('.product_detail').animate({
        width: '100%',
        margin:'0'
    }, 500);
    
    
    
    
});
$('.compact').click(function() {
    $('.selectedcat-box').animate({
        width: '100%',
        height:'100%'
    }, 500);
    $('.image-box').animate({
        width: '100%',
        height:'100%'
    }, 500);
   
    

});
<!---------this script use in model popup---->
function city(id, item) {

    $('#popup-hide').hide();
    $('#region').val($(item).text());
    //        alert($(item).text());
    $('#' + id).fadeIn(100);

}


$('.back').click(function() {
    $('#popup-hide').fadeIn(100);

    $('.subcities').hide();
});

$(".myLi").click(function() {
//      str = str.trim();
//        document.getElementById('category').value = str; 
    $('#location').val($(this).text().trim());
    if($(this).text()=="All Norge"){
        $('#location').val('');
    }
    $('#myModal').fadeOut(100);
    $('.modal-backdrop').fadeOut(100);
    if (typeof(Storage) !== "undefined") {
    // Store
    localStorage.setItem("lasetlocation", $(this).text());
    // Retrieve
    document.getElementById("lasetlocation").innerHTML = localStorage.getItem("lasetlocation");
} else {
    document.getElementById("lasetlocation").innerHTML = "Sorry, your browser does not support Web Storage...";
}



});
$("#category").click(function() {
    $('.header').toggle();
});
$(".myCategory").click(function() {
    $('#category').val($(this).text());
    $('.header').hide();
    return false;
});

//This function bring the first level of sub categories in model for selection        
function modal_cat(item) {
    var cat_id = item.value;
    var cat = [];
    var title = item.title;
    document.getElementById('modal-title').innerHTML = title;

    $.ajax({ //create an ajax request to load_page.php
        type: "GET",

        url: "<?php  echo Yii::$app->getUrlManager()->createUrl('category/getchild'); ?>",
        data: {
            id: cat_id
        },

        dataType: "JSON", //expect html to be returned                
        success: function(response) {
            if (response.length > 0) {
                for (i = 0; i < response.length; i++) {
                    cat += '<a href="#"><li onclick="modal_sub(this)" class="active" id="' + response[i]["id"] + '">' + response[i]["title"] + '</li><a>';
                }
                document.getElementById('c3').innerHTML = cat;
                 $("#myModal").modal('show');
            } else {
                document.getElementById('modal-body').innerHTML = "";
                
                window.location.assign("<?= Yii::$app->getUrlManager()->createUrl('site/searchad')?>&id=" + cat_id);
            }
        }
    });
}

function modal_sub(item) {
    var cat_id = item.id;
    $("#cs").removeClass("hidden");

    var cat = [];
    //             var title = item.title ;
    //            document.getElementById('modal-title').innerHTML=title;

    $.ajax({ //create an ajax request to load_page.php
        type: "GET",

        url: "<?php echo Yii::$app->getUrlManager()->createUrl('category/getchild'); ?>",
        data: {
            id: cat_id
        },

        dataType: "JSON", //expect html to be returned                
        success: function(response) {
            if (response.length > 0) {
                for (i = 0; i < response.length; i++) {
                    cat += '<a herf="<?php echo Yii::$app->getUrlManager()->createUrl('
                    site / search ')?>&id="' + response[i]['id'] + '""><li onclick="link(this)" id="' + response[i]["id"] + '" class="active"><span style="cursor:pointer">' + response[i]["title"] + '</span> </li></a>';
                    //                 alert(response[i]["title"]);
                }
                document.getElementById('cs').innerHTML = cat;
            } else {
                document.getElementById('modal-body').innerHTML = "";
                //          window.location.navigate("<?php echo Yii::$app->getUrlManager()->createUrl('site/search')?>&id="+cat_id);
                window.location.href = "<?php echo Yii::$app->getUrlManager()->createUrl('site/searchad')?>&id=" + cat_id;
            }
        }
    });


}

function link(item) {
    var cat_id = item.id;
    window.location.href = "<?php echo Yii::$app->getUrlManager()->createUrl('site/searchad')?>&id=" + cat_id;
}

function mark_sold(id) {


    $.ajax({
        type: "GET",
        url: "<?php  echo Yii::$app->getUrlManager()->createUrl('user/marksold'); ?>",
        data: {
            id: id
        },

        success: function(data) {
            //       alert(data);
            document.getElementById("makas" + id).innerHTML = data;
            $("#makas" + id).addClass( "btn btn-primary disabled" );
            location.reload();
        }
    });
}


</script>

<!-- Include all compiled plugins (below), or include individual files as needed -->

  
<script>
  $(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });
  });
  if (typeof(Storage) !== "undefined") {
     document.getElementById("lasetlocation").innerHTML = localStorage.getItem("lasetlocation");
     }
</script>
  <?php //  $this->endBody() ?>
  </body>
</html>
<?php  $this->endPage() ?>


