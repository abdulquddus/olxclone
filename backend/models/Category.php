<?php

namespace backend\models;


use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $title
 * @property string $image
 * @property string $description
 * @property integer $parent_id
 * @property integer $status
 */
class Category extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }
    
//    public function getParent()
//{
//    return $this->hasOne(Category::className(), ['id' => 'parent_id'])->from(['cat' => 'category']);
//}

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'status', 'credits'], 'integer'],
            [['title', 'status','credits'], 'required'],
            //[['image'], 'string', 'max' => 45],
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'on' => self::SCENARIO_CREATE],
            [['description'], 'string', 'max' => 55],
            ['parent_id', 'default', 'value' => 0]
        ];
    }

    /**
     * @inheritdoc
     */
    
    
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'image' => Yii::t('app', 'Upload Image'),
            'description' => Yii::t('app', 'Description'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'credits' => Yii::t('app', 'Credits'),
            'parent' => Yii::t('app', 'Parent Category'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
    
    
     public function cat_find($id){
        $list = $this->findAll(['parent_id'=>$id]);
        return $list;
     }
     
     
     
     public function check_child($id){
       $data = $this->find()->where(['parent_id'=>$id])->one();
       if(isset($data)){
           return ' <a href="#"><span data-element="'.$id.'" class="glyphicon glyphicon glyphicon-arrow-right"></span></a>';
       }else {
            return FALSE;
       }
       
     }
         
   
    
    
    public function upload()
    {
        if ($this->validate()) {
            //print_r();exit;
            //$this->image->saveAs('uploads/'.$this->image->tempName);
            
            //$image_code = rand(1123123123123120,100);
            $this->image->saveAs('uploads/' . $this->image->baseName . '.' . $this->image->extension);
            return;
        } else {
            return false;
        }
    }
    
    public function custom_update($id, $fields){
        $delete_additioanl_fields = "DELETE FROM `category_additional_fields` WHERE `category_id`=$id";
        \Yii::$app->db->createCommand($delete_additioanl_fields)->execute();
        
//        if(!empty($fields)){
//        print_r($fields);
            foreach ($fields as $opfields)
            {
                $sql="INSERT INTO `category_additional_fields` (`category_id`, `optional_field_id`)VALUES ($id, $opfields)";
                \Yii::$app->db->createCommand($sql)->execute();
            }
//        }
    }
    
    public function custom_update_delete($id){
        $delete_additioanl_fields = "DELETE FROM `category_additional_fields` WHERE `category_id`=$id";
        \Yii::$app->db->createCommand($delete_additioanl_fields)->execute();
        
    }
    
    
}
