<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CategoryAdditionalFields */

$this->title = Yii::t('app', 'Create Category Additional Fields');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Category Additional Fields'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-additional-fields-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
