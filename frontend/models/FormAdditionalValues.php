<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "form_additional_values".
 *
 * @property integer $id
 * @property integer $ad_id
 * @property integer $field_id
 * @property string $values
 */
class FormAdditionalValues extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form_additional_values';
    }

    public function getAdvertisement()
    {
        return $this->hasOne(Advertisement::className(), ['id' => 'ad_id']);
    }
    
    
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ad_id', 'field_id', 'values'], 'required'],
            [['ad_id', 'field_id'], 'integer'],
            [['values'], 'string', 'max' => 110]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ad_id' => Yii::t('app', 'Ad ID'),
            'field_id' => Yii::t('app', 'Field ID'),
            'values' => Yii::t('app', 'Values'),
        ];
    }
}
