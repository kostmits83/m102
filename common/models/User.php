<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use kartik\password\StrengthValidator;
use common\models\activeQuery\UserQuery;

/**
 * User model
 *
 * @property integer $id
 * @property integer $country_id
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property string $account_activation_token
 * @property string $firstname
 * @property string $lastname
 * @property string $birthdate
 * @property string $last_login
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 *
 * @property Portfolio[] $portfolios
 * @property Country $country
 * @property UserStockFavors[] $userStockFavors
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    const STATUS_NOT_ACTIVE = 1;

    const LAST_LOGIN_FORMAT = 'Y-m-d H:i:s';

    // The current password field
    public $currentPassword;

    // The new password field
    public $newPassword;

    // The confirm password field
    public $confirmPassword;

    // The confirm password field to delete account
    public $confirmPasswordToDelete;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'firstname', 'lastname', 'currentPassword', 'newPassword', 'confirmPassword'], function ($attribute) {
                $this->$attribute = \yii\helpers\HtmlPurifier::process($this->$attribute);
            }],
            [['email', 'firstname', 'lastname', 'currentPassword', 'newPassword', 'confirmPassword'], 'filter', 'filter' => 'trim'],
            [['email'], 'required'],
            ['email', 'email'],
            [['email'], 'string', 'max' => 255],

            [['firstname', 'lastname'], 'string', 'max' => 255],

            [['birthdate'], 'date'],

            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED, self::STATUS_NOT_ACTIVE]],

            [['country_id'], 'integer'],
            ['country_id', 'exist', 'targetAttribute' => 'id', 'targetClass' => '\common\models\Country', 'skipOnEmpty' => true, 'skipOnError' => false],

            [['currentPassword', 'newPassword', 'confirmPassword'], 'required', 'on' => 'changePassword'],
            [['currentPassword', 'newPassword', 'confirmPassword'], 'string', 'min' => 6, 'max' => 40, 'on' => 'changePassword'],
            ['confirmPassword', 'compare', 'compareAttribute' => 'newPassword', 'message' => 'Passwords does not match.', 'on' => 'changePassword'],
            ['currentPassword', 'validateCurrentPassword', 'on' => 'changePassword'],
            [['newPassword'], StrengthValidator::className(), 'preset' => StrengthValidator::SIMPLE, 'userAttribute' => 'email', 'on' => 'changePassword'],

            ['confirmPasswordToDelete', 'required', 'on' => 'deleteAccount'],
            ['confirmPasswordToDelete', 'string', 'min' => 6, 'max' => 40, 'on' => 'deleteAccount'],
            ['confirmPasswordToDelete', 'validateCurrentPassword', 'on' => 'deleteAccount'],
        ];
    }

    /**
     * Validates the current password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validateCurrentPassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if (!$this || !$this->validatePassword($this->{$attribute})) {
                $this->addError($attribute, 'Incorrect password.');
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app/labels', 'id'),
            'country_id' => Yii::t('app/labels', 'country_id'),
            'firstname' => Yii::t('app/labels', 'firstname'),
            'lastname' => Yii::t('app/labels', 'lastname'),
            'birthdate' => Yii::t('app/labels', 'birthdate'),
            'last_login' => Yii::t('app/labels', 'last_login'),
            'created_at' => Yii::t('app/labels', 'created_at'),
            'updated_at' => Yii::t('app/labels', 'updated_at'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortfolios()
    {
        return $this->hasMany(Portfolio::className(), ['user_id' => 'id'])->inverseOf('user');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id'])->inverseOf('users');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserStockFavors()
    {
        return $this->hasMany(UserStockFavors::className(), ['user_id' => 'id'])->inverseOf('user');
    }

    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Generates new account activation token.
     */
    public function generateAccountActivationToken()
    {
        $this->account_activation_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Finds user by account activation token.
     *
     * @param  string $token Account activation token.
     * @return static|null
     */
    public static function findByAccountActivationToken($token)
    {
        return static::findOne([
            'account_activation_token' => $token,
            'status' => User::STATUS_NOT_ACTIVE,
        ]);
    }

    /**
     * Removes account activation token.
     */
    public function removeAccountActivationToken()
    {
        $this->account_activation_token = null;
    }

    /**
     * Finds user by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password): void
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey(): void
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken(): void
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken(): void
    {
        $this->password_reset_token = null;
    }

    /**
     * Sets the last_login field
     */
    public function setLastLogin(): void
    {
        $this->last_login = date(self::LAST_LOGIN_FORMAT);
    }

    /**
     * Sets the last_login field
     * @return bool If profile has been saved or not
     */
    public function saveProfile(): bool
    {
        return $this->save(true, ['firstname', 'lastname', 'birthdate', 'country_id']);
    }

    /**
     * Changes the password to a new one
     * @return bool If password has been changed or not
     */
    public function changePassword(): bool
    {
        if ($this->validate()) {
            $this->setPassword($this->newPassword);
            return $this->save(true, ['password_hash']);
        }
        return false;
    }

    /**
     * Delete the user account and all the related data
     * @return bool|int If account has been deleted or not
     */
    public function deleteAccount()
    {
        if ($this->validate()) {
            return $this->delete();
        }
        return false;
    }

}
