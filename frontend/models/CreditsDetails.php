<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "credits_details".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $credits
 * @property integer $amount_paid
 * @property string $date
 */
class CreditsDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'credits_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount_paid'], 'required'],
            [['id', 'user_id', 'amount_paid'], 'integer'],
             [['credits'], 'string', 'max' => 100],
            [['date', 'user_id', 'amount_paid', 'credits'], 'safe'],
           
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
            'credits' => Yii::t('app', 'Credits'),
            'amount_paid' => Yii::t('app', 'Amount Paid'),
            'date' => Yii::t('app', 'Date'),
        ];
    }
}
