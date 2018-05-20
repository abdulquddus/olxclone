 <?php



use yii\helpers\html;

use yii\widgets\LinkPager;

use yii\helpers\Url;

use kartik\date\DatePicker;

use kartik\date\DatePickerAsset;

?>



<form class="navbar-form padding-z" role="search" action="" id="search_add_frm">

        <input type="hidden" name="r" value="site/searchad"

    <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 search-wrap">

           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header-search-main">
				<div class="container">
                  <div class="form-group">

                        <input onkeydown="return false" type="text" onchange="submit_frm_cate()" name="category"  class="form-control custom-sel-form-control"  value="<?php if(isset( $_GET['id'])) { echo $ctegory_name;  } ?>"  id="category" placeholder="Category" autocomplete="off">

                        <input  type="text" name="city"  class="hidden" id="region" value="<?php if(isset( $_GET['city'])) { echo $_GET['city']; } ?>">

                        <input onkeydown="return false" onchange="submit_frm()" type="text" name="location" class="form-control" value="<?php if(isset( $_GET['location'])) { echo $_GET['location']; } ?>" id="location" placeholder="Location" data-toggle="modal" data-target="#myModal"  autocomplete="off"/><!--<input id="sel1" class="form-control custom-sel-form-control" type="text" placeholder="Category">-->

                        <input type="text" class="form-control search-box-ad-screen"  placeholder="e.g Samsung, swift, shirts etc" name="skey" value="<?php if(isset( $_GET['skey'])) { echo $_GET['skey']; } ?>" autocomplete="off"/>

                       



                        <button type="button" id="key" class="btn btn-default btn-hdr-search" onclick="submit_frm()"><i class="fa fa-search"></i>Search</button>    

 <!--             <button onclick="search(); return false" class="btn btn-default btn-hdr-search"><i class="fa fa-search"></i>Søk</button> -->

                        <div class="header" style="display:none">



                            <div class="container-tag" id="mainMenu_div" >   

                                <nav>

                                    <ul class="nav nav-pills nav-main" id="mainMenu">

                        <?php foreach ($category as $categ) { ?>

                                            <li class="dropdown">

                                                <a onClick="submit_frm_cate()"  class="myCategory" href="#">

                                                    <?= $categ->title ?>

                                                    <?php 

                                                     $countitem = frontend\models\Category::find()->where(['parent_id'=>$categ->id])->count();

                  if ($countitem>0)

                  {

                  $showarrow =     "<i class='fa fa-angle-right pull-right bold min_mrgn'></i>";

                  }

                  else

                  {

                      $showarrow = "";

                  }

                                                    ?>

                                                   <?= $showarrow ?>

                                                </a>



<!--                                                <ul class='dropdown-menu'>-->

                                               <?php $submenu->getsubcate($categ->id); ?>

<!--                                                </ul>-->

                                            </li>

                                <?php } ?>



                                    </ul>

                                </nav>



                            </div>

                        </div>

                    </div>
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

                                <input id="locatio" type="text" id="default" list="languages" class="form-control" placeholder="Your location" style="width:40%;float:left;box-shadow: none ;">

                                <datalist id="languages">

                                    <?php 

                                    foreach($regions as $region){

                                       echo "<option value='$region->name'>";

                                    }

                                    ?>

                                    

                                </datalist>	

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

                                    <li><a class='myLi' href='#'>All Pakistan</a></li>

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

        <div class="container">

            <!--search-main-->

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 search-main">

                <!--search-main-top-->

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 search-main-top">

                    <ul>

                        <?php  $ads = new \frontend\models\Advertisement(); ?>

                        <?php foreach($relcategory as $relcat){ ?>

                        <li><a href="<?= Url::to(['site/searchad', 'category' => $relcat->title]); ?>"><?= $relcat->title;?> <span>(<?php echo $ads->getadcount($relcat->id); ?>)</span></a></li>

                        <?php } ?>

<!--                        <li><a href="">Cars <span>(2,817)</span></a></li>

                        <li><a href="">Motorcycles <span>(17)</span></a></li>

                        <li><a href="">Spare Parts & Accessories <span>(5,817)</span></a></li>

                        <li><a href="">Other Vehicles <span>(7)</span></a></li>-->

                    </ul>



                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 prc-rng-main">



<!--                        <label>Price Range</label>

                        <input id="min_price" name="min_price"  onchange="submit_frm()" type="text" value="<?php // if(isset( $_GET['min_price'])) { echo $_GET['min_price']; } ?>" class=""><b>-</b>

                        <input id="max_price" name="max_price" onchange="submit_frm()" type="text" value="<?php // if(isset( $_GET['max_price'])) { echo $_GET['max_price']; } ?>" class="">-->

                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 my-thumb">

                        <div class="pull-left">

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

                        <select name="sort_by" onchange="submit_frm()" class="form-control custom-sel-form-control selct_fld" id="sel1">

                            <option value="most_recent" >Most Recent</option>

                            <option value="low_price" >Price Low to High</option>

                            <option value="high_price">Price High to Low</option>

                        </select>

                    </div>



                </div>

                <!--/search-main-top-->

                <!--search-left-->

                    

                    

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 search-left bgcolr">



<!--                    <div class="breadcrums">

                        <a href="">Home</a><i class="fa fa-angle-double-right"></i>

                        <a href="">All ads</a><i class="fa fa-angle-double-right"></i>

                        <a href="">Mobile</a><i class="fa fa-angle-double-right"></i>

                    </div>-->

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

                    <div class="search-left-inr-box hidden-sm hidden-xs">

                        <h3>Published</h3>

                        <ul class="rdio_btn">

                            <li><input type="radio" class="rdo_main" onclick="submit_frm()" value="0" name="published" checked/>All</li>

                            <li><input type="radio" class="rdo_main" onclick="submit_frm()" value="1" name="published" <?php if(isset($_GET['published']) && $_GET['published']==1 ) { echo "checked"; } ?>/>Last 24 hours</li>

                            <li><input type="radio" class="rdo_main" onclick="submit_frm()" value="2" name="published" <?php if(isset($_GET['published']) && $_GET['published']==2 ) { echo "checked"; } ?> />Last 72 hours</li>



                        </ul>



                    </div>

                     <div class="search-left-inr-box visible-sm  visible-xs ">

                        <h3>Published</h3>

                        <select class="col-md-12 ">

                            <option>All</option>

                            <option>Last 24 hours</option>

                            <option>Last 72 hours</option>

                            

                        </select>

                      



                    </div>

<!--                    <div class="search-left-inr-box">



                        <ul>

                            <li><a  onclick="set_day(150)">All</a></li>

                            <li><a  onclick="set_day(1)">last 24 hours</a></li>

                            <li><a onclick="set_day(2)">last 72 hours</a></li>



                            <li><input id="day" type="text" name="published" value="" class="hidden" /></li>

                        </ul>

                                    <a href="" class="pull-right">see more</a>

                    </div>-->

                    <div class="search-left-inr-box hidden-sm hidden-xs">

                        <h3>Conditions</h3>

                        <ul class="rdio_btn">

                            <li><input type="radio" onclick="submit_frm()" class="rdo_main"  value="all" name="condition" checked/> All</li>

                            <li><input type="radio" onclick="submit_frm()" class="rdo_main"  value="used" name="condition" class="rdo_main" <?php if(isset($_GET['condition']) && $_GET['condition']=='used' ) { echo "checked"; } ?> /> Used</li>

                            <li><input type="radio" onclick="submit_frm()" class="rdo_main" value="new" name="condition" <?php if(isset($_GET['condition']) && $_GET['condition']=='new' ) { echo "checked"; } ?> /> New</li>



                        </ul>



                    </div>

 <div class="search-left-inr-box visible-sm  visible-xs ">

                        <h3>Conditions</h3>

                        <select class="col-md-12 ">

                            <option>All</option>

                            <option>used</option>

                            <option>New</option>

                            

                        </select>

                      



                    </div>

                    <div class="search-left-inr-box hidden-sm hidden-xs">

                        <h3>Type</h3>

                        <ul class="rdio_btn">

                            <li><input class="rdo_main" type="radio" onclick="submit_frm()" value="" name="type" checked/> All</li>

                            <li><input class="rdo_main" type="radio" onclick="submit_frm()" value="1" name="type" <?php if(isset($_GET['type']) && $_GET['type']==1 ) { echo "checked"; } ?> /> Company</li>

                            <li><input class="rdo_main" type="radio" onclick="submit_frm()" value="2" name="type" <?php if(isset($_GET['type']) && $_GET['type']==2 ) { echo "checked"; } ?> /> Private</li>



                        </ul>



                    </div>

 <div class="search-left-inr-box visible-sm  visible-xs ">

                        <h3>Type</h3>

                        <select class="col-md-12 ">

                            <option>All</option>

                            <option>Company</option>

                            <option>Private</option>

                            

                        </select>

                      



                    </div>

                    <div class="search-left-inr-box" id="myList">

<!--                        <h3>Filters <?php ?></h3>

                        <ul id="myList" class="rdio_btn" >-->

                            <?php   foreach ($filters as $filter) {

                                 

                                $dd_option_id =   \backend\models\FilterName::find()->where(['parent_filter'=>$filter->id])->all();



                                if($filter->display_for_screen_page == 1) //Dropdown

                                {

                                   echo "  <form class='form-horizontal' role='form'> <div class='form-group bg-none mrgn-padng'>

                                             <label class='col-md-12 control-label mrgn-padng'><h3>" . $filter['filter_name'] . "</h3></label>

                                             <select name='Advertisements[additional_optional][". $filter['id'] ."][]' id='basic' class='selectpicker bg-none mrgn-padng form-control ' onchange='subdropdown(this)' name=''><option>Please Select</option>

                                             ";

                                   

                                   foreach ($dd_option_id as $a_value) 

                                   {

                                        //print_r($a_value->id);

                                       // $dd_option_main = \backend\models\FilterName::find()->where(['id'=>$a_value->filter_field_key])->all();

                                        echo '<option data_value="'. $a_value['id']  .'" value="'. $a_value['filter_name']  .'">'. $a_value['filter_name'] .'</option>';         

                                   }

                                   echo "</select></div><div id='additional_optional'></div></form>";

                                }



                                if($filter->display_for_screen_page == 2) //CheckBox

                                {

                                echo "<div class='input-group contact-field-wrap hello'>

                                         <label><h3>" . $filter['filter_name'] . "</h3></label></div>";



                                foreach ($dd_option_id as $a_value) 

                                {

                                   //$dd_option_main = \backend\models\FilterName::find()->where(['id'=>$a_value->filter_field_key])->all();

                                   //echo '<option value="'. $dd_option_main[0]['id']  .'">'. $dd_option_main[0]['filter_name'] .'</option>';         

                                   echo "<input name='Advertisements[additional_optional][". $filter['id'] ."][]' type='checkbox' class='checkbox'  value='" . $a_value['filter_name'] . "'>" . " " .$a_value['filter_name'] ."<br>";

                                }

                                }

                                if($filter->display_for_screen_page == 3) //TextBox Number

                                {

                                    echo "<div class='input-group contact-field-wrap hello'>

                                    <label><h3>" . $filter['filter_name'] . "</h3></label>

                                    <input class='form-control' type='number' name='Advertisements[additional_optional][". $filter['id'] ."][]' value=''>

                                    </div>";

                                }



                                if($filter->display_for_screen_page == 4) //TextBox

                                {

                                    echo "<div class='input-group contact-field-wrap hello'>

                                    <label><h3>" . $filter['filter_name'] . "</h3></label>

                                    <input class='form-control' type='text' name='Advertisements[additional_optional][". $filter['id'] ."][]' value=''>

                                    </div>";

                                }



                                //}



                                if($filter->display_for_screen_page == 5) //Range

                                {

                                //First Range Textbox

                                echo "<div class='input-group contact-field-wrap hello'>

                                <label><h3>" . $filter['filter_name'] . "</h3></label>

                                      <input type='number' placeholder='From' class='form-control' name='Advertisements[additional_optional][". $filter['id'] ."][]' value=''></div>";



                                //Second Range Textbox

                                echo "<div class='input-group contact-field-wrap hello'>

                                <label>" .                         "</label>

                                      <input type='number' placeholder='To' class='form-control'  name='Advertisements[additional_optional][". $filter['id'] ."][]'

                                  value=''></div>";

                                }


                                ?>
                              

                            <?php  } ?>
                        </ul>
                    </div>
                </div>
    

                    <!--<input type="submit"/>-->
                <!--/search-left-->
                <!--search-wide-->
                <div id="ads">
                    <div  class="col-lg-9 col-md-9 col-sm-9 col-xs-12 search-wide padng_zero">
                    <div class="featured-ad">
                     <div class="col-md-4 col-sm-6 col-xs-12 m-t-20">
                    <div class="card">
                    <div class="featuredstamp">
                    <img class="img-responsive" src="<?= Yii::$app->request->baseUrl?>/design/img/fea.png ?>" >
                    </div>
                        <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/b/bc/2017_Honda_CR-V_%28RW_MY18%29_VTi_2WD_wagon_%282017-11-18%29_01.jpg">
                        <div class="card-block">
                            <h4 class="card-title">Toyota Corolla Gli On installment (AGI)</h4>
                            <div class="meta">
                                <a href="#">Faisalabad, Punjab</a>
                            </div>
                            <div class="card-text">
                                Twe deal all kinds of property & vehicle only on 20% Advance..
No hidden & Extra Charges
                            </div>
                        </div>
                        <div class="card-footer">
                            <span><i class=""></i>Price:</span>
                            <span class="float-right">250000/=</span>
                            
                        </div>
                    </div>
               		 </div>
                     <div class="col-md-4 col-sm-6 col-xs-12 m-t-20">
                    <div class="card">
                    <div class="featuredstamp">
                    <img class="img-responsive" src="<?= Yii::$app->request->baseUrl?>/design/img/fea.png ?>" >
                    </div>
                        <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/b/bc/2017_Honda_CR-V_%28RW_MY18%29_VTi_2WD_wagon_%282017-11-18%29_01.jpg">
                        <div class="card-block">
                            <h4 class="card-title">Toyota Corolla Gli On installment (AGI)</h4>
                            <div class="meta">
                                <a href="#">Faisalabad, Punjab</a>
                            </div>
                            <div class="card-text">
                                Twe deal all kinds of property & vehicle only on 20% Advance..
No hidden & Extra Charges
                            </div>
                        </div>
                        <div class="card-footer">
                            <span><i class=""></i>Price:</span>
                            <span class="float-right">250000/=</span>
                            
                        </div>
                    </div>
               		 </div>
                     <div class="col-md-4 col-sm-6 col-xs-12 m-t-20">
                    <div class="card">
                    <div class="featuredstamp">
                    <img class="img-responsive" src="<?= Yii::$app->request->baseUrl?>/design/img/fea.png ?>" >
                    </div>
                        <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/b/bc/2017_Honda_CR-V_%28RW_MY18%29_VTi_2WD_wagon_%282017-11-18%29_01.jpg">
                        <div class="card-block">
                            <h4 class="card-title">Toyota Corolla Gli On installment (AGI)</h4>
                            <div class="meta">
                                <a href="#">Faisalabad, Punjab</a>
                            </div>
                            <div class="card-text">
                                Twe deal all kinds of property & vehicle only on 20% Advance..
No hidden & Extra Charges
                            </div>
                        </div>
                        <div class="card-footer">
                            <span><i class=""></i>Price:</span>
                            <span class="float-right">250000/=</span>
                            
                        </div>
                    </div>
               		 </div>
                     <div class="col-md-4 col-sm-6 col-xs-12 m-t-20">
                    <div class="card">
                    <div class="featuredstamp">
                    <img class="img-responsive" src="<?= Yii::$app->request->baseUrl?>/design/img/fea.png ?>" >
                    </div>
                        <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/b/bc/2017_Honda_CR-V_%28RW_MY18%29_VTi_2WD_wagon_%282017-11-18%29_01.jpg">
                        <div class="card-block">
                            <h4 class="card-title">Toyota Corolla Gli On installment (AGI)</h4>
                            <div class="meta">
                                <a href="#">Faisalabad, Punjab</a>
                            </div>
                            <div class="card-text">
                                Twe deal all kinds of property & vehicle only on 20% Advance..
No hidden & Extra Charges
                            </div>
                        </div>
                        <div class="card-footer">
                            <span><i class=""></i>Price:</span>
                            <span class="float-right">250000/=</span>
                            
                        </div>
                    </div>
               		 </div>
                     <div class="col-md-4 col-sm-6 col-xs-12 m-t-20">
                    <div class="card">
                    <div class="featuredstamp">
                    <img class="img-responsive" src="<?= Yii::$app->request->baseUrl?>/design/img/fea.png ?>" >
                    </div>
                        <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/b/bc/2017_Honda_CR-V_%28RW_MY18%29_VTi_2WD_wagon_%282017-11-18%29_01.jpg">
                        <div class="card-block">
                            <h4 class="card-title">Toyota Corolla Gli On installment (AGI)</h4>
                            <div class="meta">
                                <a href="#">Faisalabad, Punjab</a>
                            </div>
                            <div class="card-text">
                                Twe deal all kinds of property & vehicle only on 20% Advance..
No hidden & Extra Charges
                            </div>
                        </div>
                        <div class="card-footer">
                            <span><i class=""></i>Price:</span>
                            <span class="float-right">250000/=</span>
                            
                        </div>
                    </div>
               		 </div>
                     <div class="col-md-4 col-sm-6 col-xs-12 m-t-20">
                    <div class="card">
                    <div class="featuredstamp">
                    <img class="img-responsive" src="<?= Yii::$app->request->baseUrl?>/design/img/fea.png ?>" >
                    </div>
                        <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/b/bc/2017_Honda_CR-V_%28RW_MY18%29_VTi_2WD_wagon_%282017-11-18%29_01.jpg">
                        <div class="card-block">
                            <h4 class="card-title">Toyota Corolla Gli On installment (AGI)</h4>
                            <div class="meta">
                                <a href="#">Faisalabad, Punjab</a>
                            </div>
                            <div class="card-text">
                                Twe deal all kinds of property & vehicle only on 20% Advance..
No hidden & Extra Charges
                            </div>
                        </div>
                        <div class="card-footer">
                            <span><i class=""></i>Price:</span>
                            <span class="float-right">250000/=</span>
                            
                        </div>
                    </div>
               		 </div>
                     
                     
                     </div>
            			
                         <div class="col-md-12">
                         <section class="listing-page-builing">
    
         <div class="row">
             <?php
                      if (!empty($result)) {
                          foreach ($result as $cate) {
                                $img = \frontend\models\Images::findOne(['advertise_id' => $cate->id]);
                                ?>
           <div class="listing-box">
               <div class="col-md-3 mr-iob-blr">
                 <div style="background: url('<?= Yii::getAlias('@web') . "/uploads/" . $cate->id . "/" . $img['image'] ?>') 0 0 no-repeat; height:30vh; background-size:cover; background-position:center; border:#ccc 1px solid"></div>
				 </div>
               <div class="col-md-9">
                  <h4><a href="<?= Yii::$app->urlManager->createUrl(['advertisement/ad-view', 'id' => $cate->id]) ?>"><?= $cate->advertise_title ?></a> </h4>
                  <ul class="poperty-details-iob">
                     <li><span>PKR <?= $cate->price ?></span><br/>
                                 </li>
                                    <li>
                     <a href="<?= Yii::$app->urlManager->createUrl(['advertisement/ad-view', 'id' => $cate->id]) ?>"View Detail>View More</a>
                     </li>
                     
                    
                     </ul>
                  
                  
                  <p>
                    <?= $cate->description ?>
                  </p>
                  
               </div>
             </div>
                   <?php
                           }
                        } else {
                            echo "<h1 style='text-align: center;'> No Results Found </h1>";
                        }
                        ?>
             
                 </div>
     
   </section>
            			</div>
                        
            <div class="pagination-wrap">
        <ul class="pagination pagination-v2">
          <li><?php echo \yii\widgets\LinkPager::widget(['pagination' => $pagination]); ?></li>
        
        </ul>
      </div>
        
                      
                    </div>

                    <!--/search-wide-->

                    </div>

            </div>

            <!--/search-main-->

        </div>



        <!-- /container-->

    </section>



    <!-- Ads Boxes -->

  <!--  <div class="ads-vr ads-vr-left">Space Available For Ad</div>

    <div class="ads-vr ads-vr-right">Space Available For Ad</div>-->

    <!-- /Ads Boxes -->

</main>

</form>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>



<!-- Include all compiled plugins (below), or include individual files as needed -->



<script>



function submit_frm_cate()

        {

           // alert('sdsdsd')

            var str ;





         setTimeout(function(){  str =  document.getElementById('category').value;  

        str = str.trim();

        document.getElementById('category').value = str; 

            $.ajax({

        type: "GET",

        url: "<?php  echo Yii::$app->getUrlManager()->createUrl('site/getfilters'); ?>",

        data: "cate_name="+str,

        success: function(data) {

            console.log('get data '+data )

            document.getElementById("myList").innerHTML = data;

            

        //The below one line open the datepicker option.    

        $('#datafilter').datepicker();

        }

    });



            }, 100);





            submit_frm();

        }





    function submit_frm()

    {         

          var str;

       

         setTimeout(function(){  str =  document.getElementById('category').value;  

        str = str.trim(); console.log(str);document.getElementById('category').value = str; }, 100);

     

        setTimeout(function(){

            $.ajax({

        type: "GET",

        url: "<?php  echo Yii::$app->getUrlManager()->createUrl('site/searchad'); ?>",



        data: $("#search_add_frm").serialize(),

        //       setTimeout(function(){ alert("No result found"); }, 3000);          

        success: function(data) {

            //       alert(data);

            document.getElementById("ads").innerHTML = data;

        }

    });}, 1000);



        setTimeout(function(){

            $.ajax({

        type: "GET",

        url: "<?php  echo Yii::$app->getUrlManager()->createUrl('site/searchad'); ?>",



        data: $("#search_add_frm").serialize(),

        //       setTimeout(function(){ alert("No result found"); }, 3000);          

        success: function(data) {

            //       alert(data);

            // document.getElementById("ads").innerHTML = data;

        }

    });}, 1000);

        

//        alert('dddd');

//          $(form).submit();

        //  $( ".navbar-form" ).submit();

    }



</script>



<script>

$('body').click(function(event) {

   // alert('is block display');

//Hide the menus if visible

 console.log(event.target.id);

 if(event.target.id!='category'){

if ( $('.header').attr('style') == 'display: block;' ) {

    // do this

    

$(".header").css('display','none');

} }

//$(".header").css("display","none");

//alert('hji');

});



</script>





 <script>

          function subdropdown(id)

    {

        var dd_id = id.value;

        dd_id = $(id).find(':selected').attr('data_value')  //this variable contains the ID of dropdown's options

        //alert(dd_id)

          $.ajax({

            type: "GET",

            dataType: "html",

            url: "<?php echo Yii::$app->getUrlManager()->createUrl('site/sub_dd_options'); ?>",

            data: {

                id: dd_id

            },success: function(data) {

                document.getElementById("additional_optional").innerHTML = data;

            },

            error: function() {

            console.log(arguments);

            }



            });

    }

 </script>