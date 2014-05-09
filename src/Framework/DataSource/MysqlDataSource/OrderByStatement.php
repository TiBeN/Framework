<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\Entity\OrderCriteria;
use TiBeN\Framework\Entity\EntityMapping;
use TiBeN\Framework\Datatype\GenericCollection;

// Start of user code OrderByStatement.useStatements
// Place your use statements here.
// End of user code

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
    const DIRECTION_DESC = 'DESC';

    /**
     * @var string
     */
    const DIRECTION_ASC = 'ASC';

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
        if($this->isEmpty()) {
            throw new \LogicException('No column name set');
        }

        $exprChunks = array();
        foreach($this as $columnName => $direction) {
            array_push($exprChunks, $columnName . ' ' . $direction); 
        }
        $string = 'ORDER BY ' . implode(', ', $exprChunks);
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
        $orderByStatement = new self('string');
        $mapper = new MysqlEntityAttributeMapper();
        $mapper->setEntityMapping($entityMapping);
        foreach($orderCriterias as $orderCriteria) {
            $orderByStatement->set(
                $mapper->getColumnName($orderCriteria->getAttribute()),
                self::$orderCriteriaOrderByDirectionMapping[$orderCriteria->getDirection()]
            );
        }
        // End of user code
    
        return $orderByStatement;
    }

    // Start of user code OrderByStatement.surchargedMethods
    // Surcharge Methods here
    // End of user code

    // Start of user code OrderByStatement.implementationSpecificMethods

	/**
	 * Hold direction mappings between the entity order criteria and Mysql order by statement
     *
	 * @var array
	 */	
	public static $orderCriteriaOrderByDirectionMapping = array(
        OrderCriteria::DIRECTION_ASC => self::DIRECTION_ASC,
        OrderCriteria::DIRECTION_DESC => self::DIRECTION_DESC	        		
	);
    // End of user code
}
