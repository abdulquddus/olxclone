<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FilterName */

$this->title = 'Create Filter Name';
$this->params['breadcrumbs'][] = ['label' => 'Filter Names', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filter-name-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
