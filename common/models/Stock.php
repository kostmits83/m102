<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Html;
use common\models\activeQuery\StockQuery;
use common\components\IEXTradingApi\Responses\Stocks\StockCompany;
use common\components\IEXTradingApi\Responses\Stocks\StockLogo;
use common\components\IEXTradingApi\Responses\ReferenceData\ReferenceDataSymbol;

/**
 * This is the model class for table "stock".
 *
 * @property int $id
 * @property string $symbol
 * @property string $name
 * @property string $date
 * @property int $isEnabled
 * @property string $type
 * @property string $iexId
 * @property string $exchange
 * @property string $industry
 * @property string $website
 * @property string $description
 * @property string $CEO
 * @property string $issueType
 * @property string $sector
 * @property array $tags
 * @property string $logo_url
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Portfolio[] $portfolios
 * @property UserStockFavors[] $userStockFavors
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * The attributes that are part of the record hash
     */
    public static $changeableAttributes = ['symbol', 'name', 'date', 'isEnabled', 'type', 'iexId', 'exchange', 'industry', 'website', 'description', 'CEO', 'issueType', 'sector', 'logo_url', 'tags'];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stock';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['symbol', 'name', 'date', 'isEnabled', 'type', 'iexId', 'exchange', 'industry', 'website', 'description', 'CEO', 'issueType', 'sector', 'logo_url'], function ($attribute) {
                $this->$attribute = \yii\helpers\HtmlPurifier::process($this->$attribute);
            }],
            [['symbol', 'name', 'date', 'isEnabled', 'type', 'iexId', 'exchange', 'industry', 'website', 'description', 'CEO', 'issueType', 'sector', 'logo_url'], 'filter', 'filter' => 'trim'],

            [['symbol', 'name'], 'required'],
            [['tags'], 'safe'],
            [['date'], 'date', 'format' => 'php:Y-m-d'],
            [['isEnabled'], 'integer'],
            [['description'], 'string'],
            [['symbol', 'name', 'type', 'iexId', 'exchange', 'industry', 'website', 'CEO', 'issueType', 'sector', 'logo_url'], 'string', 'max' => 255],
            [['symbol'], 'unique'],
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
            'symbol' => Yii::t('app/labels', 'Symbol'),
            'name' => Yii::t('app/labels', 'Name'),
            'date' => Yii::t('app/labels', 'Date'),
            'isEnabled' => Yii::t('app/labels', 'Is Enabled'),
            'type' => Yii::t('app/labels', 'Type'),
            'iexId' => Yii::t('app/labels', 'Iex ID'),
            'exchange' => Yii::t('app/labels', 'Exchange'),
            'industry' => Yii::t('app/labels', 'Industry'),
            'website' => Yii::t('app/labels', 'Website'),
            'description' => Yii::t('app/labels', 'Description'),
            'CEO' => Yii::t('app/labels', 'Ceo'),
            'issueType' => Yii::t('app/labels', 'Issue Type'),
            'sector' => Yii::t('app/labels', 'Sector'),
            'tags' => Yii::t('app/labels', 'Tags'),
            'logo_url' => Yii::t('app/labels', 'Logo Url'),
            'record_hash' => Yii::t('app/labels', 'Record Hash'),
            'created_at' => Yii::t('app/labels', 'Created At'),
            'updated_at' => Yii::t('app/labels', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortfolios()
    {
        return $this->hasMany(Portfolio::className(), ['stock_id' => 'id'])->inverseOf('stock');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserStockFavors()
    {
        return $this->hasMany(UserStockFavors::className(), ['stock_id' => 'id'])->inverseOf('stock');
    }

    /**
     * {@inheritdoc}
     * @return StockQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StockQuery(get_called_class());
    }

    /**
     * Returns the record hash
     * @return string The record hash created from the various fields
     */
    public function getRecordHash(): string
    {
        $propertiesStr = '';
        foreach (self::$changeableAttributes as $property) {
            if (is_array($this->{$property})) {
                $propertiesStr .= implode('', $this->{$property});
            } else {
                $propertiesStr .= $this->{$property};
            }
        }
        return sha1($propertiesStr);
    }

    /**
     * Checks if the model is different from that in the database
     * @param string $recordHash The hash to be compared
     * @return bool If the model has been modified
     */
    public function hasBeenModified(string $recordHash): bool
    {
        return $this->getRecordHash() === $recordHash ? false : true;
    }

    /**
     * Creates or updates the Stock model depending on if it is a new model or an old one that has been modified
     * @param ReferenceDataSymbol|null $referenceDataSymbol The ReferenceDataSymbol model to get the values from
     * @param StockCompany|null $company The StockCompany model to get the values from
     * @param StockLogo|null $logo The StockLogo model to get the values from
     * @return bool If the model has been modified
     */
    public function store(?ReferenceDataSymbol $referenceDataSymbol, ?StockCompany $company, ?StockLogo $logo): bool
    {
        if (empty($referenceDataSymbol) || empty($company) || empty($logo)) {
            return false;
        }
        $flag = false;

        // Symbol parts
        $this->symbol = $referenceDataSymbol->symbol;
        $this->name = $referenceDataSymbol->name;
        $this->date = $referenceDataSymbol->date;
        $this->isEnabled = $referenceDataSymbol->isEnabled;
        $this->type = $referenceDataSymbol->type;
        $this->iexId = $referenceDataSymbol->iex;

        // Logo parts
        $this->logo_url = $logo->url;

        // Company parts
        $this->exchange = $company->exchange;
        $this->industry = $company->industry;
        $this->website = $company->website;
        $this->description = $company->description;
        $this->CEO = $company->CEO;
        $this->issueType = $company->issueType;
        $this->sector = $company->sector;
        $this->tags = $company->tags;

        // Find the stock with this symbol
        $currentModel = Stock::findOne(['symbol' => $referenceDataSymbol->symbol]);

        // If the specific stock exists
        if ($currentModel) {
            // If the specific stock has been modified then update the current model
            if ($this->hasBeenModified($currentModel->getRecordHash())) {
                // Copy all the changeable attributes to current model
                foreach (self::$changeableAttributes as $property) {
                    $currentModel->{$property} = $this->{$property};
                }
                $flag = $currentModel->save();
            }
        } else {
            // If the specific stock does not exist then save it
            $flag = $this->save();
        }

        return $flag;
    }

}
