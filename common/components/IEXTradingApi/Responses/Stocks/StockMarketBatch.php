<?php
namespace common\components\IEXTradingApi\Responses\Stocks;

use common\components\IEXTradingApi\Responses\IEXTradingApiResponse;

use common\components\IEXTradingApi\Responses\Stocks\
{
    StockQuote,
    StockNews,
    StockChart
};

/**
* This is the StockMarketBatch class. It supports only some of the API options
*/
class StockMarketBatch extends IEXTradingApiResponse
{
	// The data list to be returned as a result
    private $data;

    public static $supportedRanges = [
    	'5y', '2y', '1y', 'ytd', '6m', '3m', '1m', 
    ];

    public static $supportedTypesMap = [
        'quote' => 'StockQuote',
        'news' => 'StockNews',
        'chart' => 'StockChart',
    ];

    /**
     * StockMarketBatch constructor
     *
     * @param array $response
     * @param array $types The types of the call
     */
    public function __construct($response, $types)
    {
        foreach ($response as $key => $value) {
            foreach ($types as $type) {
                if (self::getSupportedTypesMap($type) === null) {
                    continue;
                }
                // Call the appropriate class for each type
                $className = (new \ReflectionClass(self::class))->getNamespaceName() . '\\' . self::getSupportedTypesMap($type);
                $this->data[$key][$type] = new $className($value[$type]);
            }
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

    /**
     * Returns the type from the supported types map
     *
     * @param string $type The specific type to get its value
     *
     * @return string|null The specific type or null if it is not supported
     */
    public static function getSupportedTypesMap(string $type = ''): ?string
    {
        return self::$supportedTypesMap[$type] ?? null;
    }

}
