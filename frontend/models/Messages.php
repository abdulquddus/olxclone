<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "messages".
 *
 * @property integer $id
 * @property integer $ad_id
 * @property string $message
 * @property integer $from
 * @property integer $to
 * @property integer $from_viewed
 * @property integer $to_viewed
 * @property integer $from_deleted
 * @property integer $to_deleted
 * @property string $from_vdate
 * @property string $to_vdate
 * @property string $from_ddate
 * @property string $to_ddate
 * @property string $created
 */
class Messages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ad_id', 'message', 'from', 'to', 'created'], 'required'],
            [['ad_id', 'from', 'to', 'from_viewed', 'to_viewed', 'from_deleted', 'to_deleted'], 'integer'],
            [['message'], 'string'],
            [['from_vdate', 'to_vdate', 'from_ddate', 'to_ddate', 'created', 'conv_id'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ad_id' => 'Ad ID',
            'message' => 'Message',
            'from' => 'From',
            'to' => 'To',
            'from_viewed' => 'From Viewed',
            'to_viewed' => 'To Viewed',
            'from_deleted' => 'From Deleted',
            'to_deleted' => 'To Deleted',
            'from_vdate' => 'From Vdate',
            'to_vdate' => 'To Vdate',
            'from_ddate' => 'From Ddate',
            'to_ddate' => 'To Ddate',
            'created' => 'Created',
        ];
    }
}
