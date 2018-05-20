<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "organization".
 *
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property string $address_line1
 * @property string $address_line2
 * @property string $phone
 * @property string $email
 * @property string $website
 * @property resource $logo
 * @property string $logo_type
 */
class Organization extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organization';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['name', 'alias', 'address_line1', 'logo_type'], 'required'],
	    [['logo'], 'required', 'on'=>'insert'],
	    [['logo'], 'file', 'extensions' => 'jpg, jpeg, gif, png', 'skipOnEmpty' => true, 
'checkExtensionByMimeType'=>false],
            [['logo'], 'string'],
            
            [['name', 'address_line1', 'address_line2'], 'string', 'max' => 255],
            [['alias', 'phone'], 'string', 'max' => 25],
            [['email'], 'string', 'max' => 65],
 	    
            [['website'], 'string', 'max' => 120],
            [['logo_type'], 'string', 'max' => 35],
            [['name'], 'unique'],
            [['alias'], 'unique'],
	    [['email'], 'email'],
	    [['website'], 'url'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'alias' => Yii::t('app', 'Alias'),
            'address_line1' => Yii::t('app', 'Address Line1'),
            'address_line2' => Yii::t('app', 'Address Line2'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'website' => Yii::t('app', 'Website'),
            'logo' => Yii::t('app', 'Logo'),
            'logo_type' => Yii::t('app', 'Logo Type'),
        ];
    }
}
