<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Category;

/* @var $this yii\web\View */
/* @var $model backend\models\CommercialAds */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="commercial-ads-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']] ); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?php $category=Category::find()->all();
    $listData=ArrayHelper::map($category, 'id', 'title');
    echo $form->field($model, 'category_id')->dropDownList(
        $listData,
        ['prompt'=>'Parent Category'])->label('Select Category');
    //['prompt' => ])->['label' => 'Please Choose', 'class' => 'drop-down-prompt', 'value' => '-1'];

    ?>

    <?php

    ### The below code get the create/update parameter from URL and
    ##apply if/elseif condition to display image on view and update screen

    $url = $_GET['r'];
    if($url == 'commercial-ads/create'){
        echo $form->field($model, 'top_ad')->fileInput();
        echo $form->field($model, 'top_ad_url')->textInput(['maxlength' => true]);
    }
    elseif ($url == 'commercial-ads/update'){
        $image_trim_name = str_replace(' ', '_', $model->top_ad);
        echo '<img width="180" src= ' . Yii::$app->request->baseUrl.'/uploads/'.$image_trim_name . '>';
        echo $form->field($model, 'top_ad')->fileInput();
    }
    ?>

    <?php //$form->field($model, 'left_ad')->fileInput(); ?>

    <?php

    ### The below code get the create/update parameter from URL and
    ##apply if/elseif condition to display image on view and update screen

    $url = $_GET['r'];
    if($url == 'commercial-ads/create'){
        echo $form->field($model, 'left_ad')->fileInput();
        echo $form->field($model, 'left_ad_url')->textInput(['maxlength' => true]);
    }
    elseif ($url == 'commercial-ads/update'){
        $image_trim_name = str_replace(' ', '_', $model->left_ad);
        echo '<img width="180" src= ' . Yii::$app->request->baseUrl.'/uploads/'.$image_trim_name . '>';
        echo $form->field($model, 'left_ad')->fileInput();
    }
    ?>

    <?php // $form->field($model, 'right_ad')->fileInput(); ?>

    <?php

    ### The below code get the create/update parameter from URL and
    ##apply if/elseif condition to display image on view and update screen

    $url = $_GET['r'];
    if($url == 'commercial-ads/create'){
        echo $form->field($model, 'right_ad')->fileInput();
        echo $form->field($model, 'right_ad_url')->textInput(['maxlength' => true]);
    }
    elseif ($url == 'commercial-ads/update'){
        $image_trim_name = str_replace(' ', '_', $model->right_ad);
        echo '<img width="180" src= ' . Yii::$app->request->baseUrl.'/uploads/'.$image_trim_name . '>';
        echo $form->field($model, 'right_ad')->fileInput();
    }
    ?>

    <?php // $form->field($model, 'centre_ad')->fileInput(); ?>

    <?php

    ### The below code get the create/update parameter from URL and
    ##apply if/elseif condition to display image on view and update screen

    $url = $_GET['r'];
    if($url == 'commercial-ads/create'){
        echo $form->field($model, 'centre_ad')->fileInput();
        echo $form->field($model, 'centre_ad_url')->textInput(['maxlength' => true]);
    }
    elseif ($url == 'commercial-ads/update'){
        $image_trim_name = str_replace(' ', '_', $model->centre_ad);
        echo '<img width="180" src= ' . Yii::$app->request->baseUrl.'/uploads/'.$image_trim_name . '>';
        echo $form->field($model, 'centre_ad')->fileInput();
    }
    ?>

    <?php // $form->field($model, 'bottom_ad')->fileInput(); ?>

    <?php

    ### The below code get the create/update parameter from URL and
    ##apply if/elseif condition to display image on view and update screen

    $url = $_GET['r'];
    if($url == 'commercial-ads/create'){
        echo $form->field($model, 'bottom_ad')->fileInput();
        echo $form->field($model, 'bottom_ad_url')->textInput(['maxlength' => true]);
    }
    elseif ($url == 'commercial-ads/update'){
        $image_trim_name = str_replace(' ', '_', $model->bottom_ad);
        echo '<img width="180" src= ' . Yii::$app->request->baseUrl.'/uploads/'.$image_trim_name . '>';
        echo $form->field($model, 'bottom_ad')->fileInput();
    }
    ?>

    <?php //echo $form->field($model, 'status')->dropDownList(['1' => 'Activate', '0' => 'Deactivate']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
