<?php
namespace common\components\IEXTradingApi;

use Yii;

use yii\base\
{
    Component,
    InvalidConfigException
};

use common\components\IEXTradingApi\Responses\Markets\
{
    Markets,
    Market
};

use common\components\IEXTradingApi\Responses\Stocks\
{
    StockLogo,
    StockQuote,
    StockCompany,
    StockNews,
    StockList,
    StockChart,
    StockMarketBatch,
    StockSectorPerformance
};

use common\components\IEXTradingApi\Responses\Stats\
{
    StatsIntraday,
    StatsRecent
};

use common\components\IEXTradingApi\Exceptions\
{
    UnknownSymbolException,
    ItemCountPassedToStockNewsOutOfRangeException
};

use common\components\IEXTradingApi\Responses\ReferenceData\ReferenceDataSymbol;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\ClientException;

use \Psr\Http\Message\ResponseInterface as Response;

/**
 * IEXTrading API Integration
 * It relies on Guzzle
 * @link http://docs.guzzlephp.org/en/latest/index.html
 */
class IEXTradingApi extends Component
{
    // The base ure of the integrated API
    const API_URL = 'https://api.iextrading.com/1.0';

    // The stocks data
    const ENDPOINT_STOCK = 'stock';

    // The various markets data
    const ENDPOINT_MARKET = 'market';

    // Various stats
    const ENDPOINT_STATS = 'stats';

    // Aggregated best quoted bid and offer position
    const ENDPOINT_TOPS = 'tops';

    // This call returns an array of symbols IEX supports for trading. This list is updated daily as of 7:45 a.m. ET
    const ENDPOINT_REFERENCE_DATA = 'ref-data';

    const ENDPOINT_STOCK_LOGO = 'logo';
    const ENDPOINT_STOCK_PRICE = 'price';
    const ENDPOINT_STOCK_QUOTE = 'quote';
    const ENDPOINT_STOCK_COMPANY = 'company';
    const ENDPOINT_STOCK_NEWS = 'news';
    const ENDPOINT_STOCK_LIST = 'list';
    const ENDPOINT_STOCK_PEERS = 'peers';
    const ENDPOINT_STOCK_CHART = 'chart';
    const ENDPOINT_STOCK_BATCH = 'batch';
    const ENDPOINT_STOCK_SECTOR_PERFORMANCE = 'sector-performance';

    const ENDPOINT_STATS_INTRADAY = 'intraday';
    const ENDPOINT_STATS_RECENT = 'recent';

    const ENDPOINT_REFERENCE_DATA_SYMBOLS = 'symbols';

   /**
     * @var GuzzleHttpClient
    */
    private $client;

    /**
     * @var string The API url 
     */
    private $apiUrl;

    /**
     * @var boolean If there is a verification process
     */
    private $verify;

    /**
     * @var array The headers to be sent with the request
     */
    private $headers;

    /**
     * Component constructor
     *
     * @param string $apiUrl The URL of the API
     * @param string $verify If the call needs verification or not
     * @param string $headers The headers of the call request
     */
    public function __construct(string $apiUrl = self::API_URL, bool $verify = false, array $headers = ['Content-Type' => 'application/json'])
    {
        $this->client = new GuzzleHttpClient([
            'base_uri' => self::API_URL,
            'verify' => false,
        ]);
        $this->headers = $headers;
    }

    /**
     * Initializes the component.
     */
    public function init()
    {
        parent::init();
    }

    /**
     * @static Creates the base url of the call
     *
     * @param string $endpoint The endpoint of the call
     * @return string The base url
     */
    protected static function getEndpointBaseUrl(string $endpoint = ''): string
    {
        return self::API_URL . '/' . $endpoint;
    }

    /**
     * @static Creates the full url of the endpoint
     *
     * @param array $endpointParts The parts that consists the url. The position of the given values in the array is IMPORTANT
     * @param array $urlParams The parameters of the url query
     * @return string The endpoint url
     */
    protected static function getEndpointFullUrl(array $endpointParts, array $urlParams = []): string
    {
        $urlParamsStr = empty($urlParams) ? '' : '?' . http_build_query($urlParams);
        return implode('/', $endpointParts) . $urlParamsStr;
    }

    /**
     * @static Creates the full url of the call
     *
     * @param array $endpointParts The parts that consists the url
     * @param array $urlParams The parameters of the url query
     * @return string The full url
     */
    protected static function getFullUrl(array $endpointParts, array $urlParams = []): string
    {
        return self::API_URL . '/' . self::getEndpointFullUrl($endpointParts, $urlParams);
    }

    /**
     * Makes the request and handles the exceptions.
     * @link http://docs.guzzlephp.org/en/stable/quickstart.html#creating-a-client
     *
     * @param string $method The method of the call
     * @param array $endpointParts The parts of the endpoint to be called
     * @param array $options Various options for the call. The key 'urlParams' is about the parameters of the url query
     *
     * @return mixed|Response The response of the call
     * @throws UnknownSymbolException
     * @throws \Exception
     */
    public function makeRequest(string $method = 'get', array $endpointParts = ['/'], array $options = [])
    {
        $options = array_merge([
            'http_errors' => false,
        ], $options);
        // Get the url parameters
        $urlParams = empty($options['urlParams']) ? [] : $options['urlParams'];
        try {
            return $this->client->{$method}(self::getFullUrl($endpointParts, $urlParams), $options);
        } catch (ClientException $clientException) {
            if ($clientException->getResponse()->getBody() === 'Unknown symbol') {
                throw new UnknownSymbolException('IEXTrading.com replied with: ' . $clientException->getResponse()->getBody());
            }
            throw $clientException;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Sends the GET call request
     *
     * @param string $endpoint The endpoint of the call
     * @param array $options Additional options for the call
     * @return mixed
     */
    private function get(string $endpoint = '', array $options = []): Response 
    {
        return $this->client->{__FUNCTION__}($endpoint, $options);
    }

    /**
     * Checks if the call has been sent successfully
     *
     * @param Response|null $response The request response
     * @return bool If the response is successful or not
     */
    private function isResponseSuccessful(?Response $response): bool
    {
        return $response->getStatusCode() == 200 ? true : false;
    }

    /**
     * Gets the response of the call
     *
     * @param Response|null $response The request response
     * @return array|null The response as an array or null if response is not available
     */
    public function getResponse(?Response $response): ?array
    {
        if ($this->isResponseSuccessful($response)) {
            $jsonString = (string) $response->getBody();
            return (array)\GuzzleHttp\json_decode($jsonString, true);
        }

        return null;
    }

    /**
     * ************************************************** From here start the call requests methods for each endpoint **************************************************
     */

    /**
     * *************************** Markets ***************************
     */

    /**
     * Returns an array consisting of Market objects
     *
     * @return array An array of Market objects or null if nothing exists
     */
    public function getMarkets(): ?array
    {
        $requestCall = $this->makeRequest('get', [self::ENDPOINT_MARKET], []);
        $response = Yii::$app->IEXTradingApi->getResponse($requestCall);
        
        return (new Markets($response))->getMarkets() ?? null;
    }

    /**
     * Returns a specific Market
     *
     * @param string $market The market to get the info
     * @return Market|null The market for the specific market id or null if this does not exist
     */
    public function getMarket(string $market): ?Market
    {
        return $this->getMarkets()[$market] ?? null;
    }

    /**
     * *************************** Stocks ***************************
     */

    /**
     * Returns the logo for a specific ticker
     *
     * @param string $ticker The ticker to get the logo
     * @return StockLogo|null The logo for the specific ticker or null if this does not exist
     */
    public function getStockLogo(string $ticker): ?StockLogo
    {
        $requestCall = $this->makeRequest('get', [self::ENDPOINT_STOCK, $ticker, self::ENDPOINT_STOCK_LOGO], []);
        $response = Yii::$app->IEXTradingApi->getResponse($requestCall);

        return (new StockLogo($response)) ?? null;
    }

    /**
     * Returns the price for a specific ticker
     *
     * @param string $ticker The ticker to get the stock price
     * @return float|null The price for the specific ticker or null if this does not exist
     */
    public function getStockPrice(string $ticker): ?float
    {
        $requestCall = $this->makeRequest('get', [self::ENDPOINT_STOCK, $ticker, self::ENDPOINT_STOCK_PRICE], []);
        $response = Yii::$app->IEXTradingApi->getResponse($requestCall);

        return $response[0] ?? null;
    }

    /**
     * Returns the company for a specific ticker
     *
     * @param string $ticker The ticker to get the company info
     * @return StockCompany|null The company for the specific ticker or null if this does not exist
     */
    public function getStockCompany(string $ticker): ?StockCompany
    {
        $requestCall = $this->makeRequest('get', [self::ENDPOINT_STOCK, $ticker, self::ENDPOINT_STOCK_COMPANY], []);
        $response = Yii::$app->IEXTradingApi->getResponse($requestCall);

        return (new StockCompany($response)) ?? null;
    }

    /**
     * Returns the quote for a specific ticker
     *
     * @param string $ticker The ticker to get the stock quote
     * @param string $displayPercent If set to 'true', all percentage values will be multiplied by a factor of 100 (Ex: /stock/aapl/quote?displayPercent=true)
     * @return StockQuote|null The quote for the specific ticker or null if this does not exist
     */
    public function getStockQuote(string $ticker, string $displayPercent = 'false'): ?StockQuote
    {
        $requestCall = $this->makeRequest('get', [self::ENDPOINT_STOCK, $ticker, self::ENDPOINT_STOCK_QUOTE], ['urlParams' => ['displayPercent' => $displayPercent]]);
        $response = Yii::$app->IEXTradingApi->getResponse($requestCall);

        return (new StockQuote($response)) ?? null;
    }

    /**
     * @param string $ticker The market to get market-wide news or the company ticker for a specific company
     * @param null|int $items The number of the itemn news to get. Number between 1 and 50. Default is 10
     *
     * @return array The news for the specific market or ticker or null if nothing exists
     * @throws ItemCountPassedToStockNewsOutOfRangeException
     * @throws UnknownSymbolException
     * @throws \Exception
     */
    public function getStockNews(string $ticker = 'market', ?int $items = null): ?array
    {
        if (isset($items) && ($items < 1 || $items > 50)) {
            throw new ItemCountPassedToStockNewsOutOfRangeException('Items number should be a number between 1 and 50. You passed in: ' . $items);
        }

        $data = [];

        $urlParts = [self::ENDPOINT_STOCK, $ticker, self::ENDPOINT_STOCK_NEWS];

        if (isset($items) && $items !== null) {
            $urlParts = array_merge($urlParts, ['last', $items]);
        }

        // If the response contains data the they will be in array format and they should be iterated
        $requestCall = $this->makeRequest('get', $urlParts, []);
        $response = Yii::$app->IEXTradingApi->getResponse($requestCall);

        if (is_array($response)) {
            // Create each StockNews that is in $response
            foreach ($response as $key => $value) {
                $data[] = new StockNews($value);
            }

            return $data;
        }

        return null;
    }

    /**
     * Returns the quote list for a specific list type
     *
     * @param string $listType The list type to get the related quotes
     * @param string $displayPercent If set to 'true', all percentage values will be multiplied by a factor of 100 (Ex: /stock/aapl/quote?displayPercent=true)
     * @return array|null An array of quotes of the specific list or null if nothing exists
     */
    public function getStockList(string $listType, string $displayPercent = 'false'): ?array
    {
        $requestCall = $this->makeRequest('get', [self::ENDPOINT_STOCK, self::ENDPOINT_MARKET, self::ENDPOINT_STOCK_LIST, $listType], ['urlParams' => ['displayPercent' => $displayPercent]]);
        $response = Yii::$app->IEXTradingApi->getResponse($requestCall);

        return (new StockList($response))->getData() ?? null;
    }

    /**
     * Returns the peers for a specific ticker
     *
     * @param string $ticker The ticker to get the peers
     * @return array An array of the peers for the specific ticker or null if nothing exists
     */
    public function getStockPeers(string $ticker): array
    {
        $requestCall = $this->makeRequest('get', [self::ENDPOINT_STOCK, $ticker, self::ENDPOINT_STOCK_PEERS], []);
        $response = Yii::$app->IEXTradingApi->getResponse($requestCall);

        return $response;
    }

    /**
     * Returns an array containing all the sectors and their performance
     *
     * @return array The sector performance array
     */
    public function getStockSectorPerformance(): array
    {
        $requestCall = $this->makeRequest('get', [self::ENDPOINT_STOCK, self::ENDPOINT_MARKET, self::ENDPOINT_STOCK_SECTOR_PERFORMANCE], []);
        $response = Yii::$app->IEXTradingApi->getResponse($requestCall);

        return (new StockSectorPerformance($response))->getData();
    }

    /**
     * Returns the intraday stats
     *
     * @return StatsIntraday The intraday stats
     */
    public function getStatsIntraday(): StatsIntraday
    {
        $requestCall = $this->makeRequest('get', [self::ENDPOINT_STATS, self::ENDPOINT_STATS_INTRADAY], []);
        $response = Yii::$app->IEXTradingApi->getResponse($requestCall);

        return (new StatsIntraday($response));
    }

    /**
     * This call will return a minimum of the last five trading days up to all trading days of the current month
     *
     * @return array The recent stats list
     */
    public function getStatsRecent(): array
    {
        $requestCall = $this->makeRequest('get', [self::ENDPOINT_STATS, self::ENDPOINT_STATS_RECENT], []);
        $response = Yii::$app->IEXTradingApi->getResponse($requestCall);

        return (new StatsRecent($response))->getData();
    }

    /**
     * Returns an array containing all the reference data symbols
     *
     * @return array|null The array containing the reference data symbols or null if the call is not successful
     */
    public function getReferenceDataSymbols(): ?array
    {
        $requestCall = $this->makeRequest('get', [self::ENDPOINT_REFERENCE_DATA, self::ENDPOINT_REFERENCE_DATA_SYMBOLS], []);
        $response = Yii::$app->IEXTradingApi->getResponse($requestCall);

        $models = ReferenceDataSymbol::initializeModels($response);

        return ReferenceDataSymbol::getData();
    }

    /**
     * Returns the chart data for a specific ticker
     *
     * @param string $ticker The ticker to get the stock chart
     * @param string $range The range period of the stock chart
     * @return array|null The logo for the specific ticker or null if this does not exist
     */
    public function getStockChart(string $ticker, string $range = '1m'): ?array
    {
        $requestCall = $this->makeRequest('get', [self::ENDPOINT_STOCK, $ticker, self::ENDPOINT_STOCK_CHART, $range], []);
        $response = Yii::$app->IEXTradingApi->getResponse($requestCall);

        if (!in_array($range, StockChart::$supportedRanges)) {
            return null;
        }

        return (new StockChart($response))->getData() ?? null;
    }

    /**
     * Returns info for multiple symbols
     *
     * @param array $symbols The symbols to get the various info
     * @param array $types The types of the info
     * @param string $range The range of the data to get
     * @param int $lastItems The number of last items to get for the news type
     * @return array|null The logo for the specific ticker or null if this does not exist
     */
    public function getStockMarketBatch(array $symbols, array $types, string $range = '1m', $lastItems = 5): array
    {
        $urlParams = [
            'symbols' => implode(',', $symbols),
            'types' => implode(',', $types),
            'range' => $range,
            'last' => $lastItems,
        ];

        $requestCall = $this->makeRequest('get', [self::ENDPOINT_STOCK, self::ENDPOINT_MARKET, self::ENDPOINT_STOCK_BATCH], ['urlParams' => $urlParams]);
        $response = Yii::$app->IEXTradingApi->getResponse($requestCall);

        return (new StockMarketBatch($response, $types))->getData() ?? null;
    }

}
