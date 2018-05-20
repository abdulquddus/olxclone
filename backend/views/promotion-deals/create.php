<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PromotionDeals */

$this->title = 'Create Promotion Deals';
$this->params['breadcrumbs'][] = ['label' => 'Promotion Deals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promotion-deals-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
