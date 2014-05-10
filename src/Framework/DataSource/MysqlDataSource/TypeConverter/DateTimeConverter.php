<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource\TypeConverter;

use TiBeN\Framework\Datatype\T;
use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\DataSource\TypeConverter;
use TiBeN\Framework\Datatype\U;

// Start of user code DateTimeConverter.useStatements
// Place your use statements here.
// End of user code

/**
 * 
 *
 * @package TypeConverter
 * @author TiBeN
 */
class DateTimeConverter implements TypeConverter
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

        // Start of user code DateTimeConverter.constructor
        $this->TType = '\DateTime';
        $this->UType = 'string';
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code DateTimeConverter.destructor
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
     * @param U $itemToReverse
     * @return T $reversedItem
     */
    public function reverse($itemToReverse)
    {
        $this->typeHint($this->UType, $itemToReverse);
        // Start of user code Converter.reverse
        if(is_null($itemToReverse)) return $itemToReverse;
        $reversedItem = \DateTime::createFromFormat(
            'Y-m-d H:i:s',
            $itemToReverse
        );
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
        $convertedItem = $itemToConvert->format('Y-m-d H:i:s');
        // End of user code
    
        return $convertedItem;
    }

    /**
     * @return string $type
     */
    public function getType()
    {
        // Start of user code TypeConverter.getType
        $type = 'datetime';
        // End of user code
    
        return $type;
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

    // Start of user code DateTimeConverter.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
