<?php
namespace frontend\models;
use Yii;
/** * This is the model class for table "user". 
* * @property integer $id * @property string $username 
* @property string $auth_key * @property string $password_hash 
* @property string $password_reset_token * @property string $email 
* @property integer $status * @property integer $created_at 
* @property integer $updated_at */class User extends \yii\db\ActiveRecord{ /** 
* @inheritdoc */
 public static function tableName() { 
 return 'user'; 
 } public $password_repeat; //for repeat password//
 public $com_url; // for company url
 /** * @inheritdoc */
 public function rules() 
 {
 return [
 [['status', 'created_at', 'updated_at'], 'integer'],
 [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
 [['password_repeat'], 'required'],
 [['password_repeat'], 'compare', 'compareAttribute'=>'password_hash', 'message'=>"Passwords don't match" ],//comparisons of the passwords [['auth_key'], 'string', 'max' => 32],
 [['com_url'], 'safe'], ]; } 
 
 /** * @inheritdoc */ 
 
 public function attributeLabels()

 {

 return [ 
 'id' => Yii::t('app', 'ID'),
 'username' => Yii::t('app', 'Username'),
 'auth_key' => Yii::t('app', 'Auth Key'),
 'password_hash' => Yii::t('app', 'Password Hash'),
 'password_reset_token' => Yii::t('app', 'Password Reset Token'),
 'email' => Yii::t('app', 'Email'),
 'status' => Yii::t('app', 'Status'),
 'created_at' => Yii::t('app', 'Created At'),
 'updated_at' => Yii::t('app', 'Updated At'),
 'com_url' => Yii::t('app', 'Company URL'),
 ];
	}
 }