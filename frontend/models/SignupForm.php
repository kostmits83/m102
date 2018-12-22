<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;
use yii\helpers\Html;
use kartik\password\StrengthValidator;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $email;
    public $password;

    // The captcha code
    public $verifyCode;

    // The confirm password field
    public $confirm_password;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            [['email', 'password', 'confirm_password'], function ($attribute) {
                $this->$attribute = \yii\helpers\HtmlPurifier::process($this->$attribute);
            }],
            [['email', 'password', 'confirm_password'], 'filter', 'filter'=>'trim'],

            [['email', 'password', 'confirm_password'], 'required'],
            [['password'], StrengthValidator::className(), 'preset' => StrengthValidator::NORMAL],

            ['email', 'email'],
            ['email', 'string', 'min' => 4, 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'string', 'min' => 6, 'max' => 40],
            ['confirm_password', 'compare', 'compareAttribute' => 'password', 'message' => 'Passwords does not match.'],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
