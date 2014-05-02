<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\Entity\EntityMapping;
use TiBeN\Framework\Entity\Entity;

// Start of user code ValuesStatement.useStatements
// Place your use statements here.
// End of user code

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
     * @return string $string
     */
    public function toString()
    {
        // Start of user code ValuesStatement.toString
	    if($this->isEmpty()) {
	        throw new \LogicException('The ValuesStatement is empty');
	    }	    
	    $string = sprintf(
	        'VALUES(%s)', 
	        implode(
                ',', 
                array_map(
                    function($columnName){ return ':' . $columnName; },                        
                    array_keys($this->items)                    
                )
            )
        );		 
        // End of user code
    
        return $string;
    }

    /**
     * @param EntityMapping $entityMapping
     * @param Entity $entity
     * @return ValuesStatement $valuesStatement
     */
    public static function createFromEntity(EntityMapping $entityMapping, Entity $entity)
    {
        // Start of user code ValuesStatement.createFromEntity
        $converter = new RowToEntityConverter();
        $converter->setEntityMapping($entityMapping);
        $rows = $converter->reverse($entity);
        $valuesStatement = ValuesStatement::createFromNativeArray(
            null, 
            $rows->toNativeArray()
        );
        // End of user code
    
        return $valuesStatement;
    }

    // Start of user code ValuesStatement.surchargedMethods
    // Surcharge Methods here
    // End of user code

    // Start of user code ValuesStatement.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
