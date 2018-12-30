<?php
namespace common\components\IEXTradingApi\Responses;

use yii\helpers\Inflector;

abstract class IEXTradingApiResponse
{
    protected static $properties = [];
    protected static $propertyLabels = [];

	/**
     * StockQuote constructor
     *
     * @param $response
     */
    public function __construct($response)
    {
        static::$properties = static::getResponseProperties();
        foreach (static::$properties as $property) {
            $propertyName = $property->getName();
            // Interesect with only those properties that are in the call response
            if (array_key_exists($propertyName, $response)) {
                $this->{$propertyName} = $response[$propertyName];
            }
        }
    }

    /**
     * @static Get the response model properties using reflection to get all public properties of the class which called
     *
     * @param int $option The modifier indicator option
     * @return array The properties of the reponse model
     */
    public static function getResponseProperties(int $option = \ReflectionProperty::IS_PUBLIC): array
    {
        $reflect = new \ReflectionClass(static::class);
        return $reflect->getProperties($option);
    }

    /**
     * @static Converts a CamelCase name into space-separated words
     *
     * @param string $string The string to get formatted
     * @return string The formatted string
     */
    public static function camel2words(string $string): string
    {
        return Inflector::camel2words($string);
    }

    /**
     * @static Set and gett all the public properties labels
     *
     * @return array The labels of the properties
     */
    public static function getPropertyLabels()
    {
        foreach (static::$properties as $property) {
            $propertyName = $property->getName();
            static::$propertyLabels[$propertyName] = self::camel2words($propertyName);
        }
        return static::$propertyLabels;
    }

    /**
     * @static Get a property label by its property name
     *
     * @return string The property label
     */
    public static function getPropertyLabel(string $propertyName): string
    {
        self::getPropertyLabels();
        return static::$propertyLabels[$propertyName] ?? '';
    }

    /**
     * @static Returns the title for the specific property
     *
     * @param string $property The property to get the title
     * @return string The title of the property or an empty string if the property has not been set
     */
    public static function getPropertyTitle(string $property): string
    {
        return static::getPropertyTitles()[$property] ?? '';
    }

}
