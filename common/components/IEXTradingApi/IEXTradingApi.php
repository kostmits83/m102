<?php
namespace common\components\IEXTradingApi;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\ClientException;

use \Psr\Http\Message\ResponseInterface AS Response;

use common\components\IEXTradingApi\Responses\Markets\Markets;
use common\components\IEXTradingApi\Responses\Markets\Market;

use common\components\IEXTradingApi\Responses\Stocks\StockLogo;
use common\components\IEXTradingApi\Responses\Stocks\StockQuote;
use common\components\IEXTradingApi\Responses\Stocks\StockCompany;

use common\components\IEXTradingApi\Exceptions\UnknownSymbolException;

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
    const ENDPOINT_REF_DATA = 'ref-data';

    // Company logo
    const ENDPOINT_LOGO = 'logo';
    
    const ENDPOINT_PRICE = 'price';
    const ENDPOINT_QUOTE = 'quote';
    const ENDPOINT_COMPANY = 'company';

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
     * @param $response
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
     * Creates the base url of the call
     *
     * @param string $endpoint The endpoint of the call
     *
     * @return string The base url
     */
    protected static function getEndpointBaseUrl(string $endpoint = ''): string
    {
        return self::API_URL . '/' . $endpoint;
    }

    /**
     * Creates the full url of the endpoint
     *
     * @param array $endpointParts The parts that consists the url. The position of the given values in the array is IMPORTANT
     *
     * @return string The endpoint url
     */
    protected static function getEndpointFullUrl(array $endpointParts): string
    {
        return implode('/', $endpointParts);
    }

    /**
     * Creates the full url of the call
     *
     * @param array $endpointParts The parts that consists the url
     *
     * @return string The full url
     */
    protected static function getFullUrl(array $endpointParts): string
    {
        return self::API_URL . '/' . self::getEndpointFullUrl($endpointParts);
    }

    /**
     * Makes the request and handles the exceptions.
     * @link http://docs.guzzlephp.org/en/stable/quickstart.html#creating-a-client
     *
     * @param string $method The method of the call
     * @param array $endpointParts The parts of the endpoint to be called
     * @param array $options Various options for the call
     *
     * @return mixed|Response The response of the call
     * @throws UnknownSymbolException
     * @throws \Exception
     */
    public function makeRequest(string $method = 'get', array $endpointParts = ['/'], array $options = [])
    {
        try {
            return $this->client->{$method}(self::getFullUrl($endpointParts), $options);
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
     *
     * @return mixed
     */
    private function get(string $endpoint = '', array $options = []): Response 
    {
        return $this->client->{__FUNCTION__}($endpoint, $options);
    }

    /**
     * Sends the POST call request
     *
     * @param string $endpoint The endpoint of the call
     * @param array $options Additional options for the call
     *
     * @return mixed
     */
    private function post(string $endpoint = '', array $options = []): Response 
    {
        return $this->client->{__FUNCTION__}($endpoint, $options);
    }

    /**
     * Checks if the call has been sent successfully
     *
     * @param Response|null $response The request response
     *
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
     *
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
     * @return array An array of Market objects
     */
    public function getMarkets(): array
    {
        $requestCall = $this->makeRequest('get', [self::ENDPOINT_MARKET], []);
        $response = Yii::$app->IEXTradingApi->getResponse($requestCall);
        
        return (new Markets($response))->getMarkets();
    }

    /**
     * Returns a specific Market
     *
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
     * @return StockLogo|null The logo for the specific ticker or null if this does not exist
     */
    public function getStockLogo(string $ticker): ?StockLogo
    {
        $requestCall = $this->makeRequest('get', [self::ENDPOINT_STOCK, $ticker, self::ENDPOINT_LOGO], []);
        $response = Yii::$app->IEXTradingApi->getResponse($requestCall);

        return (new StockLogo($response)) ?? null;
    }

    /**
     * Returns the price for a specific ticker
     *
     * @return float|null The price for the specific ticker or null if this does not exist
     */
    public function getStockPrice(string $ticker): ?float
    {
        $requestCall = $this->makeRequest('get', [self::ENDPOINT_STOCK, $ticker, self::ENDPOINT_PRICE], []);
        $response = Yii::$app->IEXTradingApi->getResponse($requestCall);
        return $response[0] ?? null;
    }

    /**
     * Returns the company for a specific ticker
     *
     * @return StockCompany|null The company for the specific ticker or null if this does not exist
     */
    public function getStockCompany(string $ticker): ?StockCompany
    {
        $requestCall = $this->makeRequest('get', [self::ENDPOINT_STOCK, $ticker, self::ENDPOINT_COMPANY], []);
        $response = Yii::$app->IEXTradingApi->getResponse($requestCall);
        return (new StockCompany($response)) ?? null;
    }

    /**
     * Returns the quote for a specific ticker
     *
     * @return StockQuote|null The quote for the specific ticker or null if this does not exist
     */
    public function getStockQuote(string $ticker): ?StockQuote
    {
        $requestCall = $this->makeRequest('get', [self::ENDPOINT_STOCK, $ticker, self::ENDPOINT_QUOTE], []);
        $response = Yii::$app->IEXTradingApi->getResponse($requestCall);
        return (new StockQuote($response)) ?? null;
    }

}
