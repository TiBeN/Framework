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
class StatementFactory
{
    public function __construct()
    {
        // Start of user code StatementFactory.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code StatementFactory.destructor
        // End of user code
    }

    /**
     * @param EntityMapping $entityMapping
     * @param Entity $entity
     * @return DeleteStatement $deleteStatement
     */
    public static function createDeleteStatement(EntityMapping $entityMapping, Entity $entity)
    {
        // Start of user code StatementFactory.createDeleteStatement
        // TODO should be implemented.
        // End of user code
    
        return $deleteStatement;
    }

    /**
     * @param EntityMapping $entityMapping
     * @param Entity $entity
     * @return UpdateStatement $updateStatement
     */
    public static function createUpdateStatementFromEntity(EntityMapping $entityMapping, Entity $entity)
    {
        // Start of user code StatementFactory.createUpdateStatementFromEntity
        // TODO should be implemented.
        // End of user code
    
        return $updateStatement;
    }

    /**
     * @param string $statementString
     * @param AssociativeArray $parameters
     * @return GenericStatement $genericStatement
     */
    public static function createFromString($statementString, AssociativeArray $parameters)
    {
        // Start of user code StatementFactory.createFromString
        // TODO should be implemented.
        // End of user code
    
        return $genericStatement;
    }

    /**
     * @param EntityMapping $entityMapping
     * @param Entity $entity
     * @return InsertStatement $insertStatement
     */
    public static function createInsertStatement(EntityMapping $entityMapping, Entity $entity)
    {
        // Start of user code StatementFactory.createInsertStatement
        // TODO should be implemented.
        // End of user code
    
        return $insertStatement;
    }

    /**
     * @param EntityMapping $entityMapping
     * @param CriteriaSet $criteriaSet
     * @return SelectStatement $selectStatement
     */
    public static function createSelectStatementFromCriteriaSet(EntityMapping $entityMapping, CriteriaSet $criteriaSet)
    {
        // Start of user code StatementFactory.createSelectStatementFromCriteriaSet
        // TODO should be implemented.
        // End of user code
    
        return $selectStatement;
    }

    // Start of user code StatementFactory.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
