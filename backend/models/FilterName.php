<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "filter_name".
 *
 * @property integer $id
 * @property string $filter_name
 * @property string $filter_description
 * @property string $filter_value
 * @property integer $parent_filter
 * @property integer $display_for_adpost_page
 * @property integer $display_for_screen_page
 * @property integer $status
 */
class FilterName extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filter_name';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filter_name', 'status'], 'required'],
            [['parent_filter', 'status', 'display_for_adpost_page', 'display_for_screen_page','search_display'], 'integer'],
            [['filter_name'], 'string', 'max' => 255],
            [['filter_description'], 'string', 'max' => 500],
            [['filter_value'], 'string', 'max' => 225],
            ['parent_filter', 'default', 'value' => 0],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filter_name' => 'Filter Name',
            'filter_description' => 'Filter Description',
            'filter_value' => 'Filter Value',
            'parent_filter' => 'Parent Filter',
            'display_for_adpost_page' => 'Display For Adpost Page',
            'display_for_screen_page' => 'Display For Screen Page',
            'status' => 'Status',
            'search_display' => 'Display on Search Resultss'
        ];
    }
    
    
      public function cat_find($id){
        $list = $this->findAll(['parent_filter'=>$id]);
        return $list;
     }
     
     
     
     public function check_child($id){
       $data = $this->find()->where(['parent_filter'=>$id])->one();
       if(isset($data)){
           return ' <a href="#"><span data-element="'.$id.'" class="glyphicon glyphicon glyphicon-arrow-right"></span></a>';
       }else {
            return FALSE;
       }
       
     }
}
