<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category_images".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $image
 */
class CategoryImages extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id'], 'integer'],
            //[['image'], 'string', 'max' => 45]
            #[['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => self::SCENARIO_CREATE],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'image' => Yii::t('app', 'Upload Image'),
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            //print_r();exit;
            //$this->image->saveAs('uploads/'.$this->image->tempName);
            
            $image_code = rand(1123123123123120,100);
            $this->image->saveAs('uploads/' . $image_code . $this->image->baseName . '.' . $this->image->extension);
            return;
        } else {
            return false;
        }
    }
}
