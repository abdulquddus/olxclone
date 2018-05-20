<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
//use kartik\file\FileInput;
use backend\models\Category;
use backend\models\User;
use backend\models\City;
use backend\models\Region;
use dosamigos\ckeditor\CKEditor;


/* @var $this yii\web\View */
/* @var $model backend\models\Advertisement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advertisement-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'id'=>'form']]); ?>

    <?php // $form->field($model, 'user_id')->textInput() ?>

    <?php $user=User::find()->all();
    $listData=ArrayHelper::map($user, 'id', 'username');
    echo $form->field($model, 'user_id')->dropDownList(
        $listData,
        ['prompt'=>'Select User'])->label('Select User');

    ?>

    <?php // $form->field($model, 'category_id')->textInput() ?>

    <?php $category=Category::find()->all();
    $listData=ArrayHelper::map($category, 'id', 'title');
    echo $form->field($model, 'category_id')->dropDownList(
        $listData,
        ['prompt'=>'Parent Category'])->label('Select Category');

    ?>


    <?= $form->field($model, 'advertise_title')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'photo_name')->textInput(['maxlength' => true]) ?>
    <?php //echo $form->field($model, 'photo_name')->fileInput() 
    
    ### The below code get the create/update parameter from URL and 
    ##apply if/elseif condition to display image on view and update screen
    
    $url = $_GET['r'];    
    if($url == 'advertisement/create'){
        echo $form->field($model, 'photo_name')->fileInput();
    }
    elseif ($url == 'advertisement/update'){
        $ads_images_record = \backend\models\Images::find()
                ->where(['advertise_id' => $model->id])
                ->all();
        
        $ads_images_count = \backend\models\Images::find()
                ->where(['advertise_id' => $model->id])
                ->orderBy('advertise_id')
                ->count();
        
        for($i=0; $i<$ads_images_count; $i++){
            echo '<img width="180" src= ../uploads/'. $model->id . '/'. $ads_images_record[$i]['image'] . '>';
//        echo $form->field($model, 'photo_name')->fileInput();  ?>  
            <input type="button" onclick="delete_image('<?php echo $ads_images_record[$i]['id']; ?>')" value="delete" class="btn btn-danger" />
            <?php
        }
        
        
    }
    
    ?>

    <?php 
//    echo '<label class="control-label">Add Attachments</label>';
//    echo FileInput::widget([
//    'model' => $model,
//    'attribute' => 'photo_name',
//    'options' => ['multiple' => false]
//
//    ]);

    ?>
    
    

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput()->label('Price in kr') ?>

    <?= $form->field($model, 'contact_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile_number')->textInput() ?>

    <?php // $form->field($model, 'state_id')->textInput() ?>

    <?php $region= \backend\models\Region::find()->all();
    $listData=ArrayHelper::map($region, 'id', 'name');
    echo $form->field($model, 'state_id')->dropDownList(
        $listData,
        ['prompt'=>'Select State'])->label('Select State');

    ?>

    <?php // $form->field($model, 'city_id')->textInput() ?>

    <?php $city=City::find()->all();
    $listData=ArrayHelper::map($city, 'id', 'name');
    echo $form->field($model, 'city_id')->dropDownList(
        $listData,
        ['prompt'=>'Select City'])->label('Select City');

    ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?php // $form->field($model, 'status')->textInput() ?>

    <?php echo $form->field($model, 'status')->dropDownList(['1' => 'Activate', '0' => 'Deactivate', '2'=>'Reject'], ['onchange'=>'if(this.value==2)$("#myModal").modal()']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content" id="modal">
        <div class="modal-header">
          <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
          <!--<h4 class="modal-title">Modal Header</h4>-->
        </div>
          <div class="modal-body" >
      

 
<?= $form->field($notification, 'notification', ['template'=>'<label>Enter your commits</label>{input}{error}{hint}'])->widget(CKEditor::className(), [
        'options' => ['rows' => 6,'id'=>'noti'],
        'preset' => 'basic',
        
    ]) ?>
            <?= $form->field($model, 'user_id')->textInput(['rows' => 6, 'id'=>'user', 'class'=>'hidden']) ?>

        <?= Html::checkbox('agree', true, ['label' => 'Bad Content']); ?>
        <?= Html::checkbox('agree', true, ['label' => 'Bad Images']); ?>
        <?= Html::checkbox('agree', true, ['label' => 'Policy issue']); ?>
        </div>
        <div class="modal-footer">
            <?= Html::button('Update!', ['class' => 'btn btn-primary', 'onClick'=>'submit()']) ?>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
function submit() {
//    alert('hello');
//    document.getElementById("form").submit();
// document.getElementById("modal").innerHTML = '<br /><img style="position: relative" width="10px" width="10px" src="../../backend/web/uploads/' + data + '" class="img-responsive">';
    var user =document.getElementById("user").value;
//    var noti =document.getElementsByName("notification").value;
    var noti =document.getElementById("noti").value;
 
    $.ajax({ //create an ajax request to load_page.php
        type: "POST",

        url: "<?php echo Yii::$app->getUrlManager()->createUrl('advertisement/noti'); ?>",
        data: {
            user_id: user, noti:noti
        },

        dataType: "JSON", //expect html to be returned                
        success: function(response) {
       document.getElementById("form").submit();
       
        }
    });


}
</script>
<script>
      
       function delete_image(id)
{
$.ajax({
            
         
      type: "GET",
  url: "<?php echo Yii::$app->getUrlManager()->createUrl('advertisement/delete-image'); ?>",
  data: { id: id },
                          
success: function(data){
 //alert(data);
       location.reload();
//document.getElementById("city").innerHTML = data;
      }
    });
}
    </script>