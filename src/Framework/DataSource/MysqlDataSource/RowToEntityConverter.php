<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Entity\EntityMapping;
use TiBeN\Framework\Datatype\U;
use TiBeN\Framework\Datatype\Converter;
use TiBeN\Framework\Datatype\T;

/**
 * 
 *
 * @package MysqlDataSource
 * @author TiBeN
 */
class RowToEntityConverter implements Converter
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

    /**
     * @var EntityMapping
     */
    public $entityMapping;

    public function __construct($UType = null, $TType = null)
    {
        $this->UType = $UType;
        $this->TType = $TType;

        // Start of user code RowToEntityConverter.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code RowToEntityConverter.destructor
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

    /**
     * @return EntityMapping
     */
    public function getEntityMapping()
    {
        // Start of user code Getter RowToEntityConverter.getEntityMapping
        // End of user code
        return $this->entityMapping;
    }

    /**
     * @param EntityMapping $entityMapping
     */
    public function setEntityMapping(EntityMapping $entityMapping)
    {
        // Start of user code Setter RowToEntityConverter.setEntityMapping
        // End of user code
        $this->entityMapping = $entityMapping;
    }

    // Converter Realization

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

    // Start of user code RowToEntityConverter.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
