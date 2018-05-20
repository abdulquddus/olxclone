<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CommercialAds */

$this->title = 'Create Commercial Ads';
$this->params['breadcrumbs'][] = ['label' => 'Commercial Ads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="commercial-ads-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
