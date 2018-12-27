<?php
namespace common\components\IEXTradingApi\Responses\Markets;

use common\components\IEXTradingApi\Responses\IEXTradingApiResponse;

class Market extends IEXTradingApiResponse
{
	const MARKET_ID = 'mic';

	/**
     * @var string Refers to the Market Identifier Code (MIC)
     */
	public $mic;

	/**
     * @var string Refers to the tape id of the venue
     */
    public $tapeId;

    /**
     * @var string Refers to name of the venue defined by IEX
     */
    public $venueName;

    /**
     * @var int Refers to the amount of traded shares reported by the venue
     */
    public $volume;

    /**
     * @var int Refers to the amount of Tape A traded shares reported by the venue
     */
    public $tapeA;

    /**
     * @var int Refers to the amount of Tape B traded shares reported by the venue
     */
    public $tapeB;

    /**
     * @var int Refers to the amount of Tape C traded shares reported by the venue
     */
    public $tapeC;

    /**
     * @var float Refers to the venue’s percentage of shares traded in the market
     */
    public $marketPercent;

    /**
     * @var int Refers to the last update time of the data in milliseconds since midnight Jan 1, 1970
     */
    public $lastUpdated;

    // The class attributes
    /**
    * @static array The class attributes
    */
    public static $attributes = [
    	'mic', 'tapeId', 'venueName', 'volume', 'tapeA', 'tapeB', 'tapeC', 'marketPercent', 'lastUpdated',
    ];

    /**
     * Market constructor
     *
     * @param $response
     */
    public function __construct($response)
    {
    	foreach (self::$attributes as $attribute) {
			$this->{$attribute} = $response[$attribute];
    	}
    }

}
