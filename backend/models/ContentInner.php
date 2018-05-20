<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "content_inner".
 *
 * @property string $id
 * @property string $title
 * @property string $content
 * @property string $status
 */
class ContentInner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'content_inner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'status', 'system_title'], 'required'],
            [['status'], 'integer'],
            [['title', 'content'], 'string', 'max' => 112],
            [['system_title'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'status' => 'Status',
            'system_title' => 'System Title',
        ];
    }
}