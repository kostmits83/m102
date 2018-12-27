<?php
namespace common\components\IEXTradingApi\Responses\Stocks;

use common\components\IEXTradingApi\Responses\IEXTradingApiResponse;

class StockLogo extends IEXTradingApiResponse
{
    /**
     * @var string Refers to url of the company's logo
     */
    public $url;
    
    /**
    * @static array The class attributes
    */
    public static $attributes = [
        'url',
    ];

    /**
     * StockLogo constructor
     *
     * @param $response
     */
    public function __construct($response)
    {
        foreach (self::$attributes as $attribute) {
            $this->{$attribute} = $response[$attribute];
        }
    }

} 
