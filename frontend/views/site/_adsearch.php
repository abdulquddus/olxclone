<?php 
use yii\helpers\html;
use yii\widgets\LinkPager;
?>

      <!--search-main-->
      
        <!--/search-main-top-->
        <!--/search-left-->
        <!--search-wide-->
        <div id="ads">
        <div  class="col-lg-9 col-md-9 col-sm-9 col-xs-12 search-wide padng_zero">
            <?php
            if(!empty($result)){
                             foreach ($search_commer as $cate) {
//print_r($cate);
//break;
//                                $img = \frontend\models\Images::findOne(['advertise_id' => $cate->id]);
                                ?>
                               <div id="" class="selectedcat-box ">
                                   <div class="col-md-4 col-sm-12 col-xs-12 mrgn_zero padng_zero extracls">
                                    <div class=" image-box">
                                        <img class="img-responsive" src="<?= Yii::$app->urlManager->createUrl('/site/loadimage'); ?>" alt="" />
                                    </div>
                                    </div>
                                    <div class="col-md-8 col-sm-12 col-xs-12 product_detail">
                                        <div class="top-detail">
                                            <span>Detail</span> 8000KM
                                        </div>
                                        <div class="top-detail pull-right">
                                            <span>Detail</span> Detail 2016 model
                                        </div>
                                        <a href="<?= $cate['url']; ?>" class="title_head"><?= $cate['title']; ?> (Commercial Ads)</a>
                                        <div class="top-detail">
                                            <span>Detail</span> Deisel  
                                        </div>
                                        <div class="top-detail">
                                            <span>Detail</span> Automatic
                                        </div>
                                        <div class="address-detail">
                                            Adress  12 p 1271 Oslo
  
                                        </div>
<!--                                        <span>Honda Civic » Parado Foxy </span>
                                        <h1>NOK: 150,0000</h1>
                                        <p>Lorem Ipsum is simply dummy text of the printing and type setting industry.</p>
                                        <span>Karachi, Pakistan </span>-->
                                       
                                    </div>
                                    <div class="productprice">
                                        Kr. 5000</div>
                                     <a href="#" class="verifyadd"></a>
                                </div>
                            <?php
                            }
            foreach($result as $cate){ 
                
                $img = \frontend\models\Images::findOne(['advertise_id'=>$cate->id]);
                
                ?>
          <div id="" class="selectedcat-box">
                                    <div class="col-md-4 col-sm-12 col-xs-12 mrgn_zero padng_zero extracls">
                                    <div class=" image-box">
                                       <a href="<?= Yii::$app->urlManager->createUrl(['advertisement/ad-view', 'id' => $cate->id]) ?>">
                                        <img class="img-responsive" src="<?= Yii::getAlias('@web') . "/uploads/" . $cate->id . "/" . $img['image'] ?>" alt="" />
                                       </a>
                                    </div>
				    </div>
                                    <div class="col-md-8 col-sm-12 col-xs-12 product_detail">
<!--                                        <div class="top-detail">
                                            <span>Detail</span> 8000KM
                                        </div>
                                        <div class="top-detail pull-right">
                                            <span>Detail</span> Detail 2016 model
                                        </div>-->
                                        <a href="<?= Yii::$app->urlManager->createUrl(['advertisement/ad-view', 'id' => $cate->id]) ?>" class="title_head">
                                            <?= $cate->advertise_title ?>
                                        </a>
                                        
                                        <?php $results = \frontend\models\FormAdditionalValues::find()->where(['ad_id'=>$cate->id])->all(); 
                                        
                                        foreach ($results as $value) {
                                            $filter_names = \backend\models\FilterName::find()->where(['id'=>$value->field_id])->one();
                                            if($filter_names->search_display == 1)
                                            {
                                                echo '<div class="top-detail"><span>' . $filter_names['filter_name'] . '</span>' .  ltrim(str_replace("|","-",$value->values), '-') .'</div>'; 
                                            }
                                        }
                                        ?>
<!--                                        <div class="top-detail">
                                            <span>Detail</span> Deisel  
                                        </div>
                                        <div class="top-detail">
                                            <span>Detail</span> Automatic
                                        </div>-->
                                        <div class="address-detail">
                                            <?php echo $cate->address; ?>
  
                                        </div>
<!--                                        <span>Honda Civic » Parado Foxy </span>
                                        <h1>NOK: 150,0000</h1>
                                        <p>Lorem Ipsum is simply dummy text of the printing and type setting industry.</p>
                                        <span>Karachi, Pakistan </span>-->
                                       
                                    </div>
                                    <div class="productprice">
                                        Kr. <?php echo $cate->price; ?></div>
                                     <a href="#" class="verifyadd"></a>
                                </div>

            <?php }}else{
                
                echo "<h1 style='text-align: center;'> No Result Found </h1>";
            } ?>
         
        </div>
        <!--/search-wide-->
        <nav class="text-right">


<?php echo \yii\widgets\LinkPager::widget(['pagination' => $pagination]); ?>
                    </nav>
                </div>
       
	
      <!--/search-main-->

 
