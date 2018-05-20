<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PromotionDealsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Promotion Deals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promotion-deals-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);
    echo "</br>"; ?>

    <p>
        <?php // Html::a('Create Promotion Deals', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'key',
            'title',
            'content:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
