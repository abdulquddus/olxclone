<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\DataColumn;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategoryAdditionalFieldsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Category Additional Fields');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-additional-fields-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Category Additional Fields'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'category_id',

            [
                'class' => DataColumn::className(),
                'attribute' => 'category_id',
                'format' => 'text',
                'value' => function($model, $index, $column) {
                   $category = \backend\models\Category::find()->where(['id'=>$model->category_id])->one();
                    return $category? $category->title : 'Unknown';
                },
                'label' => 'Category Name',
            ],
                        
            //'optional_field_id',
                        
            [
                'class' => DataColumn::className(),
                'attribute' => 'optional_field_id',
                'format' => 'text',
                'value' => function($model, $index, $column) {
                   $category_optinal = \backend\models\OptionalFields::find()->where(['id'=>$model->optional_field_id])->one();
                    return $category_optinal? $category_optinal->titles : 'Unknown';
                },
                'label' => 'Category Name',
            ],
                        
                        
                        

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
