<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NewsletterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Newsletters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newsletter-index">

    <div class="container">
<!--  <h2>Modal Example</h2>-->
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">Send Newsletters</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
     <?php $form = ActiveForm::begin(['action'=>['newsletter/mail'],'method'=>'post']); ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Select Newsletter</h4>
        </div>
          
        <div class="modal-body">
          
          <?= Html::activeDropDownList($newsletters,  'name', ArrayHelper::map(\backend\models\Newsletter::find()->all(), 'id', 'name'), ['class'=>'form-control', 'name'=>'letter']); ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-default"  value="submit">
          
        </div>
      </div>
      </form>
    </div>
  </div>
  
  
  
</div>

 
    
    
    
    
</div>
