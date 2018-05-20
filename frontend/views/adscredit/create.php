<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\AdsCredit */

$this->title = Yii::t('app', 'Create Ads Credit');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ads Credits'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ads-credit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
