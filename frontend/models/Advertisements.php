<?php

namespace frontend\models;

use Yii;
use yii\web\UploadedFile;
use yii\helpers\BaseFileHelper;

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
 * @property string $contact_name
 * @property string $email
 * @property string $mobile_number
 * @property string $state_id
 * @property string $city_id
 * @property string $address
 * @property integer $v_code
 * @property integer $status
 */
class Advertisements extends \yii\db\ActiveRecord
{
    public $imageFiles;
//     public $v_code;
     public $additional_field;
     public  $img=[];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advertisement';
    }

    /**
     * @inheritdoc
     */
//    public function rules()
//    {
//        return [
//            [['user_id', 'category_id', 'advertise_title', 'photo_name', 'description', 'price', 'contact_name', 'email', 'mobile_number', 'state_id', 'city_id', 'address', 'v_code', 'status'], 'required'],
//            [['user_id', 'category_id', 'price', 'v_code', 'status'], 'integer'],
//            [['description', 'address'], 'string'],
//            [['advertise_title', 'contact_name', 'email'], 'string', 'max' => 45],
//            [['photo_name', 'mobile_number', 'state_id', 'city_id'], 'string', 'max' => 100]
//        ];
//    }

     public function rules()
    {
        return [
            [['category_id', 'advertise_title', 'description', 'price', 'mobile_number', 'state_id', 'contact_name',], 'required'],
            [['category_id', 'state_id', 'mobile_number', 'state_id', 'city_id'], 'integer'],
            [['price'],'number'],
            [['description'], 'string'],
            [['additional_field', 'sold_status', 'com_url', 'link'], 'safe'],
            [['user_id', 'category_id', 'advertise_title', 'photo_name', 'description', 'price', 'mobile_number', 'state_id', 'city_id', 'address', 'v_code', 'condition'], 'safe'],
//          [['advertise_title', 'photo_name', 'contact_name', 'email'], 'string', 'max' => 45],
            [['imageFiles'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 8]
//          [['year'], 'date', 'format' => 'yyyy-M-d'],
            
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'advertise_title' => Yii::t('app', 'Advertise Title'),
            'photo_name' => Yii::t('app', 'Photo Name'),
            'description' => Yii::t('app', 'Description'),
            'price' => Yii::t('app', 'Price'),
            'contact_name' => Yii::t('app', 'Contact Name'),
            'email' => Yii::t('app', 'Email'),
            'mobile_number' => Yii::t('app', 'Mobile Number'),
            'state_id' => Yii::t('app', 'State'),
            'city_id' => Yii::t('app', 'City'),
            'address' => Yii::t('app', 'Address'),
            'v_code' => Yii::t('app', 'V Code'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
    
     public function upload()
    {
        if ($this->validate()) {
           
            BaseFileHelper::createDirectory('uploads/'.$this->id);
            
             foreach ($this->imageFiles as $file) {
                $file->saveAs('uploads/' .$this->id.'/'.$file->baseName.'.' . $file->extension);
                $image = new Images();
                $image->advertise_id = $this->id;
                $image->image = $file->baseName.'.'.$file->extension ;
                $image->save();
               
            }

            return true;
        } else {
            return false;
        }
    }
    
     public function uploadtmp()
    {
        if ($this->validate()) {
           
            BaseFileHelper::createDirectory('uploadstmp/'.$this->id);
            
          
             foreach ($this->imageFiles as $file) {
                $file->saveAs('uploadstmp/'.$file->baseName.'.' . $file->extension);
//              $image = new Images();
               
                $this->img = $file->baseName.'.'.$file->extension ;
               
               
            }

            return true;
        } else {
            return false;
        }
    }
    
}
