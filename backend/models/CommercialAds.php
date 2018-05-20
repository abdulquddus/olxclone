<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;
use yii\helpers\BaseFileHelper;

/**
 * This is the model class for table "commercial_ads".
 *
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property string $top_ad
 * @property string $left_ad
 * @property string $right_ad
 * @property string $centre_ad
 * @property string $bottom_ad
 */
class CommercialAds extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'commercial_ads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'url'], 'required'],
            [['category_id'], 'integer'],
            [['name', 'url', 'top_ad_url', 'left_ad_url', 'right_ad_url', 'centre_ad_url', 'bottom_ad_url'], 'string', 'max' => 200],
            [['top_ad', 'left_ad', 'right_ad', 'centre_ad', 'bottom_ad'], 'file', 'skipOnEmpty' => True, 'extensions' => 'png, jpg', 'on' => self::SCENARIO_CREATE],
            [['top_ad', 'left_ad', 'right_ad', 'centre_ad', 'bottom_ad'], 'file', 'skipOnEmpty' => True, 'extensions' => 'png, jpg', 'on' => self::SCENARIO_UPDATE],
            ['category_id', 'default', 'value' => 0]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'url' => 'Url',
            'top_ad' => 'Top Ad (845 X 119)',
            'left_ad' => 'Left Ad (149 X 598 Vertical)',
            'right_ad' => 'Right Ad (149 X 598 Vertical)',
            'centre_ad' => 'Centre Ad',
            'bottom_ad' => 'Bottom Ad',
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            //print_r();exit;
            //$this->image->saveAs('uploads/'.$this->image->tempName);

            //$image_code = rand(1123123123123120,100);

            

           //Replacing Spaces with Underscores in image's filename in folder
            
          if(isset($this->top_ad->baseName))  $top_ad_image = str_replace(' ', '_', $this->top_ad->baseName);
          if(isset($this->left_ad->baseName))  $left_ad_image = str_replace(' ', '_', $this->left_ad->baseName);
          if(isset($this->right_ad->baseName))  $right_ad_image = str_replace(' ', '_', $this->right_ad->baseName);
           if(isset($this->centre_ad->baseName)) $centre_ad_image = str_replace(' ', '_', $this->centre_ad->baseName);
          if(isset($this->bottom_ad->baseName))  $centre_ad_image = str_replace(' ', '_', $this->bottom_ad->baseName);
            
//            echo $this->top_ad;
//            echo $this->left_ad;
//            echo $this->right_ad;
//            echo $this->centre_ad;
//            echo $this->bottom_ad;
//            exit();
           if(isset($this->top_ad->baseName)) $this->top_ad->saveAs('uploads/' . $top_ad_image . '.' . $this->top_ad->extension);
           if(isset($this->left_ad->baseName)) $this->left_ad->saveAs('uploads/' . $left_ad_image . '.' . $this->left_ad->extension);
           if(isset($this->right_ad->baseName)) $this->right_ad->saveAs('uploads/' . $right_ad_image . '.' . $this->right_ad->extension);
           if(isset($this->centre_ad->baseName)) $this->centre_ad->saveAs('uploads/' . $centre_ad_image . '.' . $this->centre_ad->extension);
           if(isset($this->bottom_ad->baseName)) $this->bottom_ad->saveAs('uploads/' . $centre_ad_image . '.' . $this->bottom_ad->extension);
     
            

//            $this->top_ad->saveAs('uploads/' . $top_ad_image . '.' . $this->top_ad->extension);
//            $this->left_ad->saveAs('uploads/' . $left_ad_image . '.' . $this->left_ad->extension);
//            $this->right_ad->saveAs('uploads/' . $right_ad_image . '.' . $this->right_ad->extension);
//            $this->centre_ad->saveAs('uploads/' . $centre_ad_image . '.' . $this->centre_ad->extension);
//            $this->bottom_ad->saveAs('uploads/' . $bottom_ad_image . '.' . $this->bottom_ad->extension);

//          if(isset( $this->top_ad))  $top_ad_image = str_replace(' ', '_', $this->top_ad->baseName);
//          if(isset($this->left_ad))  $left_ad_image = str_replace(' ', '_', $this->left_ad->baseName);
//          if(isset($this->right_ad))  $right_ad_image = str_replace(' ', '_', $this->right_ad->baseName);
//          if(isset($this->centre_ad))  $centre_ad_image = str_replace(' ', '_', $this->centre_ad->baseName);
//          if(isset($this->bottom_ad))   $bottom_ad_image = str_replace(' ', '_', $this->bottom_ad->baseName);
//
//          if(isset($this->top_ad))  $this->top_ad->saveAs('uploads/' . $top_ad_image . '.' . $this->top_ad->extension);
//          if(isset($this->left_ad))  $this->left_ad->saveAs('uploads/' . $left_ad_image . '.' . $this->left_ad->extension);
//          if(isset($this->right_ad))  $this->right_ad->saveAs('uploads/' . $right_ad_image . '.' . $this->right_ad->extension);
//          if(isset($this->centre_ad))  $this->centre_ad->saveAs('uploads/' . $centre_ad_image . '.' . $this->centre_ad->extension);
//          if(isset($this->bottom_ad))   $this->bottom_ad->saveAs('uploads/' . $bottom_ad_image . '.' . $this->bottom_ad->extension);

            
            return;
        } else {
            return false;
        }
    }
}
