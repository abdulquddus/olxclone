<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CommercialAdsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Commercial Ads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="commercial-ads-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Commercial Ads', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'url:url',
            //'category_id:category_id',
            //'top_ad',
            //'left_ad',
            // 'right_ad',
            // 'centre_ad',
            // 'bottom_ad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
