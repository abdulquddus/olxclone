<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\OptionalFields */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="optional-fields-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titles')->textInput(['maxlength' => true]) ?>
   
    <?= $form->field($model, 'desc')->textInput(['maxlength' => true])->textarea()->label('Description For Admin')?>

    <?= $form->field($model, 'display_for_adpost_page')->dropDownList(['1' => 'Dropdown - ID1', '2' => 'Chcekbox - ID2', '3' => 'Textbox - Numbers- ID3', '4' => 'Textbox - Value - ID4', '5' => 'Range - ID5'], ['onchange'=>'custom_validation()']);  ?>

    <?php
    $options=  array();
//    if (!empty($caf))
//    {
//        foreach($caf as $cafs){
//        $options[]=$cafs['filter_name'];
//        }

    $FilterName= backend\models\FilterName::find()->where(["parent_filter" => 0, "status" => 1])->all();
    $listData=ArrayHelper::map($FilterName, 'id', 'filter_name');
    
$preselected = backend\models\OptionalfieldBridgeTable::find()->where(['optional_field_key'=>$model->id])->all();
     $preData=ArrayHelper::getColumn($preselected,  'filter_field_key');
//     echo "<pre>";
//     print_r($preData);
//     echo "</pre>";
//    
    echo '<label class="control-label">Dropdown Fields</label>'; 
    echo Select2::widget([
        'name' => 'OptionalFields[opk]',
        'value' => $preData, // value to initialize
        'data' => $listData,
        'options' => [ 
        'multiple' => true ,
        
//        'options'=>$options,
        ],
        ]);
//    }
//    else{//when record is inserted.
//        $FilterName= backend\models\FilterName::find()->where(["parent_filter" => 0, "status" => 1])->all();
//        $listData=ArrayHelper::map($FilterName, 'id', 'filter_name');
//        
//        echo '<label class="control-label">Dropdown Fields</label>'; 
//        echo Select2::widget([
//        'name' => 'OptionalFields[opk]',
//        'data' => $listData,
//        'options' => [ 
//            'placeholder' => 'Select dropdown options ...',
//          
//            'multiple' => true  ],
//        ]);
//    }
    ?>

    <?= $form->field($model, 'status')->dropDownList(['1' => 'Activate', '0' => 'Deactivate']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">
//    var option_val = document.getElementById("optionalfields-display_for_adpost_page").value;
//    if (option_val == "3" | option_val == "4") 
//    {
//        document.getElementById("optionalfields-dd_options").value = "NA";
//        document.getElementById("optionalfields-dd_options").readOnly = true;
//    }
//    function custom_validation() {
//        var option_val = document.getElementById("optionalfields-display_for_adpost_page").value;	
//        if (option_val == "3" | option_val == "4") 
//        {
//            document.getElementById("optionalfields-dd_options").value = "NA";
//            document.getElementById("optionalfields-dd_options").readOnly = true;
//            //document.getElementById("optionalfields-dd_options").disabled = true;
//        }
//        else
//        {
//            document.getElementById("optionalfields-dd_options").readOnly = false;
//            //document.getElementById("optionalfields-dd_options").disabled = false;
//        }
//    }
//    
//    function create_dropdown(){
//        var dd_values_comma = document.getElementById("optionalfields-dd_options").value.toString();
//		var dd = document.getElementById("dropdown");
//		
//		var i;
//		for(i = dd.options.length - 1 ; i >= 0 ; i--){
//			dd.remove(i);
//		}
//		
//        var dd_values_comma1 = dd_values_comma.split(",")
//        for(var i = 0; i< dd_values_comma1.length; i++){
//            dd.innerHTML += '<option value="'+dd_values_comma1[i]+'">'+dd_values_comma1[i]+'</option>';
//        }
//    }
</script>