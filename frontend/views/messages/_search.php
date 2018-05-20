<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MessagesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="messages-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'ad_id') ?>

    <?= $form->field($model, 'message') ?>

    <?= $form->field($model, 'from') ?>

    <?= $form->field($model, 'to') ?>

    <?php // echo $form->field($model, 'from_viewed') ?>

    <?php // echo $form->field($model, 'to_viewed') ?>

    <?php // echo $form->field($model, 'from_deleted') ?>

    <?php // echo $form->field($model, 'to_deleted') ?>

    <?php // echo $form->field($model, 'from_vdate') ?>

    <?php // echo $form->field($model, 'to_vdate') ?>

    <?php // echo $form->field($model, 'from_ddate') ?>

    <?php // echo $form->field($model, 'to_ddate') ?>

    <?php // echo $form->field($model, 'created') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
