<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\Datatype\GenericCollection;

// Start of user code SelectExpr.useStatements
// Place your use statements here.
// End of user code

/**
 * Represent a select_expr statement chunk.
 * 
 *
 * @package TiBeN\Framework\DataSource\MysqlDataSource
 * @author TiBeN
 */
class SelectExpr extends GenericCollection
{
    /**
     * Type of the element T
     * @var String
     */
    protected $TType;

    // Start of user code SelectExpr.surchargedConstructorsDestructors
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
     * Factory method that generate a comma separated 
     * list of column names from a collection 
     * of entity attribute mappings.
     *
     * @param AssociativeArray $attributeMappings
     * @return SelectExpr $selectExpr
     */
    public static function createFromEntityAttributes(AssociativeArray $attributeMappings)
    {
        // Start of user code SelectExpr.createFromEntityAttributes
        $selectExpr = new self;
        foreach($attributeMappings->toNativeArray()
            as $attributeName => $attributeMapping
        ) {
            $selectExpr->add(
                $attributeMapping
                    ->getDataSourceAttributeMappingConfiguration()
                    ->getColumnName()
            );
        }         
        // End of user code
    
        return $selectExpr;
    }

    /**
     * Generate the select_expr as a string
     *
     * @return string $string
     */
    public function toString()
    {
        // Start of user code SelectExpr.toString
        if($this->isEmpty()) {
            throw new \LogicException('The SelectExpr is empty');
        }      
        
        $string = implode(',', $this->items);
        // End of user code
    
        return $string;
    }

    // Start of user code SelectExpr.surchargedMethods
    // Surcharge Methods here
    // End of user code

    // Start of user code SelectExpr.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
