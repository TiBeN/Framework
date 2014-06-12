<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource\TypeConverter;

use TiBeN\Framework\DataSource\TypeConverter;
use TiBeN\Framework\Datatype\T;
use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\Datatype\U;

// Start of user code BooleanConverter.useStatements
// Place your use statements here.
// End of user code

/**
 * Convert a PHP boolean to it's Mysql equivalent.
 *
 * @package TiBeN\Framework\DataSource\MysqlDataSource\TypeConverter
 * @author TiBeN
 */
class BooleanConverter implements TypeConverter
{
    /**
     * Type of the element U
     * @var String
     */
    protected $UType;

    /**
     * Type of the element T
     * @var String
     */
    protected $TType;

    public function __construct($UType = null, $TType = null)
    {
        $this->UType = $UType;
        $this->TType = $TType;

        // Start of user code BooleanConverter.constructor
        $this->TType = 'boolean';
        $this->UType = 'string';
        // End of user code
    }

    /**
     * U type getter
     * @var String
     */
    public function getUType()
    {
        return $this->UType;
    }

    /**
     * T type getter
     * @var String
     */
    public function getTType()
    {
        return $this->TType;
    }

    /**
     * Emulate Templates (generics) in PHP. Check if the type of the object match
     * type specified in constructor.
     * If no type (null) if specified in the constructor, then type is not checked.
     *
     * @param string $type
     * @param <$type> $variable
     * @return boolean 
     */
    private static function typeHint($type, $variable)
    {
        if ($type == null || $variable == null) {
            return;
        }

        if (is_object($variable)) {
            $hint = is_a($variable, $type);
            $varType = get_class($variable);
        } else {
            $varType = gettype($variable);
            $hint = $varType == $type;
        }

        if (!$hint) {
            throw new \InvalidArgumentException(
                sprintf('expects parameter to be %s, %s given', $type, $varType)
            );
        }
    }


    // TypeConverter Realization

    /**
     * @return string $dataSourceType
     */
    public function getDataSourceType()
    {
        // Start of user code TypeConverter.getDataSourceType
        $dataSourceType = 'mysql';
        // End of user code
    
        return $dataSourceType;
    }

    /**
     * @return string $type
     */
    public function getType()
    {
        // Start of user code TypeConverter.getType
        $type = 'boolean';
        // End of user code
    
        return $type;
    }

    /**
     * @param AssociativeArray $parameters
     */
    public function setParameters(AssociativeArray $parameters)
    {
        // Start of user code TypeConverter.setParameters
        // Nothing to do here
        // End of user code
    }

    /**
     * @param U $itemToReverse
     * @return T $reversedItem
     */
    public function reverse($itemToReverse)
    {
        $this->typeHint($this->UType, $itemToReverse);
        // Start of user code Converter.reverse
        if(is_null($itemToReverse)) return $itemToReverse;
        $reversedItem = $itemToReverse === '1'
            ? true
            : false
        ;
        // End of user code
    
        return $reversedItem;
    }

    /**
     * @param T $itemToConvert
     * @return U $convertedItem
     */
    public function convert($itemToConvert)
    {
        $this->typeHint($this->TType, $itemToConvert);
        // Start of user code Converter.convert
        if(is_null($itemToConvert)) return $itemToConvert;
        $convertedItem = $itemToConvert === true
            ? '1'
            : '0'
        ;
        // End of user code
    
        return $convertedItem;
    }

    // Start of user code BooleanConverter.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
