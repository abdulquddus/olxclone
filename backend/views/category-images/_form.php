<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Category;
//use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\models\CategoryImages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-images-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php // $form->field($model, 'category_id')->textInput() ?>

    <?php $category=Category::find()->all();
    $listData=ArrayHelper::map($category, 'id', 'title');
    echo $form->field($model, 'category_id')->dropDownList(
        $listData,
        ['prompt'=>'Select Category'])->label('Parent Category');

    ?>

    <?php // $form->field($model, 'image')->fileInput()
    
    ### The below code get the create/update parameter from URL and 
    ##apply if/elseif condition to display image on view and update screen
    
    $url = $_GET['r'];    
    if($url == 'category-images/create'){
        echo $form->field($model, 'image')->fileInput();
    }
    elseif ($url == 'category-images/update'){
        echo '<img width="180" src= ' . Yii::$app->request->baseUrl.'/uploads/'.$model->image . '>';
        echo $form->field($model, 'image')->fileInput();    
    }
    
    ?> 

    <?php 
//    echo '<label class="control-label">Add Attachments</label>';
//    echo FileInput::widget([
//    'model' => $model,
//    'attribute' => 'image',
//    'options' => ['multiple' => false]
//
//    ]);

    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
