<?php

namespace frontend\models;

use Yii;
use frontend\models\User;
use frontend\models\Advertisement;
use frontend\models\Messages;

/**
 * This is the model class for table "conversation".
 *
 * @property integer $id
 * @property integer $ad_id
 * @property integer $from
 * @property integer $to
 */
class Conversation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'conversation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ad_id', 'from', 'to'], 'required'],
            [['ad_id', 'from', 'to'], 'integer']
        ];
    }
    
    
    public function get_name($id){ 
        
        $name = user::findOne($id);
        return $name['username'];
    }
     public function ad_name($id){
        $ad = Advertisement::findOne($id);
        return $ad['advertise_title'];
    }
    
    public function last_message_date($id){
        $date = Messages::find()->where(['conv_id'=>$id])->orderBy(['id'=> SORT_DESC])->one();
        return $date->created;
    }
    public function ad_created_date($id){
      $date = Advertisement::find()->where(['id'=>$id])->one();
//        $date = Messages::find()->where(['conv_id'=>$id])->orderBy(['id'=> SORT_DESC])->one();
        return $date['created_date'];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ad_id' => Yii::t('app', 'Ad ID'),
            'from' => Yii::t('app', 'From'),
            'to' => Yii::t('app', 'To'),
        ];
    }
}
