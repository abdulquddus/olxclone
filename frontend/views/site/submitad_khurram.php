<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->   
<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

?>
<main>
  <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 submitad-wrap">
      <div class="container submitad-main-outer">
      <h4 class="form-ttl">Ad Details</h4>
        <!--<form role="form">-->
        <?php
        $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
        ?>
         <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 submitad-main">
           <?= $form->field($model, 'advertise_title', ['template' => ' <div class="input-group custom-field-wrap">
              <label>Tittel<b class="asterisk">*</b></label>
              <a href="#" class="title-popover" data-html="true" title="<b>Want to get you ad noticed?</b>" data-toggle="popover" data-placement="right" data-content="                    <ul>
			<li>1. Give your ad an attractive title.</li>
			<li>2. Think of words that people would use to search for you ad.</li>
			<li>3. Check the spellings & do not use CAPITAL LETTERS or symbols.</li>
                    </ul>">
                {input}</a>
              <div class="error-placement">{error}<span id="textarea_feedback"></span></div>
                    </div>']) ?>
              
                

              
              
            
            
            <?= $form->field($model, 'category_id', ['template' => ' <div class="input-group custom-field-wrap" id="cate">
              <label>Kategori<b class="asterisk">*</b></label>
              {input}<div class="error-placement">{error}</div>
            </div>'])->textInput(['data-target'=>'#category', 'data-toggle'=>'modal', 'id'=>'showcat','readonly'=>true,'placeholder'=>"Please select category by clicking here"]); ?> 
             <div class="hiddene" >
                 <input id="advertisement-category_id" class="form-control fild_stle" name="Advertisements[category_id]">
                 
             </div>
             
             <div id="optional">
               
             </div>
             
            <?= $form->field($model, 'description', ['template' => '  <div class="input-group custom-field-wrap description-popover">
              <label>Beskrivelse<b class="asterisk">*</b></label>
              <a href="#" data-html="true" href = "#" title = "<b>Items with good description sell faster!</b>" data-container = "body" 
                data-toggle = "popover" data-content = "<ul>
			<li>1. Include the brand, model, age, and any included accessories..</li>
			<li>2. Mention the condition, features and reason for selling..</li>
			<li>3. If the item is under warrantly, mention it!</li>
			<li>4. Remember, a good description needs at least 2-3 sentences.</li>
                    </ul>">
            {input}</a><div class="error-placement">{error}<span id="textarea_description"></span></div>
            </div>'])->textarea(array('rows'=>5, 'class'=>'form-control abc', 'placeholder'=>"Include the brand, model, age, and any included accessories.")); ?>  
                 
        <?= $form->field($model, 'price', ['template' => '<div class="input-group custom-field-wrap">
              <label>Pris<b class="asterisk">*</b></label>
              <a href="#!" data-placement="right" data-html="true" href = "#" title = "<b>Buyers prefer ads with realistic prices!</b>" data-container = "body" 
                data-toggle = "popover" data-content = "
                    <ul>
			<li>1. Consider age & condition of the item.</li>
			<li>2. When in doubt, check prices of similar items on Classified.</li>
                    </ul> ">


              {input}</a><div class="error-placement">{error}</div>
            </div>']); ?> 
        <?= $form->field($model, 'condition', ['template'=>'<div class="input-group contact-field-wrap">
              <label>Condition<b class="asterisk">*</b></label>
              {input}<div class="error-placement">{error}</div>
            </div>'])->dropDownList(['used'=>'Used', 'new'=>'New','class'=>'form-control abc']) ?>     
           

            <div class="input-group custom-field-wrap">
              <label>Last opp bilder</label>
              <div class="custom-file-input-wrap">
                  <ul class="photos-show-mini clr ui-sortable">
                      <li>																													<li style="z-index: 0;" id="add-file-1" class="fleft empty rel first-child   {slot: 1}">
			<div class="br5">
			   <a href="javascript:void(0);" class="block" title="Add photo">
			     <span class="icon margin0_a rel add2 block"></span>
		          </a>
			</div>
		      </li>
                       <li>																													<li style="z-index: 0;" id="add-file-1" class="fleft empty rel first-child   {slot: 1}">
			<div class="br5">
			   <a href="javascript:void(0);" class="block" title="Add photo">
			     <span class="icon margin0_a rel add2 block"></span>
		          </a>
			</div>
		      </li>
                       <li>																													<li style="z-index: 0;" id="add-file-1" class="fleft empty rel first-child   {slot: 1}">
			<div class="br5">
			   <a href="javascript:void(0);" class="block" title="Add photo">
			     <span class="icon margin0_a rel add2 block"></span>
		          </a>
			</div>
		      </li>
                       <li>																													<li style="z-index: 0;" id="add-file-1" class="fleft empty rel first-child   {slot: 1}">
			<div class="br5">
			   <a href="javascript:void(0);" class="block" title="Add photo">
			     <span class="icon margin0_a rel add2 block"></span>
		          </a>
			</div>
		      </li>
                       <li>																													<li style="z-index: 0;" id="add-file-1" class="fleft empty rel first-child   {slot: 1}">
			<div class="br5">
			   <a href="javascript:void(0);" class="block" title="Add photo">
			     <span class="icon margin0_a rel add2 block"></span>
		          </a>
			</div>
		      </li>
                       <li>																													<li style="z-index: 0;" id="add-file-1" class="fleft empty rel first-child   {slot: 1}">
			<div class="br5">
			   <a href="javascript:void(0);" class="block" title="Add photo">
			     <span class="icon margin0_a rel add2 block"></span>
		          </a>
			</div>
		      </li>
                       <li>																													<li style="z-index: 0;" id="add-file-1" class="fleft empty rel first-child   {slot: 1}">
			<div class="br5">
			   <a href="javascript:void(0);" class="block" title="Add photo">
			     <span class="icon margin0_a rel add2 block"></span>
		          </a>
			</div>
		      </li>
                       <li>																													<li style="z-index: 0;" id="add-file-1" class="fleft empty rel first-child   {slot: 1}">
			<div class="br5">
			   <a href="javascript:void(0);" class="block" title="Add photo">
			     <span class="icon margin0_a rel add2 block"></span>
		          </a>
			</div>
		      </li>
																																							<li style="z-index: 0;" id="add-file-2" class="fleft empty rel    {slot: 2}">
									
                  </ul>
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                <?= $form->field($model, 'imageFiles[]', ['template'=>'{input}'])->fileInput(['multiple' => true, 'type'=>'file', 'accept' => 'image/*', 'class'=>'custom-file-input']) ?>
                <?= $form->field($model, 'imageFiles[]', ['template'=>'{input}'])->fileInput(['multiple' => true, 'type'=>'file', 'accept' => 'image/*', 'class'=>'custom-file-input']) ?>
                <?= $form->field($model, 'imageFiles[]', ['template'=>'{input}'])->fileInput(['multiple' => true, 'type'=>'file', 'accept' => 'image/*', 'class'=>'custom-file-input']) ?>                         
                <?= $form->field($model, 'imageFiles[]', ['template'=>'{input}'])->fileInput(['multiple' => true, 'type'=>'file', 'accept' => 'image/*', 'class'=>'custom-file-input']) ?>                         
                <?= $form->field($model, 'imageFiles[]', ['template'=>'{input}'])->fileInput(['multiple' => true, 'type'=>'file', 'accept' => 'image/*', 'class'=>'custom-file-input']) ?>                         
                <?= $form->field($model, 'imageFiles[]', ['template'=>'{input}'])->fileInput(['multiple' => true, 'type'=>'file', 'accept' => 'image/*', 'class'=>'custom-file-input']) ?>                         
                <?= $form->field($model, 'imageFiles[]', ['template'=>'{input}'])->fileInput(['multiple' => true, 'type'=>'file', 'accept' => 'image/*', 'class'=>'custom-file-input']) ?>                         
                <?= $form->field($model, 'imageFiles[]', ['template'=>'{input}'])->fileInput(['multiple' => true, 'type'=>'file', 'accept' => 'image/*', 'class'=>'custom-file-input']) ?>                         
                  
              </div>
             
            </div><!-- /custom-field-wrap-->
           
         </div><!-- /submitad-main-->
        
<!--        <div class="col-md-3 col-sm-3 hidden-xs adpost-offer">
          <div class="adpost-offer-inr">
            <h4>Ad Posting Offers:</h4>
            <ul>
              <li>i) Lorem ipsum dolor sit amet Lorem ipsum </li>
              <li>ii) Lorem ipsum dolor sit amet Lorem ipsum </li>
              <li>iii) Lorem ipsum dolor sit amet Lorem ipsum </li>
              <li>iv)Lorem ipsum dolor sit amet Lorem ipsum </li>
            </ul>
          </div> /adpost-offer-inr
        </div> /adpost-offer-->
      <!--</form>-->
      <h4 class="form-ttl">Contact Details</h4>
      <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contact-dtl-wrap">
        <!--form role="form"-->
         <div class="col-md-9 col-md-offset-1 col-sm-8 col-sm-offset-2 contact-dtl-main">

              <?= $form->field($model, 'contact_name', ['template' => ' <div class="input-group hvr_div active contact-field-wrap">
<div class="popup_shw"></div>              
<label>Name<b class="asterisk">*</b></label>
              <a href="#!" data-placement="right" data-html="true" href = "#" data-container = "body" data-toggle = "popover" data-content = "
                    <ul>
                        <li>1. Use your real name to build trust.</li>
                        <li>2. Do not use symbols and numbers in your name.</li>
                    </ul> ">

              {input}</a><div class="error-placement">{error}</div>
            </div>'])->textInput(['value'=>$user->name, 'class'=>'form-control abc']); ?> 
            
            
             <?= $form->field($model, 'mobile_number', ['template' => '<div class="input-group contact-field-wrap">
              <label>Phone<b class="asterisk">*</b></label>
              <a href="#!" data-placement="right" data-html="true" href = "#" data-container = "body" data-toggle = "popover" data-content = "
                    <ul>
                        <li>1. Enter your MOBILE number.</li>
                        <li>2. Do not add +92 or 0 before the number.</li>
                        <li>3. A verification code will be sent to this MOBILE number.</li>
                        <li>4. Verification is mandatory to post the Ad.</li>
                        <li>5. Verification helps you sell faster and build trust with buyers!</li>
                    </ul> ">

              {input}</a><div class="error-placement">{error}</div>
            </div>'])->textInput(['value'=>$user->mobile,'class'=>'form-control abc']); ?> 
    <?php
         $city_name = \frontend\models\City::findOne($user->city);
          
         $city_all = \frontend\models\City::find()->where(['region_id'=>$user->state])->all();
         $city = ArrayHelper::map($city_all, 'id', 'name');        
          
        $state = \frontend\models\Region::findOne($user->state);
        $selected_city = \frontend\models\City::findOne($user->city);//         $state = ArrayHelper::map($array_region, 'id', 'name'); ?>

             <?= $form->field($model, 'state_id', ['template'=>'<div class="input-group contact-field-wrap">
              <label>State<b class="asterisk">*</b></label>
              {input}<div class="error-placement">{error}</div>
            </div>'])->dropDownList($region ,['options' => [$state->id => ['Selected'=>'Selected']],'class'=>'form-control abc']); ?>
             
             
            
              <?= $form->field($model, 'city_id', ['template'=>'<div id="city" class="input-group contact-field-wrap">
              <label>City<b class="asterisk">*</b></label>
              {input}<div class="error-placement">{error}</div>
            </div>'])->dropDownList($city, ['options' => [$user->city => ['Selected'=>'Selected']],'class'=>'form-control abc']); ?>
             
            
<!--             <div class="input-group contact-field-wrap" id="city">
              <label>City<b class="asterisk">*</b></label>
              <select class="form-control">
                <option><?php // $city->name ?></option>
                
              </select>
            </div> /custom-field-wrap-->
               
            
             <?= $form->field($model, 'address', ['template' => '<div class="input-group contact-field-wrap">
              <label>Address</label>
              {input}<div class="error-placement">{error}</div>
            </div>'])->textinput(array('rows'=>3, 'class'=>'form-control abc')); ?>  


            <div class="submit-ad-button-box">
              <!--<a class="btn-submit-ad" href="#">Submit an Ad</a>-->              
              <?= Html::submitButton('Submit', ['class'=> 'btn-submit-ad']) ;?>
              <?= Html::submitButton('Preview', ['class'=> 'btn-submit-ad','onclick'=>'make_perview()' ,'name'=>'preview', 'id'=>'btn_preview']) ;?>
              <div class="tos-box">
                 By clicking "Submit", you accept our <a href="#">Terms of Use and conditions</a>
              </div>
            </div>
            
           </div><!-- /contact-dtl-main-->
  <input type="hidden" name="perview_true" value="0" id="new_record" />
      <?php ActiveForm::end(); ?>
          <div class="col-md-3 col-sm-3 contact-dtl-right">
<!--            <div class="contact-dtl-user-img">
            </div> /contact-dtl-user-img-->
          </div><!-- /contact-dtl-right-->
          
        <!--/form-->
     </section>

      </div>
      </section>
<!-- category_select-->
<div id="category" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" class="modal fade custom-modal custom-modal2">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="col-lg-4 col-md-4 col-sm-4 col-xs-12 modal-title">Categories</h4>
            <h4 class="col-lg-4 col-md-4 col-sm-4 col-xs-12 modal-title example" id="categoryName">Categories Name</h4>
            <h4 class="col-lg-3 col-md-3 col-sm-3 col-xs-12 modal-title example" id="selectCategory">Selected Category</h4>
          </div>
          <div class="category-box-inr">
           
              
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 category-left-list category-list-active main" id="clickCategory">
              <ul id="saved-list">
                  <?php 
                  $a=[];
                  $b=[];
                  foreach($main_cat as $cat){
                      echo '<li class="" id="'.$cat->id.'">'.$cat->title.'<i class="fa fa-angle-right"></i></li>';
                  }
                  ?>
             
              </ul>  
            </div>
              
              
	        <div id="clickSubCategory" >
                            <?php foreach( $main_cat as $scat){ ?>
                          
            <!--------------------------2rd Step Start-------------------------------------------->
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 category-left-list example sub3 sub" id="s<?= $scat->id; ?>">
              <ul> 
                <?php
               
                 $child_cats = \frontend\models\Category::find()->where(['parent_id'=>$scat->id])->all();
                foreach( $child_cats as $scattit){ 
                    
                   $end;
                  $end = \frontend\models\Category::find()->where(['parent_id'=>$scattit->id])->one();
                 if(!isset($end)){
                    $end = "end2";
                 }else{  $end = "no"; 
                 array_push($a, $scattit->id);
                 
                 }
                  ?>
                  
                  <li class="<?= $end ?>" catid="<?= $scattit->id; ?>"  target="sb<?= $scattit->id; ?>"><?= $scattit->title; ?> <?php if( $end == "no"){ ?><i class="fa fa-angle-right"></i><?php } ?></li>
                
                <?php  } ?>
              </ul>  
            </div>
                                
                          <?php  } ?>
            
            <?php foreach( $main_cat as $scat){ ?>
                          
            <!--------------------------2rd Step Start-------------------------------------------->
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 category-left-list example sub3 sub sb ssb" id="sb<?= $scat->id; ?>">
              <ul> 
                <?php
               
                 $child_cats = \frontend\models\Category::find()->where(['parent_id'=>$scat->id])->all();
                foreach( $child_cats as $scattit){ 
                    
                   $end;
                  $end = \frontend\models\Category::find()->where(['parent_id'=>$scattit->id])->one();
                 if(!isset($end)){
                    $end = "end3";
                 }else{  $end = "no"; 
                 array_push($a, $scattit->id);
                 
                 }
                  ?>
                  
                  <li class="<?= $end ?>" catid="<?= $scattit->id; ?>"  target="sb<?= $scattit->id; ?>"><?= $scattit->title; ?> <?php if( $end == "no"){ ?><i class="fa fa-angle-right"></i><?php } ?></li>
                
                <?php  } ?>
              </ul>  
            </div>
                                
                          <?php  } ?>
            
            
                       
                        
                 <!--------------------------2rd Step end-------------------------------------------->    
	
		<!--------------------------3rd Step Start-------------------------------------------->
                
		
            <?php
//            print_r($a);
            foreach($a as $child){
                $schilds = \frontend\models\Category::find()->where(['parent_id'=>$child])->all();
//               echo $child;
                
                ?>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 category-left-list example sub sb ssb" id="sb<?= $child ?>">
                    <ul class="ssb">
            <?php
                foreach($schilds as $schild ){
                        $end;
                  $end = \frontend\models\Category::find()->where(['parent_id'=>$schild->id])->one();
                 if(!isset($end)){
                    $end = "end3";
                 }else{  $end = "no"; 
                 array_push($a, $scattit->id);
                 
                 } ?>
                    <li class="<?= $end ?>" catid="<?= $schild->id; ?>"  target="lst<?= $schild->id; ?>"><?= $schild->title; ?> <?php if( $end == "no"){ ?><i class="fa fa-angle-right"></i><?php } ?></li> 
               <?php } ?>
                    </ul>  
                     </div>                   
           <?php
            }
            ?>       
                
               

            
                
                
 <?php 
              $main_cat_lst = \frontend\models\Category::find()->all();
             foreach( $main_cat_lst as $scat){ ?>
                          
            <!--------------------------2rd Step Start-------------------------------------------->
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 category-left-list example sub3 sub sb ssb lst" id="lst<?= $scat->id; ?>">
              <ul> 
                <?php
               
                 $child_cats = \frontend\models\Category::find()->where(['parent_id'=>$scat->id])->all();
                foreach( $child_cats as $scattit){ 
                   
                  ?>
                  
                  <li catid="<?= $scattit->id; ?>"  target="sb<?= $scattit->id; ?>"><?= $scattit->title; ?></li>
                
                <?php  } ?>
              </ul>  
            </div>
                                
                          <?php  } ?>
                        
            </div>	
         
             
          </div>

        </div>

      </div><!-- /Modal content-->
     
    </div><!-- /Modal -->
   



<!-- Ads Boxes -->
<!--  <div class="ads-vr ads-vr-left">Space Available For Ad</div>
  <div class="ads-vr ads-vr-right">Space Available For Ad</div>-->
<!-- /Ads Boxes -->
</main>
<script>
    var csrfToken = $('meta[name="csrf-token"]').attr("content");

    function select_city(item) {
        $.ajax({
            type: "GET",
            url: "<?php echo Yii::$app->getUrlManager()->createUrl('site/select_city'); ?>",
            data: {
                id: item.value
            },

            success: function(data) {
                document.getElementById("city").innerHTML = data;
            }
        });
    }
    
    
jQuery(document).ready(function($) {

    var text_max = 99;
    $('#textarea_feedback').html(text_max + ' letters remaining');

    $('#advertisements-advertise_title').keyup(function() {
        var text_length = $('#advertisements-advertise_title').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback').html(text_remaining + ' letters remaining');
    });
    
    
    var text_max_des = 4096;
    $('#textarea_description').html(text_max_des + ' letters remaining');

    $('#advertisements-description').keyup(function() {
        var text_length = $('#advertisements-description').val().length;
        var text_remaining = text_max_des - text_length;

        $('#textarea_description').html(text_remaining + ' letters remaining');
    });
    

    $('[data-toggle="popover"]').popover();   

    
    $("#btn_preview").click(function(){        
//        var idString = $( this ).text() + " = " + $( this ).attr( "target" );
        
//        if(idString != '1undefined'){
//            alert("echo");
//        }
            
//    alert(idString);
        $('#w0').attr('target', '_black');
        $('#w0').removeAttr("action");
        $('#w0').attr('action', '<?php echo Yii::$app->getUrlManager()->createUrl('site/submitad_preview'); ?>');
        
//        $('#w0').renameAttr('action', 'test123' );
    });
    

    
    });
    
    function make_perview()
    {
        $('#new_record').val('1');
    }
    
    function img(item){
    alert(item);   
    }
</script>
 