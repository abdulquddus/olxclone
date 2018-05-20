<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CommercialSearchAds */

$this->title = 'Create Commercial Search Ads';
$this->params['breadcrumbs'][] = ['label' => 'Commercial Search Ads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="commercial-search-ads-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
