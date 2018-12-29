<?php
namespace common\components\IEXTradingApi\Responses\Stocks;

use common\components\IEXTradingApi\Responses\IEXTradingApiResponse;

/**
* This is the StockChart class. It supports only some of the API options
*/
class StockChart extends IEXTradingApiResponse
{
	// The data list to be returned as a result
    private $data;

    /**
     * @var float
     */
    public $high;

    /**
     * @var float
     */
    public $low;

    /**
     * @var int
     */
    public $volume;

    /**
     * @var mixed A variable formatted version of the date depending on the range. Optional convienience field
     */
    public $label;

    /**
     * @var float Percent change of each interval relative to first value. Useful for comparing multiple stocks
     */
    public $changeOverTime;

    /**
     * @var string
     */
    public $date;

    /**
     * @var float
     */
    public $open;

    /**
     * @var float
     */
    public $close;

    /**
     * @var float
     */
    public $unadjustedVolume;

    /**
     * @var float
     */
    public $change;

    /**
     * @var float
     */
    public $changePercent;

    /**
     * @var float
     */
    public $vwap;

    public static $supportedRanges = [
    	'5y', '2y', '1y', 'ytd', '6m', '3m', '1m', 
    ];

    /**
     * StockChart constructor
     *
     * @param array $response
     */
    public function __construct($response)
    {
    	parent::__construct($response);

        foreach ($response as $key => $value) {
            $this->data[] = $value;
        }
    }

    /**
     * Returns the data chart array
     *
     * @return array An array consisting the data for the specific range
     */
    public function getData(): array
    {
        return $this->data;
    }

}
