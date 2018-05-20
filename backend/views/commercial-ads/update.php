<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CommercialAds */

$this->title = 'Update Commercial Ads: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Commercial Ads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="commercial-ads-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
