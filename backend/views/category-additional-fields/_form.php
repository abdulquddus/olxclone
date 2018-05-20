<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Category;

/* @var $this yii\web\View */
/* @var $model backend\models\CategoryAdditionalFields */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-additional-fields-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'category_id')->textInput() ?>

    <?php $categories=Category::find()->all();
    $listData=ArrayHelper::map($categories, 'id', 'title');
    echo $form->field($model, 'category_id')->dropDownList(
        $listData,
        ['prompt'=>'Category ID'])->label('Select Category ID');

    ?>

    <?= $form->field($model, 'optional_field_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>