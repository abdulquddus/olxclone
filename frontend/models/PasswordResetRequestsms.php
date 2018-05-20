<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;

/**
 * Password reset request form
 */
class PasswordResetRequestsms extends Model
{
   
    public $mobile;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            ['mobile', 'filter', 'filter' => 'trim'],
            ['mobile', 'required'],
//          ['mobile', 'email'],
            ['mobile', 'exist',
                'targetClass' => '\common\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'There is no user with such Mobile.'
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function sendSms()
    {
        /* @var $user User */
        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'mobile' => $this->mobile,
        ]);

        if ($user) {
             $user->id;
             $user->sms_verify = rand(1000, 9999);
             if($user->save()){
                return $user->sms_verify;
             }
        }

        return false;
    }
    
    
}
