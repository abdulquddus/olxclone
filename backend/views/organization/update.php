<?php
use yii\helpers\Html;
$this->title ='Institute Setup'   . ' : ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Configuration'), 'url'=>['/default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Update Institute Setup')];
?>

<div class="col-sm-12 col-xs-12">
	<h2 class="page-header edusec-page-header-btn"><i class="fa fa-edit"></i> <?php echo 'Update Institute Setup' ?>
		<div class="pull-right"><?= Html::a('Back', ['index'], ['class' => 'btn btn-back']) ?></div>
	</h2>
</div>

<div class="organization-update">
	<?= $this->render('_form', [
		'model' => $model,
	]) ?>
</div>

