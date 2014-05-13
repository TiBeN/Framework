<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Entity\EntityMapping;
use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\Entity\Entity;

// Start of user code SetStatement.useStatements
// Place your use statements here.
// End of user code

/**
 * 
 *
 * @package TiBeN\Framework\DataSource\MysqlDataSource
 * @author TiBeN
 */
class SetStatement extends AssociativeArray
{
    /**
     * Type of the element T
     * @var String
     */
    protected $TType;

    // Start of user code SetStatement.surchargedConstructorsDestructors
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
     * @return AssociativeArray $statementParameters
     */
    public function getStatementParameters()
    {
        // Start of user code SetStatement.getStatementParameters
	    $statementParameters = AssociativeArray::createFromNativeArray(
            null, 
            $this->toNativeArray()
		);
        // End of user code
    
        return $statementParameters;
    }

    /**
     * @param EntityMapping $entityMapping
     * @param Entity $entity
     * @return SetStatement $setStatement
     */
    public static function createKeyValueListFromEntity(EntityMapping $entityMapping, Entity $entity)
    {
        // Start of user code SetStatement.createKeyValueListFromEntity
        $converter = new RowToEntityConverter();
        $converter->setEntityMapping($entityMapping);
        $row = $converter->reverse($entity);
        $setStatement = SetStatement::createFromNativeArray(null, $row->toNativeArray());
        // End of user code
    
        return $setStatement;
    }

    /**
     * @return string $string
     */
    public function toString()
    {
        // Start of user code SetStatement.toString
		$statementChunks = array();
		foreach($this as $attribute => $value) {
		    array_push($statementChunks, sprintf('%1$s=:%1$s', $attribute));
		}
		$string = 'SET ' . implode(',', $statementChunks);
        // End of user code
    
        return $string;
    }

    // Start of user code SetStatement.surchargedMethods
    // Surcharge Methods here
    // End of user code

    // Start of user code SetStatement.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
