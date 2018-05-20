<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "commercial_search_ads".
 *
 * @property integer $id
 * @property string $title
 * @property integer $category_id
 * @property string $url
 * @property integer $image
 * @property integer $notes
 * @property integer $user_id
 */
class CommercialSearchAds extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'commercial_search_ads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'category_id', 'user_id','image'], 'required'],
            [['image'], 'required', 'on'=>'insert'],
            [['image'], 'file', 'extensions' => 'jpg, jpeg, gif, png', 'skipOnEmpty' => true, 
                    'checkExtensionByMimeType'=>false],
            [['image'], 'string'],
            [['image_type'], 'string', 'max' => 35],
            [['category_id', 'notes', 'user_id','status'], 'integer'],
            [['title'], 'string', 'max' => 255],
	     [['url'], 'url'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'category_id' => Yii::t('app', 'Category ID'),
            'url' => Yii::t('app', 'URL'),
            'image' => Yii::t('app', 'Image'),
            'notes' => Yii::t('app', 'Notes'),
	    'image_type' => Yii::t('app', 'Image Type'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }
}
