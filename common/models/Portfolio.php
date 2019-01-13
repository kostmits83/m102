<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "portfolio".
 *
 * @property int $id
 * @property int $user_id
 * @property int $stock_id
 * @property int $shares
 * @property double $value
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Stock $stock
 * @property User $user
 */
class Portfolio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'portfolio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stock_id', 'shares', 'value'], 'required'],
            [['stock_id', 'shares'], 'integer'],
            [['value', 'shares'], 'number', 'min' => 0, 'max' => 100000000],
            [['value'], 'match', 'pattern' => '/^[0-9]{1,12}(\.[0-9]{0,2})?$/', 'message' => 'Price should have only 2 digits.'],
            [['stock_id'], 'exist', 'skipOnError' => true, 'targetClass' => Stock::className(), 'targetAttribute' => ['stock_id' => 'id']],
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
            'user_id' => Yii::t('app/labels', 'User ID'),
            'stock_id' => Yii::t('app/labels', 'Stock ID'),
            'shares' => Yii::t('app/labels', 'Shares'),
            'value' => Yii::t('app/labels', 'Value'),
            'created_at' => Yii::t('app/labels', 'Created At'),
            'updated_at' => Yii::t('app/labels', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStock()
    {
        return $this->hasOne(Stock::className(), ['id' => 'stock_id'])->inverseOf('portfolios');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id'])->inverseOf('portfolios');
    }

    /**
     * {@inheritdoc}
     * @return \common\models\activeQuery\PortfolioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\activeQuery\PortfolioQuery(get_called_class());
    }
}
