<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\DataColumn;

/* @var $this yii\web\View */
/* @var $model backend\models\Advertisement */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Advertisements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="advertisement-view">

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
            //'user_id',

            [                      // the owner name of the model
            'label' => 'User ID',
            $user = \backend\models\User::find()->where(['id'=>$model->user_id])->one(),
            'value' => $user->username,
            ],

            //'category_id',
            [                      // the owner name of the model
            'label' => 'Category',
            $category = \backend\models\Category::find()->where(['id'=>$model->category_id])->one(),
            'value' => $category->title,
            ],
            'advertise_title',
            'description:ntext',
            'price',
            'contact_name',
            'email:email',
            'mobile_number',
            //'state_id',

            [
            'label' => 'State Name',
            $state = \backend\models\Region::find()->where(['id'=>$model->state_id])->one(),
            'value' => $state->name,
            ],

            //'city_id',
            [// city_id (City name) on detail page
            'label' => 'City Name',
            $city = \backend\models\City::find()->where(['id'=>$model->city_id])->one(),
            'value' => $city->name,
            ],
            
             //'status',+
            [
            'label' => 'Status',
            $status = \backend\models\Advertisement::find()->where(['status'=>$model->status])->one(),
            'value' => $status->status == 1 ? 'Activate' : 'Deactivate',
            ],
            //'photo_name',            
//            [
//                'label' => 'Advertisement Image',
//                'attribute'=>'photo_name',
//                'value'=> Yii::$app->request->BaseUrl.'/uploads/'.$model->photo_name,
//                'format' => ['image',['width'=>'180']],
//            ],
        ],
    ]) ?>
    
    <h5 style="margin-left: 10px;"><strong> Ad Image(s)</strong></h5>
    <?php 
    
    $ads_images_record = \backend\models\Images::find()
                ->where(['advertise_id' => $model->id])
                ->all();
        
        $ads_images_count = \backend\models\Images::find()
                ->where(['advertise_id' => $model->id])
                ->orderBy('advertise_id')
                ->count();
    
    //echo "Ad Image(s)";
    for($i=0; $i<$ads_images_count; $i++){
            echo '<img width="180" style="margin-left: 10px;" src= ../uploads/'. $model->id . '/'. $ads_images_record[$i]['image'] . '>';
//        echo $form->field($model, 'photo_name')->fileInput();    
            
        }
    ?>
    

</div>
