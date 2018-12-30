<?php
namespace common\components\IEXTradingApi\Responses\Stocks;

use common\components\IEXTradingApi\Responses\IEXTradingApiResponse;

class StockSectorPerformance extends IEXTradingApiResponse
{
    // The data list to be returned as a result
    private $data;

    /**
     * @var string The type of performance data return. Should always be sector
     */
    public $type;

    /**
     * @var string The name of the sector
     */
    public $name;

    /**
     * @var float Change percent of the sector for the trading day
     */
    public $performance;

    /**
     * @var int Last updated time of the performance metric represented as millisecond epoch
     */
    public $lastUpdated;

    /**
     * StockSectorPerformance constructor
     *
     * @param $response
     */
    public function __construct($response)
    {
        parent::__construct($response);

        foreach ($response as $key => $value) {
            $this->data[] = $value;
        }
    }

    /**
     * Returns the sectors array
     *
     * @return array An array of the sectors
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @static Returns only the properties that supposed to be shown at the tables
     *
     * @return array An array containing the properties to be shown at the table
     */
    public static function getPropertiesForTable(): array
    {
        return [
            'name', 'performance',
        ];
    }

}
