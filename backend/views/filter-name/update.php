<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FilterName */

$this->title = 'Update Filter Name: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Filter Names', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="filter-name-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
