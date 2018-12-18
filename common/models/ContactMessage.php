<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Html;

/**
 * This is the model class for table "contact_message".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $message
 * @property string $created_at
 * @property string $updated_at
 */
class ContactMessage extends \yii\db\ActiveRecord
{

    // The email subject of the contact message form
    const EMAIL_SUBJECT = 'Contact Form Email';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact_message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'message'], function ($attribute) {
                $this->$attribute = \yii\helpers\HtmlPurifier::process($this->$attribute);
            }],
            [['name', 'email', 'message'], 'filter', 'filter'=>'trim'],
            [['name', 'email', 'message'], 'required'],
            ['email', 'email'],
            [['email'], 'string', 'max' => 255],
            [['message'], 'string', 'max'=>10000],
            [['name'], 'string', 'min' => 4, 'max' => 100],
            [['email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => date('Y-m-d H:i:s'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app/labels', 'id'),
            'name' => Yii::t('app/labels', 'name'),
            'email' => Yii::t('app/labels', 'email'),
            'message' => Yii::t('app/labels', 'message'),
            'created_at' => Yii::t('app/labels', 'created_at'),
            'updated_at' => Yii::t('app/labels', 'updated_at'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ContactMessageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContactMessageQuery(get_called_class());
    }

    /**
     * Sends the contact form email
     *
     * @return boolean If the email has been sent or not
     */
    public function sendEmail()
    {
        return Yii::$app->mailer->compose('contact/html', ['model' => $this])
            ->setFrom($this->email)
            ->setTo(Yii::$app->params['siteEmail'])
            ->setSubject(self::EMAIL_SUBJECT)
            ->send();
    }
}
