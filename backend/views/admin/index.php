<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\DataColumn;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Admins');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Admin'), ['site/signup'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            //'name',
            //'auth_key',
            //'password_hash',
            // 'password_reset_token',
            // 'email:email',
            // 'mobile',
            // 'sms_verify',
            // 'state',
            // 'status',
           //  'role',
            [
            'attribute'=>'role',
            'header'=>'Role',
            'filter' => [10=>'User', 20=>'Moderator', 30=>'Admin'],
            'format'=>'raw',    
            'value' => function($model, $key, $index)
            {   
                if($model->role == 10)
                {
                    return '<button class="btn green">User</button>';
                }
                elseif($model->role == 20)
                {   
                    return '<button class="btn red">Moderator</button>';
                }
                elseif($model->role == 30)
                {   
                    return '<button class="btn red">Admin</button>';
                }
            },
        ],
            
           [
            'attribute'=>'Status',
            'header'=>'Status',
            'filter' => [1=>'Active', 0=>'Deactive'],
            'format'=>'raw',    
            'value' => function($model, $key, $index)
            {   
                if($model->status == 1)
                {
                    return '<button class="btn green">Active</button>';
                }
                else
                {   
                    return '<button class="btn red">Deactive</button>';
                }
            },
        ],
            // 'is_company',
            // 'created_at',
            // 'updated_at',

           ['class' => 'yii\grid\ActionColumn','template'=>'{update}{view}{delete}{password-change}','buttons'=>['password-change' => function ($url,$model,$key) { return Html::a('<span class="fa fa-user-secret"></span>',['/admin/change-password','id'=>$model->id]);}]],
        ],
    ]); ?>

</div>
