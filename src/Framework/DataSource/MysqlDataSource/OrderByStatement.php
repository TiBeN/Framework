<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

/**
 * 
 *
 * @package MysqlDataSource
 * @author TiBeN
 */
class OrderByStatement extends AssociativeArray
{
    /**
     * Type of the element T
     * @var String
     */
    protected $TType;

    /**
     * @var string
     */
    const DIRECTION_ASC = 'ASC';

    /**
     * @var string
     */
    const DIRECTION_DESC = 'DESC';

    // Start of user code OrderByStatement.surchargedConstructorsDestructors
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
        // Start of user code OrderByStatement.toString
        // TODO should be implemented.
        // End of user code
    
        return $string;
    }

    /**
     * @param EntityMapping $entityMapping
     * @param GenericCollection $orderCriterias
     * @return OrderByStatement $orderByStatement
     */
    public static function createFromOrderCriterias(EntityMapping $entityMapping, GenericCollection $orderCriterias)
    {
        // Start of user code OrderByStatement.createFromOrderCriterias
        // TODO should be implemented.
        // End of user code
    
        return $orderByStatement;
    }
    // Start of user code OrderByStatement.surchargedMethods
    // Surcharge Methods here
    // End of user code

    // Start of user code OrderByStatement.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
