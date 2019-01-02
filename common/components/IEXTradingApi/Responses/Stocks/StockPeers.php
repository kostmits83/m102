<?php
namespace common\components\IEXTradingApi\Responses\Stocks;

use common\components\IEXTradingApi\Responses\IEXTradingApiResponse;

class StockPeers extends IEXTradingApiResponse
{
    public $data;

    /**
     * StockPeers constructor
     *
     * @param $response
     */
    public function __construct($response)
    {
        parent::__construct($response);
    }

}
