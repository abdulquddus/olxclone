<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Messages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="messages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ad_id')->textInput() ?>

    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'from')->textInput() ?>

    <?= $form->field($model, 'to')->textInput() ?>

    <?= $form->field($model, 'from_viewed')->textInput() ?>

    <?= $form->field($model, 'to_viewed')->textInput() ?>

    <?= $form->field($model, 'from_deleted')->textInput() ?>

    <?= $form->field($model, 'to_deleted')->textInput() ?>

    <?= $form->field($model, 'from_vdate')->textInput() ?>

    <?= $form->field($model, 'to_vdate')->textInput() ?>

    <?= $form->field($model, 'from_ddate')->textInput() ?>

    <?= $form->field($model, 'to_ddate')->textInput() ?>

    <?= $form->field($model, 'created')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
