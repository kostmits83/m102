<?php
namespace common\components\IEXTradingApi\Responses;

abstract class IEXTradingApiResponse
{
	/**
     * StockQuote constructor
     *
     * @param $response
     */
    public function __construct($response)
    {
        // Use reflection to get all public properties of the class which called
        $reflect = new \ReflectionClass(static::class);
        $properties = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC);

        foreach ($properties as $property) {
            $propertyName = $property->getName();
            // Interesect with only those properties that are in the call response
            if (array_key_exists($propertyName, $response)) {
                $this->{$propertyName} = $response[$propertyName];
            }
        }
    }

}
