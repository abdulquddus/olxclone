<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->alias;
$this->params['breadcrumbs'][] = ['label' => 'Configuration', 'url' => ['/default/index']];
$this->params['breadcrumbs'][] = ['label' =>  'Institute Setup', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xs-12">
  <div class="col-lg-8 col-sm-8 col-xs-12 no-padding"><h3 class="box-title"><i class="fa fa-search"></i> <?php echo 'View Institute Setup Details' ?></h3></div>
  <div class="col-lg-4 col-sm-4 col-xs-12 no-padding" style="padding-top: 20px !important;">
	<div class="col-xs-4 left-padding">
    
	</div>
	<div class="col-xs-4 ">
       
	</div>
	<div class="col-xs-4 ">
         <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
	</div>
   </div>
</div>

<div class="col-xs-12">
 <div class="box box-primary view-item">
  <div class="organization-view">
    <?= DetailView::widget([
        'model' => $model,
	'options'=>['class'=>'table  detail-view'],
        'attributes' => [
            'name',
            'alias',
            'address_line1',
            'address_line2',
            'phone',
            'email:email',
            'website',
	    
	    	    [
		'attribute'=>'logo',
		'value'=>Yii::$app->urlManager->createUrl('/organization/loadimage'),	
		'format'=>['image',['width'=>'130','height'=>'70', 'alt'=>'No Image']],
            ],
        ],
    ]) ?>

</div></div></div>
