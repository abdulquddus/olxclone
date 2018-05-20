<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tmp_user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password
 * @property string $email
 * @property integer $mobile
 * @property integer $v_code
 * @property integer $status
 * @property integer $sms_verify
 * @property integer $email_verify
 * @property integer $created_at
 * @property integer $updated_at
 */
class TmpUser extends \yii\db\ActiveRecord
{
     public $password;
      public $confirmpassword;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tmp_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
//            [['mobile', 'v_code'], 'required'],
  //          [['mobile', 'v_code', 'status', 'sms_verify', 'email_verify', 'created_at', 'updated_at'], 'integer'],
//            [['username', 'password_hash', 'email'], 'string', 'max' => 255],
         //   [['auth_key'], 'string', 'max' => 32],
            [['mobile'], 'unique'],
     //       [['mobile'], 'required', 'min' => 10],
           //  ['mobile', 'min' => 10],
            ['email', 'filter', 'filter' => 'trim'],
            [['email'], 'unique'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password_hash', 'required'],
            ['password_hash', 'string', 'min' => 6],
            ['confirmpassword', 'required'],
            ['confirmpassword', 'compare','compareAttribute'=>'password_hash','operator'=>'==','message'=>'Password missmatche.'],
            
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'email' => 'Email',
            'mobile' => 'Mobile',
            'v_code' => 'V Code',
            'status' => 'Status',
            'sms_verify' => 'Sms Verify',
            'email_verify' => 'Email Verify',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'password' => 'password',
        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
       // if ($this->validate()) {
            $user = new TmpUser();
            $user->username = $this->email;
            $user->email = $this->email;
            $user->password_hash = $this->password;
           // $user->setPassword($this->password);
          //  $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
      //  }

        return null;
    }
}
