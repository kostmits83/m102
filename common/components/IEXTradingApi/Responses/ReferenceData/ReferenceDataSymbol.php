<?php
namespace common\components\IEXTradingApi\Responses\ReferenceData;

use common\components\IEXTradingApi\Responses\IEXTradingApiResponse;

class ReferenceDataSymbol extends IEXTradingApiResponse
{
    /**
     * @static The data list to be returned as a result or null on failure
     */
    private static $data;

    /**
     * @var string Refers to the symbol represented in Nasdaq Integrated symbology (INET)
     */
    public $symbol;

    /**
     * @var string Refers to the name of the company or security
     */
    public $name;

    /**
     * @var string Refers to the date the symbol reference data was generated
     */
    public $date;

    /**
     * @var bool Will be true if the symbol is enabled for trading on IEX
     */
    public $isEnabled;

    /**
     * @var string Refers to the common issue type
     */
    public $type;

    /**
     * @var string Unique ID applied by IEX to track securities through symbol changes
     */
    public $iex;

    /**
    * @static array Refers to the common issue type
    */
    private static $issueTypes = [
        'AD' => 'ADR',
        'RE' => 'REIT',
        'CE' => 'Closed end fund',
        'SI' => 'Secondary Issue',
        'LP' => 'Limited Partnerships',
        'CS' => 'Common Stock',
        'ET' => 'ETF',
    ];

    /**
     * ReferenceDataSymbol constructor
     *
     * @param $response
     */
    public function __construct($response)
    {
        parent::__construct($response);
    }

    /**
     * @static Initialize all the objects from the call request
     * @param $response
     * @return void
     */
    public static function initializeModels($response)
    {
        foreach ($response as $key => $value) {
            $newResponse = [];
            foreach ($value as $propertyName => $propertyValue) {
                $newResponse[$propertyName] = $propertyValue;
            }
            static::$data[] = new self($newResponse);
        }
    }

    /**
     * @static Returns the issue type
     * @param string $type The type of the issue
     * @return string|null The issue type or null if does not exist
     */
    public static function getIssueType(?string $type): ?string
    {
        return self::$issueTypes[$type] ?? null;
    }

    /**
     * Returns the reference data symbols
     * @return array|null An array of symbols of the specific list or null if nothing exists
     */
    public static function getData(): ?array
    {
        return is_array(self::$data) ? self::$data : null;
    }

}
