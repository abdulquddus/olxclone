<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "ads_credit".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $credit
 * @property string $created
 * @property string $status
 */
class AdsCredit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ads_credit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'credit', 'created'], 'required', 'message'=>'Only Number Required'],
            [['user_id', 'credit'], 'integer'],
            [['created'], 'safe'],
            [['status'], 'string']
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
            'credit' => Yii::t('app', 'Credit'),
            'created' => Yii::t('app', 'Created'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
