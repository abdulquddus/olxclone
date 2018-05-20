<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PromotionDeals */

$this->title = 'Update Promotion Deals: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Promotion Deals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="promotion-deals-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
