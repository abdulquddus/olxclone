<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FilterName */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Filter Names', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filter-name-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'filter_name',
            'filter_description',
            //'parent_filter',            
            [
            'label' => 'Parent ID',
            $FilterName = \backend\models\FilterName::find()->where(['parent_filter'=>$model->parent_filter])->one(),
            $parent_filter_name = \backend\models\FilterName::find()->where(['parent_filter'=>$model->parent_filter])->one(),
            'value' => $FilterName->parent_filter == '0' ? 'Parent Category' : $parent_filter_name->filter_name,
            ],
            
            'filter_value',
            'display_for_adpost_page',
            'display_for_screen_page',
            
            [
            'label' => 'Status',
            $status = \backend\models\FilterName::find()->where(['status'=>$model->status])->one(),
            'value' => $status->status == 1 ? 'Activate' : 'Deactivate',
            ],
        ],
    ]) ?>

</div>
