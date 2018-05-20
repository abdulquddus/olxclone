<?php 
use yii\helpers\html;
use yii\widgets\LinkPager;
?>
<main>
  <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 search-wrap">
  <!-- header-search-main -->
  <section class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header-search-main">
      <form class="navbar-form" role="search">
        <div class="form-group">
            <input type="text"  class="form-control" id="location" placeholder="Location" data-toggle="modal" data-target="#myModal">
            <input type="text"  class="hidden" id="region">
            <input type="text" class="form-control custom-sel-form-control"  id="category" placeholder="Category" />
        <!--<input id="sel1" class="form-control custom-sel-form-control" type="text" placeholder="Category">-->
            <input type="text" id="key" class="form-control search-box-ad-screen" onclick="search()" placeholder="Search">
<!--             <button onclick="search(); return false" class="btn btn-default btn-hdr-search"><i class="fa fa-search"></i>Søk</button> -->
            <div class="header" style="display:none">
				<div class="container-tag" >   
	<nav>
						<ul class="nav nav-pills nav-main" id="mainMenu">
                                                    <?php foreach($category as $categ){ ?>
                                                   <li class="dropdown">
								<a class="myCategory" href="#">
									<?= $categ->title ?>
									<i class="fa fa-angle-right pull-right bold"></i>
								</a>
			                     
								<ul class='dropdown-menu'>
	     	                                        <?php $submenu->getsubcate($categ->id); ?>
	                                                        </ul>
							</li>
                                                    <?php } ?>
                                                    	
						</ul>
					</nav>
					
					</div>
			</div>
        </div>
      </form>
    </div>


    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="text-div">
                <input id="locatio" type="text" id="default" list="languages" class="form-control" placeholder="e.g. JavaScript" style="width:40%;float:left;box-shadow: none ;">
			  <datalist id="languages">
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
			  </datalist>	
			  <p>Last visit</p>
			</div>
          </div>
          <div class="modal-body pad150 display-block">
			<div class="cities">
			<p>Populære byer:</p>
			<?php foreach($regions as $regiond){?>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 myLi"><a href="#"><?= $regiond->name?></a></div>
			
                   <?php    }  ?>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<ul id="popup-hide">
				<li>All Norge</li>
                                <?php 
                                $main_regions=[];
                                foreach($regions as $region){
                                    array_push($main_regions, $region->id);
                                    echo "<li id='azad' onclick='city($region->id, this)'><a href='#'>$region->name <i class='fa fa-angle-right pull-right bold'></i></a></li>";
                                }?>
				</ul>
			</div>
             
			<div class="col-md-12 col-sm-12 col-xs-12 cities-name">
                            <?php foreach($main_regions as $main_region){
              $reg_cities=\frontend\models\City::find()->where(['region_id'=>$main_region])->all();
                                ?>
                                <ul class="subcities" id="<?= $main_region ?>" style="display:none;">
                                    <li class="back"><a href="#">Back</a></li>
                                    <?php 
        foreach ($reg_cities as $reg_city ){
            echo "<li class='myLi'><a href='#'>$reg_city->name</a></li>";
        }
                                    ?>
				</ul>
                         <?php   }?>
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
    <div class="container">
      <!--search-main-->
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 search-main">
        <!--search-main-top-->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 search-main-top">
          <ul>
            <li><a href="">Cars <span>(2,817)</span></a></li>
            <li><a href="">Motorcycles <span>(17)</span></a></li>
            <li><a href="">Spare Parts & Accessories <span>(5,817)</span></a></li>
            <li><a href="">Other Vehicles <span>(7)</span></a></li>
          </ul>
          
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 prc-rng-main">
             
            <label>Price Range</label>
            <input id="min_price" type="text" class=""><b>-</b>
            <input id="max_price" type="text" class="">
          </div>
		  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 my-thumb">
			<div class="pull-right">
                 <div class="view">
                 View:</div>
                 <div class="detail">
                 </div>
                 <div class="small-icon">
                 </div>
                 <div class="compact">
                 </div>
            </div>
		  </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 sort-main">
            <label>Sort By</label>
            <select class="form-control custom-sel-form-control" id="sel1">
              <option>Most Recent</option>
              <option>Low Price</option>
              <option>High Price</option>
            </select>
          </div>

        </div>
        <!--/search-main-top-->
        <!--search-left-->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 search-left">

          <div class="breadcrums">
            <a href="">Home</a><i class="fa fa-angle-double-right"></i>
            <a href="">All ads</a><i class="fa fa-angle-double-right"></i>
            <a href="">Mobile</a><i class="fa fa-angle-double-right"></i>
          </div>
<!--          <div class="search-left-box-btn">
            <a href="" class="btn btn-default">Save Search</a><br/>
            <a href="" class="btn btn-default">Reset</a>
          </div>-->

<!--          <div class="search-left-inr-box">
            <h3>Brands</h3>
            <ul>
              <li><a href="">Apple</a></li>
              <li><a href="">Samsung</a></li>
              <li><a href="">Motorola</a></li>
              <li><a href="">Nokia</a></li>
			</ul>
			
           	<div class="some_parent_class">
			 <ul class="widget_body_type">
              <li><a href="">Apple</a></li>
              <li><a href="">Samsung</a></li>
              <li><a href="">Motorola</a></li>
              <li><a href="">Nokia</a></li>
			</ul>
			 <div class="widget_head_type">
			<a href="#" class="test pull-right">see more</a>
				</div>
				</div>
          </div>          -->

          <div class="search-left-inr-box">
            <h3>Published</h3>
            <ul>
              <li><a  onclick="set_day(150)">All</a></li>
              <li><a  onclick="set_day(1)">last 24 hours</a></li>
              <li><a onclick="set_day(2)">last 72 hours</a></li>
              
              <li><input id="day" type="text" name="day" value="" class="hidden" /></li>
            </ul>
<!--            <a href="" class="pull-right">see more</a>-->
          </div>
          <div class="search-left-inr-box">
            <h3>Conditions</h3>
            <ul>
                <li><input type="radio" value="all" name="condition" checked/> All</li>
                <li><input type="radio" value="old" name="condition" /> Old</li>
                <li><input type="radio" value="new" name="condition" /> New</li>
              
            </ul>
           
          </div>
         <div class="search-left-inr-box">
            <h3>Type</h3>
            <ul>
                <li><input type="radio" value="all" name="type" checked/> All</li>
                <li><input type="radio" value="1" name="type" /> Company</li>
                <li><input type="radio" value="2" name="type" /> Private</li>
              
            </ul>
           
          </div>
         <div class="search-left-inr-box">
            <h3>Filters</h3>
               <ul id="myList">
                  
                </ul>
           
          </div>

        </div>
        <!--/search-left-->
        <!--search-wide-->
        <div id="ads" class="col-lg-8 col-md-8 col-sm-8 col-xs-12 search-wide">
            <?php
            if(!empty($result)){
            foreach($result as $cate){ 
                
                $img = \frontend\models\Images::findOne(['advertise_id'=>$cate->id]);
                
                ?>
          <div id="" class="selectedcat-box">
            <div class="image-box">
                <img class="img-responsive" src="<?= Yii::getAlias('@web')."/uploads/".$cate->id."/".$img['image'] ?>" alt="" />
			</div>
            <div class="caption">
                <a href="<?= Yii::$app->urlManager->createUrl(['advertisement/ad-view', 'id' => $cate->id]) ?>">
                <h3><?= $cate->advertise_title ?></h3>
            <!--<b>1,33,256 Ads</b>-->

            </a>
			</div>
          </div>
            <?php }}else{
                
                echo "<h1> no result found </h1>";
            } ?>
         
        </div>
        <!--/search-wide-->
      <nav class="text-right">
   		 <?php  echo \yii\widgets\LinkPager::widget(['pagination'=>$pagination]);?>
	</nav>
       
	  </div>
      <!--/search-main-->
    </div>
	
    <!-- /container-->
  </section>
   
<!-- Ads Boxes -->
 <!-- <div class="ads-vr ads-vr-left">Space Available For Ad</div>
  <div class="ads-vr ads-vr-right">Space Available For Ad</div>-->
<!-- /Ads Boxes -->
</main>

 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!--<script>
	
	jQuery(document).ready(function(){
        jQuery('#wwa').on('click', function(event) {        
             jQuery('#wwa-content').toggle('show');
        });
    });
	jQuery(document).ready(function(){
        jQuery('#wwa1').on('click', function(event) {        
             jQuery('#wwa1-content').toggle('show');
        });
    });
	jQuery(function ($) {
	$('.widget_head_type').each(function () {
		// closures
		var $toggle = $(this);
		var $parent = $toggle.closest('.some_parent_class');
		var $target = $parent.find('.widget_body_type');
		var $label = $toggle.find('.test');
		var bIsTweening = false;
		// OR var $target = $toggle.next('.widget_body_type');
		// event methods (closures)
		var fClickToggle = function () {
			if (!bIsTweening) {
				bIsTweening = true;
				$target.slideToggle('slow', fToggleCallback);
			}
		};
		var fToggleCallback = function () {
			bIsTweening = false;
			fSetLabel();
		};
		var fSetLabel = function () {
			var sLabel = $label.text().replace('see more', '').replace('less', '');
			sLabel = ($target.is(':visible') ? 'less' : 'see more') + sLabel;
			$label.html(sLabel);
		};
		// handle event
		$toggle.click(fClickToggle);
		$target.hide();
		fSetLabel();
	});
});
	-------this script use in list gallary--
	$('.detail').click(function(){
		$('.selectedcat-box').animate({width:'100%'},500);
		$('.image-box').animate({width:'28%'},500);
	});

    $('.small-icon').click(function(){
		$('.selectedcat-box').animate({width:'28%'},500);
		$('.image-box').animate({width:'100%'},500);
	});
	$('.compact').click(function(){
		$('.selectedcat-box').animate({width:'100%'},500);
		$('.image-box').animate({width:'100%'},500);
		
	});
	-------this script use in model popup--
     function city(id, item){
          
        $('#popup-hide').hide();
        $('#region').val($(item).text());
//        alert($(item).text());
        $('#'+id).fadeIn(100);
    
        }
     
        
//    $('#azad').click(function () {
//        $('#popup-hide').hide();
//        $('#show-kashmir').fadeIn(100);
//    });
//	$('#balochistan').click(function () {
//        $('#popup-hide').hide();
//        $('#show-balochistan').fadeIn(100);
//    });
//	$('#fata').click(function () {
//        $('#popup-hide').hide();
//        $('#show-fata').fadeIn(100);
//    });
//	$('#islamabad').click(function () {
//        $('#popup-hide').hide();
//        $('#show-islamabad').fadeIn(100);
//    });
//	$('#khyber').click(function () {
//        $('#popup-hide').hide();
//        $('#show-khyber').fadeIn(100);
//    });
//	$('#northen').click(function () {
//        $('#popup-hide').hide();
//        $('#show-northen').fadeIn(100);
//    });
//	$('#punjab').click(function () {
//        $('#popup-hide').hide();
//        $('#show-punjab').fadeIn(100);
//    });
//	$('#sindh').click(function () {
//        $('#popup-hide').hide();
//        $('#show-sindh').fadeIn(100);
//    });
//        subcities
      
        $('.back').click(function () {
        $('#popup-hide').fadeIn(100);
        
        $('.subcities').hide();
    });
//	$('.back').click(function () {
//        $('#popup-hide').fadeIn(100);
//        $('#show-kashmir').hide();
//		$('#show-balochistan').hide();
//		$('#show-fata').hide();
//		$('#show-islamabad').hide();
//		$('#show-khyber').hide();
//		$('#show-northen').hide();
//		$('#show-punjab').hide();
//		$('#show-sindh').hide();
//    });
	        	 	
	$(".myLi").click(function(){
    $('#location').val($(this).text());
	$('#myModal').fadeOut(100);	
	$('.modal-backdrop').fadeOut(100);

	
});
$("#category").click(function(){
    $('.header').show();
});
$(".myCategory").click(function(){
    $('#category').val($(this).text());
	$('.header').hide();
	return false;
	});
</script>-->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script>
    $(document).ready(function(){
        var cate = 'All';
        <?php if(isset($_GET['id'])){ ?>
       cate=<?= $_GET['id'] ?>; 
        <?php } ?>
            if(cate!= 'All') { 
                
//                ajax('<?php  echo Yii::$app->getUrlManager()->createUrl('category/getname'); ?>', 'id:jobb');
            $.ajax({ //create an ajax request to load_page.php
        type: "GET",

        url: "<?php echo Yii::$app->getUrlManager()->createUrl('category/getname'); ?>",
        data: {
            id: cate,
        },

        dataType: "JSON", //expect html to be returned                
        success: function(response) {
          document.getElementById('category').value=response;
          
                 $.ajax({type: "GET",
                     url: "<?php echo Yii::$app->getUrlManager()->createUrl('category/getfilters'); ?>",
                     data: {id: cate},
                     dataType: "JSON", //expect html to be returned                
                     success: function(response) {
                        
                     for(var i=0; i < response.length; i++){
                        
                          var obj = response[i];
                         $("#myList").append("<li><input name='optional' value="+obj.titles+" type='checkbox' /> " +obj.titles+"</li>");
//                        var node = document.createElement("LI");
//                        var textnode = document.createTextNode(obj.titles);
//                        node.appendChild(textnode);
//                        document.getElementById("myList").appendChild(node);
//                       console.log(obj.titles);
                     }
                        
                  }
                  });
          
        }
    });
    }
      
    });
</script>
  </body>
</html>