<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "newsletter_subscription".
 *
 * @property integer $id
 * @property string $email
 * @property integer $status
 * @property string $key
 */
class NewsletterSubscription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'newsletter_subscription';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
          //  [['key'], 'required'],
            [['email'], 'string', 'max' => 200],
            [['key'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'status' => 'Status',
            'key' => 'Key',
        ];
    }
}
