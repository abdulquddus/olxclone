<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notifications".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $notification
 */
class Notifications extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notifications';
    }
    
    
    
    
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'notification'], 'required'],
            [['user_id'], 'integer'],
            [['notification'], 'string', 'max' => 200]
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
            'notification' => Yii::t('app', 'Notification'),
        ];
    }
}
