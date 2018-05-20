<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Category;

/* @var $this yii\web\View */
/* @var $model backend\models\CommercialSearchAds */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="commercial-search-ads-form">

   <?php $form = ActiveForm::begin([
			'id' => 'commercial-search-ads-form',
			'options' => ['enctype' => 'multipart/form-data'],
			//'enableAjaxValidation' => true,
			
    ]); ?>

    <?php $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

   <?php $category=Category::find()->all();
    $listData=ArrayHelper::map($category, 'id', 'title');
    echo $form->field($model, 'category_id')->dropDownList(
        $listData,
        ['prompt'=>'Parent Category'])->label('Select Category');
    //['prompt' => ])->['label' => 'Please Choose', 'class' => 'drop-down-prompt', 'value' => '-1'];

    ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    
   <?= $form->field($model, 'image',['inputOptions'=>[ 'class'=>'','placeholder'=>'Image'] ])->fileInput()->label() ?>
    
     <?php if(isset($model->logo)) {
			echo Html::img(\Yii::$app->urlManager->createUrl('/commercial-search-ads/loadimage'),array('width'=>60,'height'=>60,'alt'=>'No Image'));
		  }
	    ?>

    <?= $form->field($model, 'notes')->textInput() ?>
    
    <?= $form->field($model, 'status')->dropDownList(['1' => 'Activate', '0' => 'Deactivate']); ?>


    <?php // $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
