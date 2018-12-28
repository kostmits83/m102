<?php
namespace common\components\IEXTradingApi\Responses\ReferenceData;

use common\components\IEXTradingApi\Responses\IEXTradingApiResponse;

class ReferenceDataSymbol extends IEXTradingApiResponse
{
    // The data list to be returned as a result or null on failure
    private $data;

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
        if (is_array($response)) {
            $this->data = [];
            // Create each ReferenceDataSymbol that exists in $response
            foreach ($response as $key => $value) {
                $this->data[] = new self($value);
            }
        } else {
            $this->data = null;
        }
    }

    /**
     * @static Returns the issue type
     * 
     * @param string $type The type of the issue
     *
     * @return string|null The issue type or null if does not exist
     */
    public static function getIssueType(?string $type): ?string
    {
        return self::$issueTypes[$type] ?? null;
    }

    /**
     * Returns the reference data symbols
     *
     * @return array|null An array of symbols of the specific list or null if nothing exists
     */
    public function getData(): ?array
    {
        return is_array($this->data) ? $this->data : null;
    }

}
