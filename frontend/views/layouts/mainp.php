<?php 
use yii\helpers\Html;
 use yii\grid\GridView;
?>
 <?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?= Html::csrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  
<!--		<title>Invoice</title>-->
		<link rel="stylesheet" href="<?php echo Yii::getAlias('@web') ?>/design/css/style.css">
		<link rel="license" href="http://www.opensource.org/licenses/mit-license/">
		<script src="<?php //echo Yii::getAlias('@web') ?>/design/js/script.js"></script>
	<?php $this->head() ?>
        </head>
	<body>
            <?php $this->beginBody() ?>
            
		<header>
			<h1>Invoice</h1>
			<address contenteditable>
				<p>Jonathan Neal</p>
				<p>101 E. Chzzapman Ave<br>Orange, CA 92866</p>
				<p>(800) 555-1234</p>
			</address>
			<span><img align="right" alt="" src="<?php echo Yii::getAlias('@web') ?>/design/img/logo.png"><input type="file" accept="image/*"></span>
		</header>
    <?= $content ?>
   <aside>
			<h1><span>Additional Notes</span></h1>
			<div contenteditable>
				<p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
			</div>
		</aside>
             <?php $this->endBody() ?>
	</body>
</html>
 <?php $this->endPage() ?>
