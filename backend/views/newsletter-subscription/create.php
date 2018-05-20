<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\NewsletterSubscription */

$this->title = 'Create Newsletter Subscription';
$this->params['breadcrumbs'][] = ['label' => 'Newsletter Subscriptions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newsletter-subscription-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
