<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\DataColumn;
use backend\models\Country;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cities');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create City'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'region_id',
            'name',
            'slug',
            //'country_code',

            [
                'class' => DataColumn::className(),
                'attribute' => 'country_code',
                'format' => 'text',
                'value' => function($model, $index, $column) {
                   $region_code = \backend\models\Country::find()->where(['id'=>$model->country_code])->one();
                    return $region_code? $region_code->code : 'Unknown';
                },
                'label' => 'Country Code',
            ],
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
