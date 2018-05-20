<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property integer $id
 * @property integer $advertise_id
 * @property string $image
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['advertise_id'], 'integer'],
            //[['image'], 'string', 'max' => 45]
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'advertise_id' => Yii::t('app', 'Advertise ID'),
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
