<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CommercialSearchAds */

$this->title = 'Update Commercial Search Ads: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Commercial Search Ads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="commercial-search-ads-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
