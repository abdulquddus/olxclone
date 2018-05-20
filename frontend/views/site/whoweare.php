<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Mediscope';


?>
   <div class="container ">
       
      
   	<div class="col-md-3">
    		<div id="demo1"></div>
            
    	    <br clear="all">
    </div>
    <div class="col-md-12">
    <div class="welocme_content">
    	<?= $content->title?>
        <?= $content->content?>
<a href="<?php echo Url::to(['site/signup']);?>" class="start_now">Start Now</a>
    </div>
    </div>
    </div>
