<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\DataColumn;
use leandrogehlen\treegrid\TreeGrid;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'filter-details');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   

   
    <table>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
    </table>
    
    
    
    
<ul id="menu">
    <?php
       foreach($filters as $data){?>
    <li class="li" id="<?= $data->id?>">
        <a href="<?= Url::to(['filter-name/view', 'id' => $data->id]); ?>"><?= $data->filter_value?></a><?php echo $category->check_child($data->id); ?> 
               <ul class="drop <?= $data->id?>">
            <?php $list1 = $category->cat_find($data->id);
                   foreach($list1 as $item1 ){ ?>
                   <li id="<?= $item1->id?>" class="sub  " ><a  href="<?= Url::to(['filter-name/view', 'id' => $item1->id]); ?>"> <?= $item1->filter_value;?></a><?php echo $category->check_child($item1->id); ?> 
                       <ul class="drop <?= $item1->id?>">
            <?php $list2 = $category->cat_find($item1->id);
                   foreach($list2 as $item2 ){ ?>
                   <li class="" id="<?= $item2->id?>"><a href="<?= Url::to(['filter-name/view', 'id' => $item2->id]); ?>"> <?= $item2->filter_value;?></a><?php echo $category->check_child($item2->id); ?> 
                    <ul class="drop <?= $item2->id?>">
                   <?php $list3 = $category->cat_find($item2->id);
                   foreach($list3 as $item3 ){ ?>
                   <li class="" id="<?= $item3->id?>"><a href="<?= Url::to(['filter-name/view', 'id' => $item3->id]); ?>"> <?= $item3->filter_value;?></a><?php echo $category->check_child($item3->id); ?> </li>
                    <?php }?>
                   </ul>
                   </li>
                    <?php }?>
               </ul>
                       </a></li>
                    <?php }?>
               </ul></a></li>
                <?php               } 
    ?>
    
</ul>
   
 

    
    
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
//$(document).ready(function(){ 
//    $('ul#menu li').children('ul').hide();
// $('ul#menu li').hover(function(){
//     $(this).children('ul').slideDown(200);
//}, function(){
//     $(this).children('ul').slideUp(200);
//});
//});



$(document).ready(function(){ 
    $('ul#menu li').children('ul').hide();
    
   
 $('li').click(function(e){
     
     var id = $(this).attr("id");
////     alert(id);
//     $('.'+id).toggle();
//     e.stopPropagation();
    if ($('.'+id).is(':hidden')) {
        e.stopPropagation();
        $('[data-element="'+id+'"]').removeClass("glyphicon-chevron-right");
        $('[data-element="'+id+'"]').addClass("glyphicon-chevron-down");
        
//         var state = "closed";
        $('.'+id).delay(200).slideDown();
       
	} else {
             e.stopPropagation();
              $('[data-element="'+id+'"]').removeClass("glyphicon-chevron-down");
        $('[data-element="'+id+'"]').addClass("glyphicon-chevron-right");
//	var state = "open";
           $('.'+id).delay(200).slideUp();
        
	}

    
});
 
 
});

   
</script>