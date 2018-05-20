<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "credits_expense".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $ad_id
 * @property integer $credit_exp
 * @property string $date
 */
class CreditsExpense extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'credits_expense';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date'], 'required'],
            [['user_id', 'ad_id', 'credit_exp','status'], 'integer'],
            [['date'], 'safe']
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
            'ad_id' => Yii::t('app', 'Ad ID'),
            'credit_exp' => Yii::t('app', 'Credit Exp'),
            'date' => Yii::t('app', 'Date'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
}
