<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "newsletter".
 *
 * @property integer $id
 * @property string $letter_content
 * @property string $name
 */
class Newsletter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'newsletter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['letter_content', 'name'], 'required'],
            [['letter_content'], 'string', 'max' => 800],
            [['name'], 'string', 'max' => 11]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'letter_content' => 'Letter Content',
            'name' => 'Name',
        ];
    }
}
