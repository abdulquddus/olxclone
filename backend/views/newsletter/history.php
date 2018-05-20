<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NewsletterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Newsletters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newsletter-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_form1', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Newsletter', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
             ['label' => 'Newsletter Name',
               'attribute' => 'name',
//               'format' => ['decimal', 2],
             ],
             ['label' => 'Sended Date',
               'attribute' => 'date',
//               'format' => ['decimal', 2],
             ],
           
            ],
    ]); ?>
 
</div>
