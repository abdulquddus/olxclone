<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// $adid = $_GET['id'];
// $userid = YII::$app->user->id;
?>


<main>
   <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 login-wrap">
      <div class="container">
        <section id="ad-view">
                <div class="well display bgfff ptop0">
                    <div class="row">
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <h3>
                                <?= $model->advertise_title;?></h3>
                            <p>
                                For sale by <b><?= $model->contact_name; ?></b><?= Yii::$app->formatter->asDatetime($model->created_date)?>, <?= $model->state_id ?>,<?=  $model->city_id; ?> </p>
                            <div id="slider1_container" style="position: relative; top: 0px; left: 0px; min-width: 610px;max-width:610px;width:800px;
                                height: 456px; background: #191919; overflow: hidden;">
                                <!-- Loading Screen -->
                                <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                                    <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;
                                        background-color: #000000; top: 0px; left: 0px; width: 100%; height: 100%;">
                                    </div>
                                    <div style="position: absolute; display: block; background: url(template/img/loading.gif) no-repeat center center;
                                        top: 0px; left: 0px; width: 74%; height: 100%;">
                                    </div>
                                </div>
                                <!-- Slides Container -->
                                <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 800px;
                                    height: 356px; overflow: hidden;">
                                    <?php print_r($model) ?>
                                    <?php  foreach($model->imageFiles as $img){?>
                                    <div>
                                        <img u="image" src="<?= $img->image ?>" />
                                        <img u="thumb" src="<?= $img->image ?>" />
                                    </div>
                                    <?php  }?>
                                </div>
                                <!-- Arrow Left -->
                                <span u="arrowleft" class="jssora05l" style="top: 158px; left: 8px;"></span>
                                <!-- Arrow Right -->
                                <span u="arrowright" class="jssora05r" style="top: 158px; right: -162px"></span>
                                <!-- thumbnail navigator container -->
                                <div u="thumbnavigator" class="jssort01" style="left: 0px; bottom: 0px;">
                                    <!-- Thumbnail Item Skin Begin -->
                                    <div u="slides" style="cursor: default;">
                                        <div u="prototype" class="p">
                                            <div class="w">
                                                <div u="thumbnailtemplate" class="t">
                                                </div>
                                            </div>
                                            <div class="c">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Thumbnail Item Skin End -->
                                </div>
                                <!--#endregion Thumbnail Navigator Skin End -->
                            </div>
                            <br clear="all" />
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-12 ad-description wow fadeInDown">
                                    <h4>
                                        Highlight</h4>
                                    <p>
                                        <?= $model->description; ?>
                                        <br clear="all" />
                                        
                                    </p>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 address">
                                    <h5>
                                        Address:</h5>
                                    <p>
                                        <?= $model->address; ?>
                                    </p>
                                    <?php // foreach($additional as $addi){ ?>
                                    <p>
                                        <b><?php // echo   $ads->name($addi->field_id); ?> :</b> <?php //echo $addi->values; ?></p>
                                    <?php // } 
                                    
                                    ?>
                                    
                                    <p class="fav">
                                        <img src="template/img/fav.png" title="fav" alt="fav" style="margin-top: -3px" />Save
                                        ad as Favorite</p>
                                    <p class="report">
                                        <img src="template/img/report.png" title="fav" alt="fav" style="margin-top: -3px" />Report
                                        this ad</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12 mtop58">
                            <div class="blue-box wow fadeInDown">
                                <span>Kr</span>
                                <label>
                                    <?= $model->price; ?></label>
                            </div>
                            <div class="blue-box mtop0 wow fadeInDown">
                                <span>Seller</span>
                                <div class="user-text">
                                    <img src="<?php echo Yii::getAlias('@web') ?>/design/img/user-img.png" alt="..." title="..." /><?= $model->contact_name; ?></div>
                                <div class="user-text">
                                    <img src="<?php echo Yii::getAlias('@web') ?>/design/img/call-icon.png" alt="..." title="..." /><?= $model->mobile_number; ?></div>
                            </div>
                          <?php if(yii::$app->user->id && ($model->user_id != yii::$app->user->id )) {?>
                            <div class="blue-box mtop0 wow fadeInDown">
                                <span>Send Message to Seller</span>
                                <div class="text-center" id="">
                                    <textarea id="msg" name="msg" rows="4" style="width: 100%;"></textarea>
                                    
                                    <a class="btn btn-primary" id="submit" onclick="msg('<?php // $adid ?>')" type="submit" name="submit" >
                                        
                                        Send</a>
                                </div>
     
                            </div>
                          <?php } ?>
                            <div class="blue-box mtop0 wow fadeInDown">
                                <p style="font-size: 14px;">
                                    Promote This Ad</p>
                                <b>Top ad</b>
                                <p>
                                    Get 10 times more view by displaying your ad at the top! <a href="#">Learn more</a></p>
                                <b>Daily Bump Up</b>
                                <p>
                                    Get a fresh start every day and gain 5 times more views! <a href="#">Learn more</a></p>
                                <div class="text-center">
                                    <a class="btn hvr-shutter-out-vertical font14" href="#">
                                        <img alt="promote" src="template/img/promote.png" style="margin-top: -3px;" title="promote">
                                        Promote this ad</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
			<div class="col-md-12 col-sm-12 cl-xs-12" style="border:1px solid #ccc">
			<div id="" class="selectedcat-box">
            <div class="image-box"></div>
            <h3>Lorem ipsum dolor sit amet</h3>
            <b>1,33,256 Ads</b>
            <a href="">view all ads &gt;&gt;</a>
          </div>
		  <div id="" class="selectedcat-box">
            <div class="image-box"></div>
            <h3>Lorem ipsum dolor sit amet</h3>
            <b>1,33,256 Ads</b>
            <a href="">view all ads &gt;&gt;</a>
          </div>
		  <div id="" class="selectedcat-box">
            <div class="image-box"></div>
            <h3>Lorem ipsum dolor sit amet</h3>
            <b>1,33,256 Ads</b>
            <a href="">view all ads &gt;&gt;</a>
          </div>
		  <div id="" class="selectedcat-box">
            <div class="image-box"></div>
            <h3>Lorem ipsum dolor sit amet</h3>
            <b>1,33,256 Ads</b>
            <a href="">view all ads &gt;&gt;</a>
          </div>
			</div>
      </div>
      <!-- /container-->
   </section>
   
<!-- Ads Boxes -->
<!--  <div class="ads-vr ads-vr-left">Space Available For Ad</div>
  <div class="ads-vr ads-vr-right">Space Available For Ad</div>-->
<!-- /Ads Boxes -->
</main>


<script type="text/javascript">
function msg(id)
            { 
   //alert(id);
    var msg = document.getElementById("msg").value;
    
    
    $.ajax({
      type: "GET",
      url: "<?php  echo Yii::$app->getUrlManager()->createUrl('advertisement/submitmsg'); ?>",
      data: { msg: msg, id:id },
                          
       success: function(data){
      // alert(data);
//       document.getElementById("danger"+id).innerHTML =data ;
      }
    });
    }
</script>