<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "optionalfield_bridge_table".
 *
 * @property integer $id
 * @property integer $optional_field_key
 * @property integer $filter_field_key
 */
class OptionalfieldBridgeTable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'optionalfield_bridge_table';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['optional_field_key', 'filter_field_key'], 'required'],
            [['optional_field_key', 'filter_field_key'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'optional_field_key' => Yii::t('app', 'Optional Field Key'),
            'filter_field_key' => Yii::t('app', 'Filter Field Key'),
        ];
    }
}
