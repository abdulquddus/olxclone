<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CreditPackages */

$this->title = 'Create Credit Packages';
$this->params['breadcrumbs'][] = ['label' => 'Credit Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="credit-packages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
