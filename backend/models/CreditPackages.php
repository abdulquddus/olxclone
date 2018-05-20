<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "credit_packages".
 *
 * @property integer $id
 * @property string $name
 * @property double $crdit
 * @property double $price
 */
class CreditPackages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'credit_packages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'crdit', 'price'], 'required'],
            [['id'], 'integer'],
            [['crdit', 'price'], 'number'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'crdit' => 'Crdit',
            'price' => 'Price',
        ];
    }
}
