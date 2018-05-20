<?php 
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::t('app', 'Admin Dashboard'); 
$this->params['breadcrumbs'][] = $this->title;
?>
<script>
$(document).ready(function(){
    $('.tab-content').slimScroll({
        height: '300px'
    });
});
$(document).ready(function(){
    $('#coursList').slimScroll({
        height: '250px'
    });
});
</script>
<style>
.tab-content {
   padding:15px;
}
.box .box-body .fc-widget-header {
    background: none;
}
.popover{
    max-width:450px;   
}
</style>

<?php
$this->registerJs(
"$(function() {
	$('.noticeModalLink').click(function() {
		$('#NoticeModal').modal('show')
		.find('#NoticeModalContent')
		.load($(this).attr('data-value'));
	});
});");

$this->registerJs(
"$('body').on('click', function (e) {
    $('[data-toggle=\"popover\"]').each(function () {
        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
            $(this).popover('hide'); 
        }
    });
});"
)
?>

<?php
	yii\bootstrap\Modal::begin([
	    'header' => '<h4><i class="fa fa-eye"></i> '.Yii::t('app', 'View Notice Details').'</h4>',
	    'id'=>'NoticeModal',
	]);
	echo '<div id="NoticeModalContent"></div>';
	yii\bootstrap\Modal::end();
?>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
		

                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                      <?= \frontend\models\User::find()->where(['status' => 0])->count(); ?>
                                    </h3>
                                    <p>
                                        <?php echo Yii::t('app', 'Users Pending for Approval') ?>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
								<?= Html::a(Yii::t('app', 'More info').' <i class="fa fa-arrow-circle-right"></i>', ['/user/index'], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                       <?= \frontend\models\User::find()->where(['status' => 10])->count(); ?>
                                    </h3>
                                    <p>
                                        <?php echo Yii::t('app', 'Active Users') ?>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
				<?= Html::a(Yii::t('app', 'More info').' <i class="fa fa-arrow-circle-right"></i>', ['/user/index'], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <?= backend\models\Advertisement::find()->where(['ad_status' => 1])->count(); ?>
                                    </h3>
                                    <p>
                                        <?php echo Yii::t('app', 'Active Advertisements') ?>
                                    </p>
                                    
                                </div>
                                <div class="icon">
                                    <i class="fa fa-unlock-alt"></i>
                                </div>
				<?= Html::a(Yii::t('app', 'More info').' <i class="fa fa-arrow-circle-right"></i>', ['/advertisement/index'], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        <?= frontend\models\Advertisement::find()->where(['ad_status' => 0])->count(); ?>
                                    </h3>
                                    <p>
                                        <?php echo Yii::t('app', 'Pending for Approval') ?>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-lock"></i>
                                </div>
                                <?= Html::a(Yii::t('app', 'More info').' <i class="fa fa-arrow-circle-right"></i>', ['/advertisement/index'], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->
                       
                    <!-- Main row -->
                   <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h4>
                                      <?php echo Yii::t('app', 'Advertisment') ?>
                                    </h4>
                                    
                                </div>
                                <div class="icon">
                                    <i class="fa fa-american-sign-language-interpreting" aria-hidden="true"></i>
                                </div>
				<?= Html::a(Yii::t('app', 'Advertisment').' <i class="fa fa-arrow-circle-right"></i>', ['/advertisement/index'], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                                <?= Html::a(Yii::t('app', 'Ads on search').' <i class="fa fa-arrow-circle-right"></i>', ['/commercial-search-ads/index'], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                                <?= Html::a(Yii::t('app', 'Commercial Ads').' <i class="fa fa-arrow-circle-right"></i>', ['/commercial-ads/index'], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                            </div>
                        </div><!-- ./col -->
                        
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h4>
                                      <?php echo Yii::t('app', 'Admin') ?>
                                    </h4>
                                    
                                </div>
                                <div class="icon">
                                    <i class="fa fa-american-sign-language-interpreting" aria-hidden="true"></i>
                                </div>
				<?= Html::a(Yii::t('app', 'Admins').' <i class="fa fa-arrow-circle-right"></i>', ['/admin/index'], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                                <?= Html::a(Yii::t('app', 'Users').' <i class="fa fa-arrow-circle-right"></i>', ['/user/index'], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                                <?= Html::a(Yii::t('app', 'Organizational info').' <i class="fa fa-arrow-circle-right"></i>', ['/organization/view', 'id'=>1], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                            </div>
                        </div><!-- ./col -->
                        
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h4>
                                      <?php echo Yii::t('app', 'Category') ?>
                                    </h4>
                                    
                                </div>
                                <div class="icon">
                                    <i class="fa fa-american-sign-language-interpreting" aria-hidden="true"></i>
                                </div>
				<?= Html::a(Yii::t('app', 'Category').' <i class="fa fa-arrow-circle-right"></i>', ['/category/index'], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                                
                                <?= Html::a(Yii::t('app', 'Credit Packages').' <i class="fa fa-arrow-circle-right"></i>', ['/credit-packages/index'], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                            </div>
                        </div><!-- ./col -->
                        
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h4>
                                      <?php echo Yii::t('app', 'Regions') ?>
                                    </h4>
                                    
                                </div>
                                <div class="icon">
                                    <i class="fa fa-american-sign-language-interpreting" aria-hidden="true"></i>
                                </div>
				<?= Html::a(Yii::t('app', 'Country').' <i class="fa fa-arrow-circle-right"></i>', ['/country/index'], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                                <?= Html::a(Yii::t('app', 'Regions').' <i class="fa fa-arrow-circle-right"></i>', ['/region/index'], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                                <?= Html::a(Yii::t('app', 'City').' <i class="fa fa-arrow-circle-right"></i>', ['/city/index'], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                               <?= Html::a(Yii::t('app', 'Postcods').' <i class="fa fa-arrow-circle-right"></i>', ['/postcode/index'], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                            </div>
                        </div><!-- ./col -->
                   </div>
                    
                    <div class="row">
                         <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h4>
                                      <?php echo Yii::t('app', 'Content') ?>
                                    </h4>
                                    
                                </div>
                                <div class="icon">
                                    <i class="fa fa-american-sign-language-interpreting" aria-hidden="true"></i>
                                </div>
				<?= Html::a(Yii::t('app', 'Pages and Content').' <i class="fa fa-arrow-circle-right"></i>', ['/content/index'], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                                <?= Html::a(Yii::t('app', 'Content in side page').' <i class="fa fa-arrow-circle-right"></i>', ['/content-inner/index'], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                                <?= Html::a(Yii::t('app', 'Promotion Deals').' <i class="fa fa-arrow-circle-right"></i>', ['/promotion-deals/index'], ['target' => '_blank', 'class' => 'small-box-footer']); ?>
                            </div>
                        </div><!-- ./col -->
                   </div>
                </section><!-- /.content -->

