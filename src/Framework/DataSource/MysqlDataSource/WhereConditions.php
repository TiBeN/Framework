<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Entity\EntityMapping;
use TiBeN\Framework\Entity\CriteriaSet;
use TiBeN\Framework\Entity\Entity;
use TiBeN\Framework\Datatype\AssociativeArray;

/**
 * 
 *
 * @package MysqlDataSource
 * @author TiBeN
 */
class WhereConditions
{
    /**
     * @var Expr
     */
    public $expr;

    /**
     * @var AssociativeArray
     */
    public $statementParameters;

    public function __construct()
    {
        // Start of user code WhereConditions.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code WhereConditions.destructor
        // End of user code
    }

    /**
     * @return Expr
     */
    public function getExpr()
    {
        // Start of user code Getter WhereConditions.getExpr
        // End of user code
        return $this->expr;
    }

    /**
     * @param Expr $expr
     */
    public function setExpr(Expr $expr)
    {
        // Start of user code Setter WhereConditions.setExpr
        // End of user code
        $this->expr = $expr;
    }

    /**
     * @return AssociativeArray
     */
    public function getStatementParameters()
    {
        // Start of user code Getter WhereConditions.getStatementParameters
        // End of user code
        return $this->statementParameters;
    }

    /**
     * @param AssociativeArray $statementParameters
     */
    public function setStatementParameters(AssociativeArray $statementParameters)
    {
        // Start of user code Setter WhereConditions.setStatementParameters
        // End of user code
        $this->statementParameters = $statementParameters;
    }

    /**
     * @param EntityMapping $entityMapping
     * @param Entity $entity
     * @return WhereConditions $whereConditions
     */
    public static function createEntityTargetFromEntity(EntityMapping $entityMapping, Entity $entity)
    {
        // Start of user code WhereConditions.createEntityTargetFromEntity
        // TODO should be implemented.
        // End of user code
    
        return $whereConditions;
    }

    /**
     * @param Expr $expr
     * @return WhereConditions $whereConditions
     */
    public static function createFromExpr(Expr $expr)
    {
        // Start of user code WhereConditions.createFromExpr
        // TODO should be implemented.
        // End of user code
    
        return $whereConditions;
    }

    /**
     * @param CriteriaSet $criteriaSet
     * @param EntityMapping $entityMapping
     * @return WhereConditions $whereCondition
     */
    public static function createFromCriteriaSet(CriteriaSet $criteriaSet, EntityMapping $entityMapping)
    {
        // Start of user code WhereConditions.createFromCriteriaSet
        // TODO should be implemented.
        // End of user code
    
        return $whereCondition;
    }

    /**
     * @return string $string
     */
    public function toString()
    {
        // Start of user code WhereConditions.toString
        // TODO should be implemented.
        // End of user code
    
        return $string;
    }

    // Start of user code WhereConditions.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
