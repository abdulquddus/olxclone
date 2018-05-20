<?php

namespace frontend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "advertisement".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $category_id
 * @property string $advertise_title
 * @property string $photo_name
 * @property string $description
 * @property integer $price
 * @property string $condition
 * @property integer $type
 * @property string $contact_name
 * @property string $email
 * @property integer $mobile_number
 * @property integer $state_id
 * @property integer $city_id
 * @property string $address
 * @property integer $v_code
 * @property integer $status
 * @property string $created_date
 * @property integer $ad_status
 * @property integer $views
 */
class Advertisement extends \yii\db\ActiveRecord
{
     public $imageFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advertisement';
    }

     public static function name($id)
    {
        $title = OptionalFields::find()->where(['id'=>$id])->one();
        echo $title->titles;
         }

    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'category_id', 'advertise_title', 'description', 'price', 'contact_name', 'email', 'mobile_number', 'state_id', 'city_id', 'address', 'status'], 'required'],
            [['user_id', 'category_id', 'price', 'mobile_number', 'state_id', 'city_id', 'status','po_id'], 'integer'],
            [['description', 'address'], 'string'],
            [['views'], 'trim'],
            [['advertise_title', 'photo_name', 'contact_name', 'email'], 'string', 'max' => 120],
//            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            
        ];
    }
    
    
    public function getadcount($id)
    {
      $ids = new Category();
      $ids=$ids->getsubcateides($id);
//      foreach($ids as $get)
      $count = $this->find()->where(['category_id'=>$ids, 'status'=>1])->all();

     $counts = count($count);
      return $counts;
     
    }
    
    
     public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
    
    
    
    
     public function getFormAdditionalValues()
    {
        return $this->hasMany(FormAdditionalValues::className(), ['ad_id' => 'id']);
    }


    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'category_id' => Yii::t('app', 'Category'),
            'advertise_title' => Yii::t('app', 'Advertise Title'),
            'photo_name' => Yii::t('app', 'Photo Name'),
            'description' => Yii::t('app', 'Description'),
            'price' => Yii::t('app', 'Price'),
            'contact_name' => Yii::t('app', 'Contact Name'),
            'email' => Yii::t('app', 'Email'),
            'mobile_number' => Yii::t('app', 'Mobile Number'),
            'state_id' => Yii::t('app', 'State ID'),
            'city_id' => Yii::t('app', 'City ID'),
            'address' => Yii::t('app', 'Address'),
            'po_id' => Yii::t('app', 'Post Code'),
            'status' => Yii::t('app', 'Status'),
            'views' => Yii::t('app', 'Views'),
        ];
    }
}
