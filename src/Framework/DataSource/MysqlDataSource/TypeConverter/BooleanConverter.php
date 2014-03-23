<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource\TypeConverter;

use TiBeN\Framework\DataSource\TypeConverter;

/**
 * 
 *
 * @package TypeConverter
 * @author TiBeN
 */
class BooleanConverter implements TypeConverter
{
    /**
     * Type of the element T
     * @var String
     */
    protected $TType;

    /**
     * Type of the element U
     * @var String
     */
    protected $UType;

    public function __construct($TType = null, $UType = null)
    {
        $this->TType = $TType;
        $this->UType = $UType;

        // Start of user code BooleanConverter.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code BooleanConverter.destructor
        // End of user code
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
     * U type getter
     * @var String
     */
    public function getUType()
    {
        return $this->UType;
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
        // TODO should be implemented.
        // End of user code
    
        return $dataSourceType;
    }

    /**
     * @param AssociativeArray $parameters
     */
    public function setParameters(AssociativeArray $parameters)
    {
        // Start of user code TypeConverter.setParameters
        // TODO should be implemented.
        // End of user code
    }

    /**
     * @return string $type
     */
    public function getType()
    {
        // Start of user code TypeConverter.getType
        // TODO should be implemented.
        // End of user code
    
        return $type;
    }

    /**
     * @param T $itemToConvert
     * @return U $convertedItem
     */
    public function convert($itemToConvert)
    {
        $this->typeHint($this->TType, $itemToConvert);
        // Start of user code Converter.convert
        // TODO should be implemented.
        // End of user code
    
        return $convertedItem;
    }

    /**
     * @param U $itemToReverse
     * @return T $reversedItem
     */
    public function reverse($itemToReverse)
    {
        $this->typeHint($this->UType, $itemToReverse);
        // Start of user code Converter.reverse
        // TODO should be implemented.
        // End of user code
    
        return $reversedItem;
    }

    // Start of user code BooleanConverter.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
