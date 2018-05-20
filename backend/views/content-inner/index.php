<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ContentInnerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Content Inners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-inner-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Content Inner', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
   <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'system_title',
            'title',
            'content',
            'status',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
