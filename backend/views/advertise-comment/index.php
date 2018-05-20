<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\DataColumn;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AdvertiseCommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Advertise Comments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertise-comment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Advertise Comment'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'advertise_id',

            [
                'class' => DataColumn::className(),
                'attribute' => 'advertise_id',
                'format' => 'text',
                'value' => function($model, $index, $column) {
                   $AdvertComment = \backend\models\AdvertiseComment::find()->where(['advertise_id'=>$model->advertise_id])->one();
                    return $AdvertComment? $AdvertComment->title : 'Unknown';
                },
                'label' => 'Advertise ID',
            ],


            'title',
            'author_name',
            // 'author_email:email',
            // 'body:ntext',
            // 'enabled',
            // 'status',
            // 'mark_spam',
            'create_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
