<?php
namespace common\helpers;

use Yii;

/**
 * Class that contains various helper methods.
 */
class VariousHelper
{
    /**
     * Formats the datetime
     *
     * @param string $datetime The datetime to be formatted
     * @param string $formatFrom The current format
     * @param string $formatTo The target format
     * @return string The formatted datetime
     */
    public static function getFormattedDatetime(string $datetime, string $formatFrom = \DateTime::RFC3339, string $formatTo = 'd-m-Y H:i:s'): string
    {
        return (new \DateTime)::createFromFormat($formatFrom, $datetime)->format($formatTo) ?? '';
    }

    /**
     * Returns the european format number
     *
     * @param mixed $value The number being formatted
     * @param int $decimals Sets the number of decimal points
     * @param string $decPoint Sets the separator for the decimal point
     * @param string $thousandSeperator Sets the thousands separator
     * @return mixed The formatted number
     */
    public static function getEuropeanNumber($value, int $decimals = 2, string $decPoint = ',', string $thousandSeperator = '.')
    {
        return number_format($value, $decimals, $decPoint, $thousandSeperator);
    }

}
