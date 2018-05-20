<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category_additional_fields".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $optional_field_id
 */
class CategoryAdditionalFields extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category_additional_fields';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'optional_field_id'], 'required'],
            [['category_id', 'optional_field_id'], 'integer']
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
            'optional_field_id' => Yii::t('app', 'Optional Field ID'),
        ];
    }
}
