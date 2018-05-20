<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "optional_fields".
 *
 * @property integer $id
 * @property string $titles
 * @property string $desc
 * @property integer $display_for_adpost_page
 * @property string $opk
 * @property integer $display_for_screen_page
 * @property integer $status
 */
class OptionalFields extends \yii\db\ActiveRecord
{
    public $opk;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'optional_fields';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['opk'], 'safe'],
            [['display_for_adpost_page', 'display_for_screen_page', 'status'], 'integer'],
            [['titles'], 'required'],
            [['titles'], 'string', 'max' => 100],
            [['desc'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titles' => 'Titles',
            'desc' => 'Desc',
            'display_for_adpost_page' => 'Display For Adpost Page',
            'display_for_screen_page' => 'Display For Screen Page',
            'status' => 'Status',
            'opk' => 'OPK'
        ];
    }
    
    public function custom_update($id, $fields){
        
        $delete_additioanl_fields = "DELETE FROM `optionalfield_bridge_table` WHERE `optional_field_key`=$id";
        \Yii::$app->db->createCommand($delete_additioanl_fields)->execute();
        
//        print_r($fields);
//        exit();
        
        
            foreach ($fields as $opfields)
            {
                $sql="INSERT INTO `optionalfield_bridge_table` (`optional_field_key`, `filter_field_key`)VALUES ($id, $opfields)";
                \Yii::$app->db->createCommand($sql)->execute();
            }
    }
}
