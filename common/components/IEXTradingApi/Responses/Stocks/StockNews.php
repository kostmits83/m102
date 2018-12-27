<?php
namespace common\components\IEXTradingApi\Responses\Stocks;

use common\components\IEXTradingApi\Responses\IEXTradingApiResponse;

class StockNews extends IEXTradingApiResponse
{
    /**
     * @var string
     */
    public $datetime;

    /**
     * @var string
     */
    public $headline;

    /**
     * @var string Source of the news article. Make sure to always attribute the source
     */
    public $source;

    /**
     * @var string
     */
    public $url;

    /**
     * @var string
     */
    public $summary;

    /**
     * @var string Comma-delimited list of tickers associated with this news article
     */
    public $related;

    /**
     * @var string URL of associated news image
     */
    public $image;

    /**
     * StockCompany constructor
     *
     * @param $response
     */
    public function __construct($response)
    {
        parent::__construct($response);
    }

}
