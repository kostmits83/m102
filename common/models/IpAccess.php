<?php
namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Html;

/**
 * This is the model class for table "ip_access".
 *
 * @property int $id
 * @property string $ip
 * @property string $created_at
 * @property string $updated_at
 */
class IpAccess extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ip_access';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ip'], function ($attribute) {
                $this->$attribute = \yii\helpers\HtmlPurifier::process($this->$attribute);
            }],
            [['ip'], 'filter', 'filter' => 'trim'],
            [['ip'], 'required'],
            [['ip'], 'string', 'max' => 255],
            ['ip', 'unique', 'targetClass' => '\common\models\IpAccess', 'skipOnEmpty' => false, 'skipOnError' => false,],
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
            'id' => Yii::t('app/labels', 'ID'),
            'ip' => Yii::t('app/labels', 'Ip'),
            'created_at' => Yii::t('app/labels', 'Created At'),
            'updated_at' => Yii::t('app/labels', 'Updated At'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\activeQuery\IpAccessQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\activeQuery\IpAccessQuery(get_called_class());
    }

    /**
     * Returns the valid ips for access
     * @return array The array containing the valid ips
     */
    public static function validIps(): array
    {
        $ips = self::find()
                ->select('ip')
                ->asArray()
                ->all();
        $valid_ips = ['127.0.0.1', '::1'];
        if (!empty($ips)) {
            foreach($ips as $key => $value) {
                //$valid_ips[] = inet_ntop($value['ip']);
                $valid_ips[] = $value['ip'];
            }
        }
        return $valid_ips;
    }

}
