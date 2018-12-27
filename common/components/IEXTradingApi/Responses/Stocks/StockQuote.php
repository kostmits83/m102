<?php
namespace common\components\IEXTradingApi\Responses\Stocks;

use common\components\IEXTradingApi\Responses\IEXTradingApiResponse;

class StockQuote extends IEXTradingApiResponse
{
    public $symbol;
    public $companyName;
    public $primaryExchange;
    public $sector;
    public $calculationPrice;
    public $open;
    public $openTime;
    public $close;
    public $closeTime;
    public $high;
    public $low;
    public $latestPrice;
    public $latestSource;
    public $latestTime;
    public $latestUpdate;
    public $latestVolume;
    public $iexRealtimePrice;
    public $iexRealtimeSize;
    public $iexLastUpdated;
    public $delayedPrice;
    public $delayedPriceTime;
    public $extendedPrice;
    public $extendedChange;
    public $previousClose;
    public $extendedChangePercent;
    public $extendedPriceTime;
    public $change;
    public $changePercent;
    public $iexMarketPercent;
    public $iexVolume;
    public $avgTotalVolume;
    public $iexBidPrice;
    public $iexBidSize;
    public $iexAskPrice;
    public $iexAskSize;
    public $marketCap;
    public $peRatio;
    public $week52High;
    public $week52Low;
    public $ytdChange;

    /**
     * StockQuote constructor
     *
     * @param $response
     */
    public function __construct($response)
    {
        parent::__construct($response);
    }

}
