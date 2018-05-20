<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "content".
 *
 * @property integer $id
 * @property string $page_name
 * @property string $title
 * @property string $content
 * @property integer $status
 */
class Content extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['title','page_name','status'], 'required'],
            [['status'], 'integer'],
            [['page_name', 'title'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'page_name' => 'Page Name',
            'title' => 'Title',
            'content' => 'Content',
            'status' => 'Status',
        ];
    }
}
