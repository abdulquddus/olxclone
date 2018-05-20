<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;
/* @var $this yii\web\View */
?>

<div class="container">

    <div class="col-md-12">
    <div class="welocme_content">
    	<?= $content->title?>
        <br/>
        <br/>
        <?= $content->content?>

    </div>
        <br/><br/>
  <div class="col-md-3"><a href="<?php echo Url::to(['exams/demo']);?>" class="news_lettter">NEXT</a>
            </div>
    </div>
    
    </div>