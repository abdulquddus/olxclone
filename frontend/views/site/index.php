<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use backend\models\Category;
use yii\helpers\BaseUrl;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$this->title = 'My Yii Application';
?>


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header-search-main">
        <!--<form class="navbar-form" role="search" action="index.php?r=site/searchad" method="GET">-->
     <div class="container">
      <?php  $form = ActiveForm::begin([
        'options' => ['class' => 'navbar-form'], 
          'method' => 'get',
          'action' => Yii::$app->getUrlManager()->createUrl('site/searchad'),
      ]); ?>
        <div class="form-group">
            <input type="text" name="location" id="location" class="form-control" placeholder="Pakistan" data-toggle="modal" data-target="#myModal" autocomplete="off">
            <input type="text" name="region"  class="hidden" id="region">
            <input type="text" name="skey" class="form-control search-box" placeholder="Search" onclick="search()" autocomplete="off">
            <!--<input type="text" id="key" class="form-control cat-sel-form-control" onclick="search()" placeholder="Search">-->
          <!-- <button type="submit" class="btn-hdr-search"><i class="fa fa-search"></i>Search</button> -->
          <button type="submit" class="btn btn-default btn-hdr-search"><i class="fa fa-search"></i>Search</button>
        </div>
      </form>
      </div>
    </div>

<main>

  <!-- header-search-main -->
  <section class="container">
    

 <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="text-div">
                <input id="locatio" type="text" id="default" list="languages" class="form-control" placeholder="e.g. Electronic" style="width:40%;float:left;box-shadow: none ;">
<!--			  <datalist id="languages">
				<option value="HTML">
				<option value="CSS">
				<option value="JavaScript">
				<option value="Java">
				<option value="Ruby">
				<option value="PHP">
				<option value="Go">
				<option value="Erlang">
				<option value="Python">
				<option value="C">
				<option value="C#">
				<option value="C++">
			  </datalist>	-->
			  <p>Last visit: <span><a href="" id="lasetlocation">karachi</a></span></p>
			</div>
          </div>
          <div class="modal-body pad150 display-block">
                            <div class="cities">
                                <p>Populære byer:</p>
<?php foreach ($regions as $regiond) { ?>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 myLi">
                                        <a href="#"><?= $regiond->name ?></a>
                                    </div>

<?php } ?>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <ul id="popup-hide">
                                    <li><a class='myLi' href='#'>All Categories</a></li>
                                    <?php
                                    $main_regions = [];
                                    foreach ($regions as $region) {
                                        array_push($main_regions, $region->id);
                                        echo "<li id='azad' onclick='city($region->id, this)'><a class='myLi' href='#'>$region->name</a> "
                                                . "<a href='#'><i class='fa fa-angle-right pull-right bold'></i></a></li>";
                                    }
                                    ?>
                                </ul>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 cities-name">
                                <?php
                                foreach ($main_regions as $main_region) {
                                    $reg_cities = \frontend\models\City::find()->where(['region_id' => $main_region])->all();
                                    ?>
                                    <ul class="subcities" id="<?= $main_region ?>" style="display:none;">
                                        <li class="back"><a href="#">Back</a></li>
                                        <?php
                                        foreach ($reg_cities as $reg_city) {
                                            echo "<li class='myLi'><a href='#'>$reg_city->name</a></li>";
                                        }
                                        ?>
                                    </ul>
<?php } ?>
                            </div>
                        </div>
<!--           <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div> -->
        </div>

      </div><!-- /Modal content-->
    </div><!-- /Modal -->
  </section>
  <!-- /header-search-main -->

  <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hm-wrap">
    <div class="container">
      <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12 cat-wrap">
        <?php
        $category_all = \backend\models\Category::find()
            ->where("parent_id = 0 and status=1")
            ->all();
        ?>  
        
        <ul>
            <?php 
        foreach($category_all as $category){                
            //echo '<li><a href=""><i class=""></i>' . $category['title'] . '</a></li>';

            echo  '<li><a href="'. \yii\helpers\Url::to(['category/categories', 'id'=>$category['id']]). '"><div class="cat-img-box"><img class="img-responsive"  src='.Yii::$app->request->baseUrl.'/admin/uploads/' . $category['image'] . '></div>' . $category['title'] . '</a></li>';


        } ?>
        </ul>
          

<?php 
if(isset($_GET['id'])){
    $id=$_GET['id'];
}  else {
$id=0;    
}
?>
<?php $imgsrc = \backend\models\CommercialAds::find()->orderBy(['id'=>SORT_DESC])->where(['category_id'=>$id])->one(); ?>
        <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hm-btm-ad">
         <a target="_blank" href="<?php echo $imgsrc->centre_ad_url; ?>"><img class="img-responsive" src="<?= Yii::$app->request->baseUrl?>/admin/uploads/<?=$imgsrc->centre_ad ?>" ></a>
        </div>
      </div><!-- /cat-wrap-->
      <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 hm-col-right">
        <div class="submit-ad-box">
          
        <?php
        $heading1 = \backend\models\ContentInner::find()
                ->where(['system_title' => 'frontend_left_heading1_index', 'status' => 1])
                ->one();
        if($heading1){
            echo  \Yii::t('yandex', "<h3>". $heading1->title ."</h3>");            
        }
        else{
            echo "<h3> Test data</h3>";            
        }
        
        $heading2 = \backend\models\ContentInner::find()
                ->where(['system_title' => 'frontend_left_heading2_index', 'status' => 1])
                ->one();
          if($heading2){
              echo \Yii::t('yandex',"<p>". $heading2->title. "</p>");              
              //print_r($heading2);
          }
          else{
            echo "<p> Test data</p>";            
        }?>
            <a class="btn-submit-ad" href="<?= Url::toRoute(['/site/submitad'])?>">Post your Ad</a>
        <?php 
        $heading3 = \backend\models\ContentInner::find()
                ->where(['system_title' => 'frontend_left_heading3_index', 'status' => 1])
                ->one();
          if($heading2){
              echo \Yii::t('yandex',  "<p>". $heading3->title. "</p>");              
              //print_r($heading2);
          }
          else{
            echo "<p> Test data</p>";            
        }?>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hm-col-right-ads">
            <a target="_blank" href="<?php echo $imgsrc->bottom_ad_url; ?>">
                <img class="img-responsive" src="<?= Yii::$app->request->baseUrl?>/admin/uploads/<?=$imgsrc->bottom_ad ?>" >
                </div>
            </a>
      </div>
      
      </div><!-- /container-->
  </section><!-- /hm-wrap -->
  
  
  <div class="parelex-bg">
  	<h1>ARE YOU READY FOR THE POSTING YOUR ADS ON HANGSHOP.PK?</h1>
   <center> <a class="btn-submit-ad btn-new" href="/classified/index.php?r=site%2Fsubmitad">Post your Ad</a></center>
    
  </div>
  
  
  <div class="col-xs-12">
 <div class="col-md-12">
      	<h1 class="text-center regular-adv">REGULAR ADVERTISEMENT</h1>
      </div>
        
    <div class="carousel slide" id="myCarousel">
        <div class="carousel-inner">
            <div class="item active">
                    <ul class="thumbnails">
                        <li class="col-sm-3">
    						<div class="fff">
								<div class="thumbnail">
									<a href="#"><img src="http://placehold.it/360x240" alt=""></a>
								</div>
								<div class="caption">
									<h4>Praesent commodo</h4>
									<p>Nullam Condimentum Nibh Etiam Sem</p>
									<a class="btn btn-mini" href="#">» Read More</a>
								</div>
                            </div>
                        </li>
                        <li class="col-sm-3">
							<div class="fff">
								<div class="thumbnail">
									<a href="#"><img src="http://placehold.it/360x240" alt=""></a>
								</div>
								<div class="caption">
									<h4>Praesent commodo</h4>
									<p>Nullam Condimentum Nibh Etiam Sem</p>
									<a class="btn btn-mini" href="#">» Read More</a>
								</div>
                            </div>
                        </li>
                        <li class="col-sm-3">
							<div class="fff">
								<div class="thumbnail">
									<a href="#"><img src="http://placehold.it/360x240" alt=""></a>
								</div>
								<div class="caption">
									<h4>Praesent commodo</h4>
									<p>Nullam Condimentum Nibh Etiam Sem</p>
									<a class="btn btn-mini" href="#">» Read More</a>
								</div>
                            </div>
                        </li>
                        <li class="col-sm-3">
							<div class="fff">
								<div class="thumbnail">
									<a href="#"><img src="http://placehold.it/360x240" alt=""></a>
								</div>
								<div class="caption">
									<h4>Praesent commodo</h4>
									<p>Nullam Condimentum Nibh Etiam Sem</p>
									<a class="btn btn-mini" href="#">» Read More</a>
								</div>
                            </div>
                        </li>
                    </ul>
              </div><!-- /Slide1 --> 
            <div class="item">
                    <ul class="thumbnails">
                        <li class="col-sm-3">
							<div class="fff">
								<div class="thumbnail">
									<a href="#"><img src="http://placehold.it/360x240" alt=""></a>
								</div>
								<div class="caption">
									<h4>Praesent commodo</h4>
									<p>Nullam Condimentum Nibh Etiam Sem</p>
									<a class="btn btn-mini" href="#">» Read More</a>
								</div>
                            </div>
                        </li>
                        <li class="col-sm-3">
							<div class="fff">
								<div class="thumbnail">
									<a href="#"><img src="http://placehold.it/360x240" alt=""></a>
								</div>
								<div class="caption">
									<h4>Praesent commodo</h4>
									<p>Nullam Condimentum Nibh Etiam Sem</p>
									<a class="btn btn-mini" href="#">» Read More</a>
								</div>
                            </div>
                        </li>
                        <li class="col-sm-3">
							<div class="fff">
								<div class="thumbnail">
									<a href="#"><img src="http://placehold.it/360x240" alt=""></a>
								</div>
								<div class="caption">
									<h4>Praesent commodo</h4>
									<p>Nullam Condimentum Nibh Etiam Sem</p>
									<a class="btn btn-mini" href="#">» Read More</a>
								</div>
                            </div>
                        </li>
                        <li class="col-sm-3">
							<div class="fff">
								<div class="thumbnail">
									<a href="#"><img src="http://placehold.it/360x240" alt=""></a>
								</div>
								<div class="caption">
									<h4>Praesent commodo</h4>
									<p>Nullam Condimentum Nibh Etiam Sem</p>
									<a class="btn btn-mini" href="#">» Read More</a>
								</div>
                            </div>
                        </li>
                    </ul>
              </div><!-- /Slide2 --> 
            <div class="item">
                    <ul class="thumbnails">
                        <li class="col-sm-3">	
							<div class="fff">
								<div class="thumbnail">
									<a href="#"><img src="http://placehold.it/360x240" alt=""></a>
								</div>
								<div class="caption">
									<h4>Praesent commodo</h4>
									<p>Nullam Condimentum Nibh Etiam Sem</p>
									<a class="btn btn-mini" href="#">» Read More</a>
								</div>
                            </div>
                        </li>
                        <li class="col-sm-3">
							<div class="fff">
								<div class="thumbnail">
									<a href="#"><img src="http://placehold.it/360x240" alt=""></a>
								</div>
								<div class="caption">
									<h4>Praesent commodo</h4>
									<p>Nullam Condimentum Nibh Etiam Sem</p>
									<a class="btn btn-mini" href="#">» Read More</a>
								</div>
                            </div>
                        </li>
                        <li class="col-sm-3">
							<div class="fff">
								<div class="thumbnail">
									<a href="#"><img src="http://placehold.it/360x240" alt=""></a>
								</div>
								<div class="caption">
									<h4>Praesent commodo</h4>
									<p>Nullam Condimentum Nibh Etiam Sem</p>
									<a class="btn btn-mini" href="#">» Read More</a>
								</div>
                            </div>
                        </li>
                        <li class="col-sm-3">
							<div class="fff">
								<div class="thumbnail">
									<a href="#"><img src="http://placehold.it/360x240" alt=""></a>
								</div>
								<div class="caption">
									<h4>Praesent commodo</h4>
									<p>Nullam Condimentum Nibh Etiam Sem</p>
									<a class="btn btn-mini" href="#">» Read More</a>
								</div>
                            </div>
                        </li>
                    </ul>
              </div><!-- /Slide3 --> 
        </div>
        
       
	   <nav>
			<ul class="control-box pager">
				<li><a data-slide="prev" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-left"></i></a></li>
				<li><a data-slide="next" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-right"></i></li>
			</ul>
		</nav>
	   <!-- /.control-box -->   
                              
    </div><!-- /#myCarousel -->
        
</div><!-- /.col-xs-12 -->          


</main>
