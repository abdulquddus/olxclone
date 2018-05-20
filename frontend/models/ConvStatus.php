<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "conv_status".
 *
 * @property integer $id
 * @property integer $conv_id
 * @property integer $user_id
 * @property integer $status
 */
class ConvStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'conv_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['conv_id', 'user_id', 'status'], 'required'],
            [['conv_id', 'user_id', 'status'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'conv_id' => Yii::t('app', 'Conv ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
