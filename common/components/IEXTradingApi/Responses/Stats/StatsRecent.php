<?php
namespace common\components\IEXTradingApi\Responses\Stats;

use common\components\IEXTradingApi\Responses\IEXTradingApiResponse;

class StatsRecent extends IEXTradingApiResponse
{
    // The data list to be returned as a result
    private $data = [];

    /**
     * @var string Refers to the trading day
     */
    public $date;

    /**
     * @var int Refers to executions received from order routed to away trading centers
     */
    public $volume;

    /**
     * @var int Refers to single counted shares matched from executions on IEX
     */
    public $routedVolume;

    /**
     * @var float Refers to IEX’s percentage of total US Equity market volume
     */
    public $marketShare;

    /**
     * @var bool Will be true if the trading day is a half day
     */
    public $isHalfday;

    /**
     * @var int Refers to the number of lit shares traded on IEX (single-counted)
     */
    public $litVolume;

    /**
     * StatsRecent constructor
     *
     * @param $response
     */
    public function __construct($response)
    {
        if (!empty($response)) {
            parent::__construct($response);

            foreach ($response as $key => $value) {
                $this->data[] = $value;
            }
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
     * Returns only the properties that supposed to be shown at the tables
     *
     * @return array An array containing the properties to be shown at the table
     */
    public static function getPropertiesForTable(): array
    {
        return [
            'date', 'volume', 'routedVolume', 'marketShare', 'litVolume',
        ];
    }

    /**
     * Returns the property titles for the attributes
     *
     * @return array An array containing the titles of the properties
     */
    public static function getPropertyTitles(): array
    {
        return [
            'date' => 'Refers to the trading day',
            'volume' => 'Refers to single counted shares matched from executions on IEX',
            'routedVolume' => 'Refers to single counted shares matched from executions on IEX',
            'marketShare' => 'Refers to IEX’s percentage of total US Equity market volume',
            'litVolume' => 'Refers to the number of lit shares traded on IEX (single-counted)',
        ];
    }

}
