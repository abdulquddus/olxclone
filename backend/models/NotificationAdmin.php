<?php

namespace backend\models;
use yii\helpers\Url;

use Yii;

/**
 * This is the model class for table "notification_admin".
 *
 * @property integer $id
 * @property string $description
 * @property string $date
 * @property integer $status
 */
class NotificationAdmin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notification_admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'date', 'status'], 'required'],
            [['date'], 'safe'],
            [['status'], 'integer'],
            [['description'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'description' => Yii::t('app', 'Description'),
            'date' => Yii::t('app', 'Date'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function usercreated($user)
    {
        Url::base('https');
       $url = Url::base('http')."/admin/index.php?r=user%2Fupdate&id=$user";
        $this->date = date("Y-m-d H:i:s");
        $this->description = "Registered new user $url";
        $this->status = 1;
        if($this->save()){  return TRUE;  }
        
    }
    
    
    
    
}
