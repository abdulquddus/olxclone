<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
//use kartik\file\FileInput;
use backend\models\advertisement;


/* @var $this yii\web\View */
/* @var $model backend\models\Images */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="images-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php // $form->field($model, 'advertise_id')->textInput() ?>

    <?php $advert=advertisement::find()->all();
    $listData=ArrayHelper::map($advert, 'id', 'advertise_title');
    echo $form->field($model, 'advertise_id')->dropDownList(
        $listData,
        ['prompt'=>'Select Advertise ID'])->label('Advertise ID');

    ?>

    <?= $form->field($model, 'image')->fileInput();
// Kartik plugin
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
