<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<?php   

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
//use kartik\widgets\FileInput;
use backend\models\Category;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']] ); ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    
    <?php
    
    ### The below code get the create/update parameter from URL and 
    ##apply if/elseif condition to display image on view and update screen
    
    $url = $_GET['r'];    
    if($url == 'category/create'){
        echo $form->field($model, 'image')->fileInput();
    }
    elseif ($url == 'category/update'){
        echo "<img width='180' src='" . Yii::$app->request->BaseUrl.'/uploads/'.$model->image . "'>";
        echo $form->field($model, 'image')->fileInput();    
    }
    
    ?>  


    <?php 
//    echo '<label class="control-label">Add Attachments</label>';
//    echo FileInput::widget([
//    'model' => $model,
//    'attribute' => 'image',
//    'options' => ['multiple' => false]
//
//    ]);

    ?>

    <?php //$form->field($model, 'parent_id')->textInput() ?>

    <?php $category=Category::find()->all();
    $listData=ArrayHelper::map($category, 'id', 'title');
    echo $form->field($model, 'parent_id')->dropDownList(
        $listData,
        ['prompt'=>'Parent Category'])->label('Select Category');
        //['prompt' => ])->['label' => 'Please Choose', 'class' => 'drop-down-prompt', 'value' => '-1'];

    ?>    
	
	 <?php 
         $options=  array();
         if (!empty($caf)){
        foreach($caf as $cafs){
            $options[]=$cafs['optional_field_id'];
            
           // $options[$cafs['optional_field_id']]=array('selected'=>true);
//            exit();
         
            
        
         }
         //print_r($options);
  $Category_id = $_GET['id'];
  
  $category_additional_fields = backend\models\CategoryAdditionalFields::find()->select('optional_field_id')->where(['category_id'=>$Category_id])->distinct()->all();
  $Array_optional = array_map('current', $category_additional_fields);
  
  foreach ($Array_optional as $value) {
      $label_name = backend\models\FilterName::find()->where(['parent_filter'=>0, 'id'=>$value])->distinct()->all();      
      
  }
  
//        echo "<pre>";
//        print_r($label_name['0']['filter_name']);
//        echo "</pre>";
//        exit();
  
  
  
  $optionalfield= backend\models\FilterName::find()->where(['parent_filter'=>0])->all();
  $listData1=ArrayHelper::map($optionalfield, 'id', 'filter_value');   
  
   $selectedvalues = backend\models\CategoryAdditionalFields::find()->where(['category_id'=>$Category_id])->all();
//   $selectedlist = ArrayHelper::map($selectedvalues, 'id');  
//            print_r($selectedlist);
            $selectedoptions;
            foreach($selectedvalues as $cafs){
            $selectedoptions[]=$cafs['optional_field_id'];
           
         }
//         print_r($selectedoptions);
    //$data = [$cafs['titles']];
// without model
    echo '<label class="control-label">Additional Fields</label>';
    echo Select2::widget([
       'name' => 'additionalfields[]',
        
       'value' => $selectedoptions, // value to initialize
//        'value' => [1, 2],
        'data' => $listData1,
        'options' => [ 
                  'multiple' => true ,
                'onchange' => "subs(this.value)",
//            'onchange' => "subs(this.value)",
        //'options'=>$options,
         ],
    ]);
    
    //--------------------------------------------------------------------//
    
//    echo '<label class="control-label">Second Options</label>';
//    echo Select2::widget([
//       'name' => 'dropdown_option_fields[]',
//       //'value' => $options, // value to initialize
//       'data' => $listData,
//        'options' => [ 
//                  'multiple' => true ,
//        //'options'=>$options,
//         ],
//    ]);

   # }
         }
    else{ // Dropdown that appears on Create page         
        $optionalfield= backend\models\FilterName::find()->where(['parent_filter'=>0])->all();
        $listData=ArrayHelper::map($optionalfield, 'id', 'filter_value');
       
        echo '<label class="control-label">Additional Fields</label>'; 
        echo Select2::widget([
        'name' => 'additionalfields[]',
        'data' => $listData,
        'options' => [ 
            'placeholder' => 'Select Optional Fields ...',
            'id' => 'options',
           // 'onchange' => "subs(this.value)",
            'multiple' => true  
         ],    
         ]);
        
    //Second Select2
//        echo '<label class="control-label">Second Options</label>'; 
//        echo Select2::widget([
//        'name' => 'dropdown_option_fields[]',
//        'data' => null,
//        'options' => [ 
//            'placeholder' => 'Select Optional Fields ...',
//            'id' => 'options2',
//            'multiple' => true  
//         ],
//         ]);    
    }
   ?>
   
   <?php
        
   
   ?>
   
    
    <?php // $form->field($model, 'status')->textInput() ?>
   
   <?= $form->field($model, 'credits')->textInput(['type' => 'number','min'=>0,'max'=>100]) ?>

    <?php echo $form->field($model, 'status')->dropDownList(['1' => 'Activate', '0' => 'Deactivate']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>

    function subs(id){
        var dd_id = id;        
        /*-----------------------------(FIRST AJAX CALL)-----------------------------*/
        //AJAX request to get the filter label from database
        $.ajax({
        type: "GET",
        dataType : "json",
        url: "<?php echo Yii::$app->getUrlManager()->createUrl('category/dd_options'); ?>",
        data: 
		{
            id: dd_id
		},

        success: function(response) {
            
            
            var second_option_label = '';
            var second_options = '';
            
            console.log(response.length);
            //alert("in function....  " + dd_id);
            
            var select = document.getElementById("options2");
            document.getElementById("options2").options.length = 0;
            
            //select.empty();
            for (i = 0; i < response.length; i++) {
                alert(response[i]["filter_name"]);
                select.options[select.options.length] = new Option(response[i]["filter_name"], response[i]["id"]);
            }            
        }});
        
              
    }
    
    
jQuery(document).ready(function($) { 
    
    $( "#options2" ).click(function() { 
        
        alert("In Jqeury");
        $("select").select2('val', '')
    });    

});

</script>
