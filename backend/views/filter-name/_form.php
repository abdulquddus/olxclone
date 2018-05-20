<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\FilterName;


/* @var $this yii\web\View */
/* @var $model backend\models\FilterName */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="filter-name-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'filter_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'filter_description')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'parent_filter')->textInput() ?>
    
    <?php $FilterName=FilterName::find()->all();
    $listData=ArrayHelper::map($FilterName, 'id', 'filter_value');
    echo $form->field($model, 'parent_filter')->dropDownList(
        $listData,
        ['prompt'=>'Parent Filter'])->label('Select Parent Filter');
    ?> 
    
    <?= $form->field($model, 'filter_value')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'display_for_adpost_page')->dropDownList(['1' => 'Dropdown - ID1', '2' => 'Chcekbox - ID2', '3' => 'Textbox - Numbers- ID3', '4' => 'Textbox - Value - ID4', '5' => 'Range - ID5', '6' => 'DatePicker - ID6'], ['onchange'=>'custom_validation()']);  ?>
    
    <?= $form->field($model, 'display_for_screen_page')->dropDownList(['0' => 'None', '1' => 'Dropdown - ID1', '2' => 'Chcekbox - ID2', '3' => 'Textbox - Numbers- ID3', '4' => 'Textbox - Value - ID4', '5' => 'Range - ID5', '6' => 'DatePicker - ID6'], ['onchange'=>'custom_validation()']);  ?>

    <?php echo $form->field($model, 'status')->dropDownList(['1' => 'Activate', '0' => 'Deactivate']); ?>
    
    <?php echo $form->field($model, 'search_display')->dropDownList(['1' => 'On', '0' => 'Off']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
