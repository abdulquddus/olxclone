<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\advertisement;

/* @var $this yii\web\View */
/* @var $model backend\models\AdvertiseComment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advertise-comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'advertise_id')->textInput() ?>

    <?php $advert=advertisement::find()->all();
    $listData=ArrayHelper::map($advert, 'id', 'advertise_title');
    echo $form->field($model, 'advertise_id')->dropDownList(
        $listData,
        ['prompt'=>'Select Advertise ID'])->label('Advertise ID');

    ?>

    <?= $form->field($model, 'create_at')->hiddenInput(['value' => date('Y-m-d H:i:s')])->label(false) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?php // $form->field($model, 'enabled')->textInput() ?>

    <?php echo $form->field($model, 'enabled')->dropDownList(['1' => 'Yes', '0' => 'No']); ?>

    <?php // $form->field($model, 'status')->textInput() ?>

    <?php echo $form->field($model, 'status')->dropDownList(['1' => 'Activate', '0' => 'Deactivate']); ?>

    <?php // $form->field($model, 'mark_spam')->textInput() ?>

    <?php echo $form->field($model, 'mark_spam')->dropDownList(['1' => 'Yes', '0' => 'No']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
