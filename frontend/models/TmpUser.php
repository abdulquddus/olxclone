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
      public $accept;

//     public $com_url; // for company url

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
            //['mobile', 'filter', 'filter' => [$this, 'filterPostalCode'], 'message'=>'Not a valid mobile number.'],
           [['mobile'], 'unique', 'targetClass' => '\common\models\User'],
             [['mobile'], 'unique', 'targetClass' => '\frontend\models\TmpUser'],
           [['mobile'], 'integer'],
           [['mobile'], 'required'],
         // ['mobile', 'match', 'pattern' => '^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$'],
            ['accept', 'required'],
          //  [['mobile'], 'min' => 10],
           //  ['mobile', 'min' => 10],
            ['email', 'filter', 'filter' => 'trim'],
          
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User'],
            ['email', 'unique',  'targetClass' => '\frontend\models\TmpUser'],

            ['password_hash', 'required'],
            ['password_hash', 'string', 'min' => 6],
            ['confirmpassword', 'required'],
            ['confirmpassword', 'compare','compareAttribute'=>'password_hash','operator'=>'==','message'=>'Password missmatche.'],
            ['accept', 'compare', 'compareValue'=> true, 'message' => 'You must agree to the terms and conditions'],
            
            [['com_url'], 'safe'],    

        ];
    }
    
    
     public function filterPostalCode($value)
  {
    //strip out non letters and numbers
   // $value = preg_replace('/[^A-Za-z0-9]/', '', $value);
      $leg =  strlen($value);

       if($leg!=13){ # 13 is mibile number length
            $this->addError('mobile', 'Not a valid number');
           // echo "equalto";
       }
       

         if($value[0]!='+'){
            // $value = "starting from 0";
             $this->addError('mobile', 'Number should start from +92.');
         }
         if($value[1]!='9'){
            // $value = "starting from 0";
             $this->addError('mobile', 'Number should start from +92.');
         }
         if($value[2]!='2'){
            // $value = "starting from 0";
             $this->addError('mobile', 'Number should start from +92.');
         }
        // $this->addError('mobile', 'The country must be either "USA" or "Web".');
        // return  $this->addError($attribute,'Custom Validation Error');
    return $value; // strtoupper($value);
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
            'password_hash' => 'Password',
            'email' => 'Email',
            'mobile' => 'Mobile',
            'v_code' => 'V Code',
            'status' => 'Status',
            'sms_verify' => 'Sms Verify',
            'email_verify' => 'Email Verify',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'password' => 'password',

            'accept' => 'Accept',
             'com_url' => 'ompany URL'

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
