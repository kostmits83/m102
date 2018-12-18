<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;
use yii\helpers\Html;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $email;
    public $password;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            [['email', 'password'], function ($attribute) {
                $this->$attribute = \yii\helpers\HtmlPurifier::process($this->$attribute);
            }],
            [['email', 'password'], 'filter', 'filter'=>'trim'],

            [['email', 'password'], 'required'],
            ['email', 'email'],
            ['email', 'string', 'min' => 4, 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'string', 'min' => 6, 'max' => 40],
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
