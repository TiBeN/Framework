<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\Entity\Entity;
use TiBeN\Framework\Entity\EntityMapping;

/**
 * 
 *
 * @package MysqlDataSource
 * @author TiBeN
 */
class ValuesStatement extends AssociativeArray
{
    /**
     * Type of the element T
     * @var String
     */
    protected $TType;

    // Start of user code ValuesStatement.surchargedConstructorsDestructors
    // Surcharge Constructors and Destructors here
    // End of user code
    
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
     * @param EntityMapping $entityMapping
     * @param Entity $entity
     * @return ValuesStatement $valuesStatement
     */
    public static function createFromEntity(EntityMapping $entityMapping, Entity $entity)
    {
        // Start of user code ValuesStatement.createFromEntity
        // TODO should be implemented.
        // End of user code
    
        return $valuesStatement;
    }

    /**
     * @return string $string
     */
    public function toString()
    {
        // Start of user code ValuesStatement.toString
        // TODO should be implemented.
        // End of user code
    
        return $string;
    }
    // Start of user code ValuesStatement.surchargedMethods
    // Surcharge Methods here
    // End of user code

    // Start of user code ValuesStatement.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
