<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Category;

/* @var $this yii\web\View */
/* @var $model backend\models\CommercialAds */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Commercial Ads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="commercial-ads-view">

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
            'name',
            'url:url',
//            'category_id',
            [
                'label' => 'Category ID',
                $Category = \backend\models\Category::find()->where(['id'=>$model->category_id])->one(),
                $Category_name = \backend\models\Category::find()->where(['id'=>$model->category_id])->one(),
//                'value' => $Category->id == '0' ? 'Parent Category' : $Category_name->title,
                'value' => $Category['id']==0 ? 'Parent Category' : $Category_name->title,
            ],




            //'top_ad',
            [
                'label' => 'Top-Ad Image',
                'attribute'=>'top_ad',
                $image_trim_name = str_replace(' ', '_', $model->top_ad),
                'value'=> Yii::$app->request->BaseUrl.'/uploads/'.$image_trim_name,
                'format' => ['image',['width'=>'180']],
            ],
            'top_ad_url',
            
            //'left_ad',
            [
                'label' => 'Left-Ad Image',
                'attribute'=>'left_ad',
                $image_trim_name = str_replace(' ', '_', $model->left_ad),
                'value'=> Yii::$app->request->BaseUrl.'/uploads/'.$image_trim_name,
                'format' => ['image',['width'=>'180']],
            ],
            'left_ad_url',

            //'right_ad',
            [
                'label' => 'Right-Ad Image',
                'attribute'=>'right_ad',
                $image_trim_name = str_replace(' ', '_', $model->right_ad),
                'value'=> Yii::$app->request->BaseUrl.'/uploads/'. $image_trim_name,
                'format' => ['image',['width'=>'180']],
            ],
            'right_ad_url',

            //'centre_ad',
            [
                'label' => 'Centre Image',
                'attribute'=>'centre_ad',
                $image_trim_name = str_replace(' ', '_', $model->centre_ad),
                'value'=> Yii::$app->request->BaseUrl.'/uploads/'.$image_trim_name,
                'format' => ['image',['width'=>'180']],
            ],
            'centre_ad_url',

            //'bottom_ad',
            [
                'label' => 'Bottom Image',
                'attribute'=>'bottom_ad',
                $image_trim_name = str_replace(' ', '_', $model->bottom_ad),
                'value'=> Yii::$app->request->BaseUrl.'/uploads/'.$image_trim_name,
                'format' => ['image',['width'=>'180']],
            ],
            'bottom_ad_url',

//            [
//                'label' => 'Status',
//                $status = \backend\models\CommercialAds::find()->where(['status'=>$model->status])->one(),
//                'value' => $status->status == 1 ? 'Activate' : 'Deactivate',
//            ],

        ],
    ]) ?>

</div>
