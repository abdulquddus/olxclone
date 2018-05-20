<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="container">
<!--   	<div class="col-md-3">

        <ul id="menu" class="nav_menu">
        <li><a href="<?php echo Url::to(['site/foundation']);?>"  class="active">Foundation Programme</a></li>
        <li><a href="<?php echo Url::to(['site/keydates']);?>">Key Dates</a></li>
        <li><a href="<?php echo Url::to(['site/competition']);?>">Competition Ratio </a> </li>
        <li><a href="<?php echo Url::to(['site/application']);?>">Application</a> </li>  
        <li><a href="#" onclick="myFunction()" >SJT</a></li>
 
    </ul>
    		<div id="demo1"></div>
            
    	    <br clear="all">
    </div>-->
    <div class="col-md-9">
    <div class="welocme_content">
    	<?= $content->title?>
        <?= $content->content?>
    </div>
    </div>
    </div>