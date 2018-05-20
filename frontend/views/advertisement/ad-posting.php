<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<main>

  <!-- header-search-main -->
  <section class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header-search-main">
      <form class="navbar-form" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Location" data-toggle="modal" data-target="#myModal">
          <input type="text" class="form-control search-box" placeholder="Search">
          <!-- <button type="submit" class="btn-hdr-search"><i class="fa fa-search"></i>Search</button> -->
          <button type="submit" class="btn btn-default btn-hdr-search"><i class="fa fa-search"></i>Search</button>
        </div>
      </form>
    </div>

  <!-- Modal -->
    <div id="myModal" class="modal fade location-modal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <!-- <h4 class="modal-title">Search Location</h4> -->
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 location-modal-search">
              <input type="text" class="form-control" placeholder="Location">
            </div>
          </div>
          <div class="modal-body">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 popular-cities-box">
              <h4>Popular cities:</h4>
              <ul>
                <li><a href="#">Abbottabad</a></li>
                <li><a href="#">Abbottabad</a></li>
                <li><a href="#">Abbottabad</a></li>
                <li><a href="#">Abbottabad</a></li>
                <li><a href="#">Abbottabad</a></li>
                <li><a href="#">Abbottabad</a></li>
                <li><a href="#">Abbottabad</a></li>
                <li><a href="#">Abbottabad</a></li>
                <li><a href="#">Abbottabad</a></li>
                <li><a href="#">Abbottabad</a></li>
              </ul>
            </div><!--/popular-cities-box-->
            <div class="regions-main">
              
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
    
   <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 glb-wrap">
      <div class="container">
         <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 adpost-box">
          <h2>Post As Private</h2>
          <a class="btn-submit-ad" href="#">Submit an Ad</a>
          <ul>
        <?php 
        
        $short_heading1 = \backend\models\ContentInner::find()
                ->where(['system_title' => 'frontend_short_heading1_ad-posting', 'status' => 1])
                ->one();
        if($short_heading1){           
           echo '<li><i class="fa fa-check"></i>' . $short_heading1->title. '</li>';
          }
        else{
            echo "<p> Test data</p>";
        }
            
        $short_heading2 = \backend\models\ContentInner::find()
                ->where(['system_title' => 'frontend_short_heading2_ad-posting', 'status' => 1])
                ->one();
        if($short_heading2){           
           echo '<li><i class="fa fa-check"></i>' . $short_heading2->title. '</li>';
          }
        else{
            echo "<p> Test data</p>";                
        }
        
        $short_heading3 = \backend\models\ContentInner::find()
                ->where(['system_title' => 'frontend_short_heading3_ad-posting', 'status' => 1])
                ->one();
        if($short_heading3){           
           echo '<li><i class="fa fa-check"></i>' . $short_heading3->title. '</li>';
          }
        else{
            echo "<p> Test data</p>";                
        }?>
          </ul>
         </div><!-- /adpost-box-->

         <div class="col-lg-5 col-md-5 col-sm-5 col-md-offset-2 col-xs-12 adpost-box">
          <h2>Post As Dealer/Company</h2>
          <a class="btn-submit-ad" href="#">Submit an Ad</a>
          <ul>
              <?php 
        
        $short_heading4 = \backend\models\ContentInner::find()
                ->where(['system_title' => 'frontend_short_heading4_ad-posting', 'status' => 1])
                ->one();
        if($short_heading4){           
           echo '<li><i class="fa fa-check"></i>' . $short_heading4->title. '</li>';
          }
        else{
            echo "<p> Test data</p>";
        }
            
        $short_heading5 = \backend\models\ContentInner::find()
                ->where(['system_title' => 'frontend_short_heading5_ad-posting', 'status' => 1])
                ->one();
        if($short_heading5){           
           echo '<li><i class="fa fa-check"></i>' . $short_heading5->title. '</li>';
          }
        else{
            echo "<p> Test data</p>";                
        }
        
        $short_heading6 = \backend\models\ContentInner::find()
                ->where(['system_title' => 'frontend_short_heading6_ad-posting', 'status' => 1])
                ->one();
        if($short_heading6){           
           echo '<li><i class="fa fa-check"></i>' . $short_heading6->title. '</li>';
          }
        else{
            echo "<p> Test data</p>";                
        }
        
        
        ?>
          </ul>
         </div><!-- /adpost-box-->
      </div>
      <!-- /container-->
   </section>
   <!-- / -->
   <!-- Ads Boxes -->
   <!--<div class="ads-vr-left">Space Available For Ad</div>
   <div class="ads-vr-right">Space Available For Ad</div>-->
   <!-- /Ads Boxes -->
</main>