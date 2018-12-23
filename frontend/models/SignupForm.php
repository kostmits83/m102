<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;
use yii\helpers\Html;
use kartik\password\StrengthValidator;

use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $email;
    public $password;

    // The status of the user
    public $status;

    // The captcha code
    public $verifyCode;

    // The confirm password field
    public $confirmPassword;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password', 'confirmPassword'], function ($attribute) {
                $this->$attribute = \yii\helpers\HtmlPurifier::process($this->$attribute);
            }],
            [['email', 'password', 'confirmPassword'], 'filter', 'filter'=>'trim'],

            [['email', 'password', 'confirmPassword'], 'required'],
            [['password'], StrengthValidator::className(), 'preset' => StrengthValidator::NORMAL],

            ['email', 'email'],
            ['email', 'string', 'min' => 4, 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'string', 'min' => 6, 'max' => 40],
            ['confirmPassword', 'compare', 'compareAttribute' => 'password', 'message' => 'Passwords does not match.'],
            ['verifyCode', 'captcha'],

            // Status has to be integer value in the given range. Check User model.
            ['status', 'in', 'range' => [User::STATUS_NOT_ACTIVE, User::STATUS_ACTIVE]]
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
        $user->status = User::STATUS_NOT_ACTIVE;
        $user->generateAccountActivationToken();
        
        return $user->save() ? $user : null;
    }

    /**
     * Sends email to registered user with account activation link.
     *
     * @param  object $user Registered user.
     * @return bool Whether the message has been sent successfully.
     */
    public function sendAccountActivationEmail($user)
    {
        return Yii::$app->mailer->compose('accountActivationToken/html', ['user' => $user])
            ->setFrom([Yii::$app->params['adminEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account activation for ' . Yii::$app->name)
            ->send();
    }

}
