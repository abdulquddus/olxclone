<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class Details extends \yii\db\ActiveRecord
{
    public $name;
	public $imgu;

   /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mobile'], 'integer'],
            [['name','address'], 'string'],
			[['img'], 'file'],
            [['state', 'city'], 'integer'],
             [['com_url'], 'safe'],   
            
//            [['created_at', 'updated_at'], 'safe'],
//            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
//            [['auth_key'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
//            'id' => 'ID',
            'name' => 'Name',
            'mobile' => 'Mobile Number',
            'state' => 'State',
            'city' => 'city',
            'address' => 'Address',
             'com_url' => Yii::t('app', 'ompany URL')
//            'auth_key' => 'Auth Key',
//            'password_hash' => 'Password Hash',
//            'password_reset_token' => 'Password Reset Token',
//            'email' => 'Email',
//            'status' => 'Status',
//            'created_at' => 'Created At',
//            'updated_at' => 'Updated At',
        ];
    }
	
	public function upload()
    {
        if ($this->validate()) { 
            
//                $this->imgu->saveAs('uploads/' . $this->imgu->baseName . '.' . $this->imgu->extension);
           foreach($this->imgu as $test){
//                   print_r($test->name);
                    $test->saveAs('user/'. $this->id . '.' . $test->extension);
                  $this->img = $test->extension;
               }
            return true;
        }
    }
}
