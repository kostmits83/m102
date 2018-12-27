<?php
namespace common\components\IEXTradingApi\Responses\Stats;

use common\components\IEXTradingApi\Responses\IEXTradingApiResponse;

class StatsIntraday extends IEXTradingApiResponse
{
    /**
     * @var array Refers to single counted shares matched from executions on IEX
     */
    public $volume;

    /**
     * @var array Refers to number of symbols traded on IEX
     */
    public $symbolsTraded;

    /**
     * @var array Refers to executions received from order routed to away trading centers
     */
    public $routedVolume;

    /**
     * @var array Refers to sum of matched volume times execution price of those trades
     */
    public $notional;

    /**
     * @var array Refers to IEX’s percentage of total US Equity market volume
     */
    public $marketShare;

    /**
     * @var array Refers to the last update time of the data in milliseconds since midnight Jan 1, 1970
     */
    public $lastUpdated;

    /**
     * StatsIntraday constructor
     *
     * @param $response
     */
    public function __construct($response)
    {
        parent::__construct($response);
    }

}
