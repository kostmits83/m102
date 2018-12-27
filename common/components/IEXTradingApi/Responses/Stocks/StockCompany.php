<?php
namespace common\components\IEXTradingApi\Responses\Stocks;

use common\components\IEXTradingApi\Responses\IEXTradingApiResponse;

class StockCompany extends IEXTradingApiResponse
{
    public $symbol;
    public $companyName;
    public $exchange;
    public $industry;
    public $website;
    public $description;
    public $CEO;
    public $issueType;
    public $sector;
    public $tags;

    /**
    * @static array Refers to the common issue type of the stock
    */
    private static $issueTypes = [
        'ad' => 'American Depository Receipt (ADR’s)',
        're' => 'Real Estate Investment Trust (REIT’s)',
        'ce' => 'Closed end fund (Stock and Bond Fund)',
        'si' => 'Secondary Issue',
        'lp' => 'Limited Partnerships',
        'cs' => 'Common Stock',
        'et' => 'Exchange Traded Fund (ETF)',
    ];

    /**
    * @static array The class attributes
    */
    public static $attributes = [
        'symbol', 'companyName', 'exchange', 'industry', 'website', 'description', 'CEO', 'issueType', 'sector', 'tags',
    ];

    /**
     * StockCompany constructor
     *
     * @param $response
     */
    public function __construct($response)
    {
    	foreach (self::$attributes as $attribute) {
			$this->{$attribute} = $response[$attribute];
    	}
    }

    /**
     * @static Returns the issue type of the company
     * 
     * @param string $type The type of the issue
     *
     * @return string|null The issue type or null if does not exist
     */
    public static function getIssueType(?string $type): ?string
    {
        return self::$issueTypes[$type] ?? null;
    }

}