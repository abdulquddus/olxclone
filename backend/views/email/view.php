<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Email */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Emails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
       
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'system_title',
            'title',
            'content',
            //'status',
            [
            'label' => 'Status',
            $status = \backend\models\Email::find()->where(['status'=>$model->status])->one(),
            'value' => $status->status == 1 ? 'Activate' : 'Deactivate',
            ],
            
        ],
    ]) ?>

</div>
