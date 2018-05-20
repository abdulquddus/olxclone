<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model backend\models\Newsletter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="newsletter-form">

    <?php $form = ActiveForm::begin(); ?>
<!------
    <?php// $form->field($model, 'letter_content')->textInput(['maxlength' => true]) ?>
------->
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'letter_content')->widget(CKEditor::className(), [
        'options' => ['rows' => 12],
        'preset' => 'basic'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
