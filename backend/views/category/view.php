<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description',
            //'image',
            //'parent_id',            

//            [
//            'label' => 'Parent ID',
//            $Category = \backend\models\Category::find()->where(['parent_id'=>$model->parent_id])->one(),
//            $Category_name = \backend\models\Category::find()->where(['id'=>$model->parent_id])->one(),
//            'value' => $Category->parent_id == '0' ? 'Parent Category' : $Category_name->title,
//            ],
//            
            [
            'label' => 'Status',
            $status = \backend\models\Category::find()->where(['status'=>$model->status])->one(),
            'value' => $status->status == 1 ? 'Activate' : 'Deactivate',
            ],
            
            [
                'label' => 'Category Image',
                'attribute'=>'image',
                'value'=> Yii::$app->request->BaseUrl.'/uploads/'.$model->image,
                'format' => ['image',['width'=>'180']],
            ],

            //'status',

            
        ],
    ]) ?>

    <!--
        <img src="<?//= Yii::$app->request->baseUrl ?>/uploads/58154760bg_1.png">
    -->
    
</div>
