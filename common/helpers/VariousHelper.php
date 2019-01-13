<?php
namespace common\helpers;

use Yii;
use kartik\growl\Growl;

/**
 * Class that contains various helper methods.
 */
class VariousHelper
{
    /**
     * Formats the datetime
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

    /**
     * Returns the percent of a raw pecent e.g. 0,072 becomes 7,2
     * @param mixed $value The number being formatted
     * @param bool $addPercentSymbol If the percent symbol is going to be concatenated
     * @param bool $europeanFormat If the percent should be in european format
     * @return mixed The formatted number
     */
    public static function percentize($value, bool $addPercentSymbol = true, bool $europeanFormat = true)
    {
        $number = number_format($value * 100, 2);
        $number = $europeanFormat ? self::getEuropeanNumber($number, 2) : $number;
        return $addPercentSymbol ? $number . '%' : $number;
    }

    /**
     * Echoes the growl flash messages
     * @return void
     */
    public static function htmlGrowlMessages(): void
    {
        if (!empty(Yii::$app->session->getAllFlashes())) {
            foreach (Yii::$app->session->getAllFlashes() as $message) {
                echo Growl::widget($message);
            }
        }
    }

    /**
     * Sets the growl message
     * @param array $params The parameters for the growl flash message
     * @return void
     */
    public static function setGrowlFlash(array $params = []): void
    {
        $params = array_merge([
            'type' => 'success',
            'title' => 'success',
            'icon' => 'glyphicon glyphicon-exclamation-sign',
            'body' => 'contact_success',
            'show_separator' => true,
            'delay' => 0,
            'plugin_options' => [
                'delay' => 10000,
                'timer' => 200,
                'show_progressbar' => true,
            ],
            'icons' => [
                'success' => 'glyphicon glyphicon-exclamation-sign',
                'danger' => 'glyphicon glyphicon-remove-sign',
            ],
            
        ], $params);
        
        if (empty($params['icon']) && !empty($params['icons'][$params['type']])) {
            $icon = $params['icons'][$params['type']];
        } else {
            $icon = $params['icons']['success'];
        }
        
        Yii::$app->session->setFlash($params['type'], [
            'type' => Growl::TYPE_SUCCESS,
            'title' => Yii::t('app', $params['title']),
            'icon' => $icon,
            'body' => Yii::t('app', $params['body']),
            'showSeparator' => $params['show_separator'],
            'delay' => $params['delay'],
            'pluginOptions' => [
                'delay' => $params['plugin_options']['delay'],
                'timer' => $params['plugin_options']['timer'],
                'showProgressbar' => $params['plugin_options']['show_progressbar'],
                'placement' => [
                    'from' => 'top',
                    'align' => 'center',
                ],
            ],
            'progressBarOptions' => [
                'role' => 'progressbar',
                'aria-valuenow' => '0',
                'aria-valuemin' => '0',
                'aria-valuemax' => '100',
                'style' => '30',
            ],
        ]);
    }

    /**
     * Returns the css class for the stock according to its change
     * @param mixed $value The value of the change
     * @return string The css class
     */
    public static function getUpDown($value): string
    {
        if ($value > 0) {
            return 'success';
        } elseif ($value < 0) {
            return 'danger';
        } else {
            return 'default';
        }
    }

    /**
     * Returns the indicator for the stock according to its change
     * @param mixed $value The value of the change
     * @return string The indicator
     */
    public static function getUpDownIndicator($value): string
    {
        if ($value > 0) {
            return '<span class="movement-indicator movement-indicator--success"><i class="fas fa-angle-up"></i></span>';
        } elseif ($value < 0) {
            return '<span class="movement-indicator movement-indicator--danger"><i class="fas fa-angle-down"></i></span>';
        } else {
            return '<span class="movement-indicator movement-indicator--default"><i class="fas fa-minus"></i></span>';
        }
    }

    /**
     * Returns the css class for the stock according to its stock_id and type_id
     * @param int $stockId The stock id
     * @param int $typeId The id of the favorite or comparison type
     * @return string The css class
     */
    public static function getStockFavorsDeleteCssClass(int $stockId, int $typeId): string
    {
        return 'stock-favors-' . $typeId . '-' . $stockId;
    }

}
