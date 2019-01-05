<?php
namespace common\models;

use Yii;
use \yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use common\models\activeQuery\UserStockFavorsQuery;

/**
 * This is the model class for table "user_stock_favors".
 *
 * @property int $id
 * @property int $user_id
 * @property int $stock_id
 * @property int $type_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 * @property Stock $stock
 */
class UserStockFavors extends ActiveRecord
{
    const FAVOR_FAVORITE = 1;
    const FAVOR_COMPARISON = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_stock_favors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'stock_id', 'type_id'], 'required'],
            [['user_id', 'stock_id'], 'integer'],
            ['type_id', 'integer', 'min' => self::FAVOR_FAVORITE, 'max' => self::FAVOR_COMPARISON],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'type_id' => Yii::t('app/labels', 'Type ID'),
            'created_at' => Yii::t('app/labels', 'Created At'),
            'updated_at' => Yii::t('app/labels', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id'])->inverseOf('userStockFavors');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStock()
    {
        return $this->hasOne(Stock::className(), ['id' => 'stock_id'])->inverseOf('userStockFavors');
    }

    /**
     * {@inheritdoc}
     * @return common\models\activeQuery\UserStockFavorsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserStockFavorsQuery(get_called_class());
    }

    /**
     * Returns favorite and comparison labels
     * @return array The array containing the labels
     */
    public function getFavorLabels(): array
    {
        return [
            self::FAVOR_FAVORITE => 'Favorite',
            self::FAVOR_COMPARISON => 'Comparison',
        ];
    }

    /**
     * Returns the label assigned for a specific favor label type
     * @param string $type The type of the label
     * @return string|null The label for the specific type or null if it does not exist
     */
    public function getFavorLabel(string $type): ?string
    {
        return self::getFavorLabels($type) ?? null;
    }

}
