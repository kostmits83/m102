<?php

namespace common\models;

use Yii;

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
            [['name', 'email', 'message'], 'required'],
            [['message'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app/labels', 'ID'),
            'name' => Yii::t('app/labels', 'Name'),
            'email' => Yii::t('app/labels', 'Email'),
            'message' => Yii::t('app/labels', 'Message'),
            'created_at' => Yii::t('app/labels', 'Created At'),
            'updated_at' => Yii::t('app/labels', 'Updated At'),
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
}
