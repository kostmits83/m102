<?php
namespace common\models;

use Yii;
use common\models\activeQuery\CountryQuery;

/**
 * This is the model class for table "country".
 *
 * @property int $id
 * @property string $abbr
 * @property string $name
 * @property string $long_name
 * @property string $phone_code
 * @property int $is_active
 *
 * @property User[] $users
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['abbr', 'name', 'long_name', 'phone_code'], function ($attribute) {
                $this->$attribute = \yii\helpers\HtmlPurifier::process($this->$attribute);
            }],
            [['abbr', 'name', 'long_name', 'phone_code'], 'filter', 'filter' => 'trim'],
            [['abbr', 'name'], 'required'],
            [['is_active'], 'integer', 'min' => 0, 'max' => 1],
            [['abbr', 'phone_code'], 'string', 'max' => 5],
            [['name', 'long_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app/labels', 'id'),
            'abbr' => Yii::t('app/labels', 'abbr'),
            'name' => Yii::t('app/labels', 'name'),
            'long_name' => Yii::t('app/labels', 'long_name'),
            'phone_code' => Yii::t('app/labels', 'phone_code'),
            'is_active' => Yii::t('app/labels', 'is_active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['country_id' => 'id'])->inverseOf('country');
    }

    /**
     * {@inheritdoc}
     * @return CountryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CountryQuery(get_called_class());
    }
}
