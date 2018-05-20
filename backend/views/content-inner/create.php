<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ContentInner */

$this->title = 'Create Content Inner';
$this->params['breadcrumbs'][] = ['label' => 'Content Inners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-inner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
