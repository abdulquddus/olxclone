<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\DataColumn;
use leandrogehlen\treegrid\TreeGrid;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>

        <?= Html::a(Yii::t('app', 'Create Category'), ['create'], ['class' => 'btn btn-success']) ?>
        
    </p>

    <?php // GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'id',
//            'title',
//            //'image',
//            'description',
//            //'parent_id',
//
////            [
////                'class' => DataColumn::className(),
////                'attribute' => 'parent_id',
////                'format' => 'text',
////                'value' => function($model, $index, $column) {
////                   $category = \backend\models\Category::find()->where(['id'=>$model->parent_id])->one();
////                    return $category? $category->title : 'Parent Category';
////                },
////                'label' => 'Sub-Category',
////            ],
//                        
////                        [
////                            'attribute' => 'parent',
////                            'value' => 'parent.title'
////                            ],
//
//           [
//            'attribute'=>'Status',
//            'header'=>'Status',
//            'filter' => [1=>'Active', 0=>'Deactive'],
//            'format'=>'raw',    
//            'value' => function($model, $key, $index)
//            {   
//                if($model->status == 1)
//                {
//                    return '<button class="btn green">Active</button>';
//                }
//                else
//                {   
//                    return '<button class="btn red">Deactive</button>';
//                }
//            },
//        ],
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],
//    ]); 
    
//    print_r($cate);
    
   
// $list = $category->cat_find(5);
// foreach($list as $item ){
//     echo $item->id."<br />";
// }
    
    ?>
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
       foreach($cate as $data){?>
    <li class="li" id="<?= $data->id?>">
        <a href="<?= Url::to(['category/view', 'id' => $data->id]); ?>"><?= $data->title?></a><?php echo $category->check_child($data->id); ?> 
               <ul class="drop <?= $data->id?>">
            <?php $list1 = $category->cat_find($data->id);
                   foreach($list1 as $item1 ){ ?>
                   <li id="<?= $item1->id?>" class="sub  " ><a  href="<?= Url::to(['category/view', 'id' => $item1->id]); ?>"> <?= $item1->title;?></a><?php echo $category->check_child($item1->id); ?> 
                       <ul class="drop <?= $item1->id?>">
            <?php $list2 = $category->cat_find($item1->id);
                   foreach($list2 as $item2 ){ ?>
                   <li class="" id="<?= $item2->id?>"><a href="<?= Url::to(['category/view', 'id' => $item2->id]); ?>"> <?= $item2->title;?></a><?php echo $category->check_child($item2->id); ?> 
                    <ul class="drop <?= $item2->id?>">
                   <?php $list3 = $category->cat_find($item2->id);
                   foreach($list3 as $item3 ){ ?>
                   <li class="" id="<?= $item3->id?>"><a href="<?= Url::to(['category/view', 'id' => $item3->id]); ?>"> <?= $item3->title;?></a><?php echo $category->check_child($item3->id); ?> </li>
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