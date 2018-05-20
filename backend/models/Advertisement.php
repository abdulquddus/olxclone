<?php

namespace backend\models;

use Yii;

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
 * @property integer $mobile_number
 * @property integer $state_id
 * @property integer $city_id
 * @property string $address
 * @property integer $status
 */
class Advertisement extends \yii\db\ActiveRecord
{
    
     public function getUser()
{
    return $this->hasOne(\frontend\models\User::className(), ['id' => 'user_id'])->from(['user' => 'user']);
}

 public function getCategory()
{
    return $this->hasOne(\frontend\models\Category::className(), ['id' => 'category_id'])->from(['category' => 'category']);
}
    const SCENARIO_CREATE = 'create';
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
    public function rules()
    {
        return [
            [['user_id', 'category_id', 'advertise_title','description', 'price', 'contact_name', 'email', 'mobile_number', 'state_id', 'city_id', 'address', 'status'], 'required'],
            #[['photo_name'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['photo_name'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => self::SCENARIO_CREATE],
            [['user_id', 'category_id', 'price', 'mobile_number', 'state_id', 'city_id', 'status'], 'integer'],
            [['description', 'address'], 'string'],
            [['advertise_title',], 'string', 'max' => 200],
            [['contact_name', 'email'], 'string', 'max' => 45],
            [['user_id', 'category_id', 'advertise_title', 'photo_name', 'description', 'price', 'contact_name', 'mobile_number', 'state_id', 'city_id', 'address', 'v_code'], 'safe']
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
            'photo_name' => Yii::t('app', 'Upload Image'),
            'description' => Yii::t('app', 'Description'),
            'price' => Yii::t('app', 'Price'),
            'contact_name' => Yii::t('app', 'Contact Name'),
            'email' => Yii::t('app', 'Email'),
            'mobile_number' => Yii::t('app', 'Mobile Number'),
            'state_id' => Yii::t('app', 'State ID'),
            'city_id' => Yii::t('app', 'City ID'),
            'address' => Yii::t('app', 'Address'),
            'v_code' => Yii::t('app','V Code'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
    
    
      
    
    public function upload()
    {
        if ($this->validate()) {
            
            $image_code = rand(1123123123123120,100);
            $this->photo_name->saveAs('uploads/' . $image_code . $this->photo_name->baseName . '.' . $this->photo_name->extension);
            return;
        } 
        else 
        {
            return false;
        }
    }
}
