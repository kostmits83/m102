<?php
namespace common\components\IEXTradingApi\Responses\Stocks;

use common\components\IEXTradingApi\Responses\IEXTradingApiResponse;
use common\components\IEXTradingApi\Responses\Stocks\StockQuote;

class StockList extends IEXTradingApiResponse
{
    // The data list to be returned as a result or null on failure
    private $data;

    /**
     * StockList constructor does not call parent constructor
     *
     * @param $response
     */
    public function __construct($response)
    {
        if (is_array($response)) {
            $this->data = [];
            // Create each StockQuote that exists in $response
            foreach ($response as $key => $value) {
                $this->data[] = new StockQuote($value);
            }
        } else {
            $this->data = null;
        }
    }

    /**
     * Returns the quote list
     *
     * @return array|null An array of quotes of the specific list or null if nothing exists
     */
    public function getData(): ?array
    {
        return is_array($this->data) ? $this->data : null;
    }

}
