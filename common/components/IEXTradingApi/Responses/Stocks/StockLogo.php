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
     * StockLogo constructor
     *
     * @param $response
     */
    public function __construct($response)
    {
        parent::__construct($response);
    }

} 
