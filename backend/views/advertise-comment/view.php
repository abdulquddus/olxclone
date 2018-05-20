<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AdvertiseComment */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Advertise Comments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertise-comment-view">

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
            //'advertise_id',    

            [                      // the owner name of the model
            'label' => 'Advertise ID',
            $user = \backend\models\Advertisement::find()->where(['id'=>$model->advertise_id])->one(),
            'value' => $user->advertise_title,
            ],

            'title',
            'author_name',
            'author_email:email',
            'body:ntext',

            //'enabled',
            [
            'label' => 'Enabled',
            $enabled = \backend\models\AdvertiseComment::find()->where(['enabled'=>$model->enabled])->one(),
            'value' => $enabled->enabled == 1 ? 'Activate' : 'Deactivate',
            ],

            //'status',
            [
            'label' => 'Status',
            $status = \backend\models\AdvertiseComment::find()->where(['status'=>$model->status])->one(),
            'value' => $status->status == 1 ? 'Activate' : 'Deactivate',
            ],

            //'mark_spam',
            [
            'label' => 'Mark Spam',
            $mark_spam = \backend\models\AdvertiseComment::find()->where(['mark_spam'=>$model->mark_spam])->one(),
            'value' => $mark_spam->mark_spam == 1 ? 'Activate' : 'Deactivate',
            ],

            'create_at',
        ],
    ]) ?>

</div>
