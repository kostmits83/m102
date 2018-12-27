<?php
namespace common\components\IEXTradingApi\Responses\Markets;

use common\components\IEXTradingApi\Responses\IEXTradingApiResponse;
use common\components\IEXTradingApi\Responses\Markets\Market;

class Markets extends IEXTradingApiResponse
{
    /**
     * @var array The markets as returned by the response
     */
    public $marketsRaw = [];

    /**
     * @var array The markets as an array of Market abjects
     */
    public $markets = [];

    /**
     * Markets constructor
     *
     * @param $response
     */
    public function __construct($response)
    {
    	foreach ($response as $market) {
            $this->marketsRaw[] = $market;
    	}
    }

    /**
     * In fact here is the market initialization
     *
     * @return array An array of Market objects
     */
    public function getMarkets(): array
    {
        foreach ($this->marketsRaw as $market) {
            $this->markets[$market[MARKET::MARKET_ID]] = new Market($market);
        }
        return $this->markets;
    }

}
