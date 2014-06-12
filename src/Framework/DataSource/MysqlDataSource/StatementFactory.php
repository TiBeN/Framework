<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\Entity\EntityMapping;
use TiBeN\Framework\Entity\CriteriaSet;
use TiBeN\Framework\Entity\Entity;

// Start of user code StatementFactory.useStatements
// Place your use statements here.
// End of user code

/**
 * Factory methods that generate 
 * common mysql statements (select / insert etc.) 
 * from entities.
 *
 * @package TiBeN\Framework\DataSource\MysqlDataSource
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
     * Create an "insert" statement that will insert a row 
     * according to the specified entity. 
     *
     * @param EntityMapping $entityMapping
     * @param Entity $entity
     * @return InsertStatement $insertStatement
     */
    public static function createInsertStatement(EntityMapping $entityMapping, Entity $entity)
    {
        // Start of user code StatementFactory.createInsertStatement
        $mapper = new MysqlEntityAttributeMapper();
        $mapper->setEntity($entity);
        $mapper->setEntityMapping($entityMapping);
        $identifier = $mapper->getIdentifierValue();
        if(!is_null($identifier)) {
            throw new \LogicException(
                'Create an insert statement on an already persisted entity is not allowed'
            );
        }

        $insertStatement = new InsertStatement();       
        $insertStatement->setTableName(
            $entityMapping->getDataSourceEntityConfiguration()->getTableName()
        );      
        $insertStatement
            ->setColumnNamesListStatement(
                ColumnNamesListStatement::createFromEntityAttributes(
                    $entityMapping->getAttributeMappings()
                )
            )
        ;       
        $insertStatement->setValuesStatement(
            ValuesStatement::createFromEntity($entityMapping, $entity)
        );
        // End of user code
    
        return $insertStatement;
    }

    /**
     * Create a statement object from a statement string.
     *
     * @param string $statementString
     * @param AssociativeArray $parameters
     * @return GenericStatement $genericStatement
     */
    public static function createFromString($statementString, AssociativeArray $parameters)
    {
        // Start of user code StatementFactory.createFromString
        $genericStatement = new GenericStatement();
        $genericStatement->setStatementString($statementString);
        $genericStatement->setStatementParameters($parameters);
        // End of user code
    
        return $genericStatement;
    }

    /**
     * Create an "update" statement that will update the row 
     * pointed by the specified entity. 
     *
     * @param EntityMapping $entityMapping
     * @param Entity $entity
     * @return UpdateStatement $updateStatement
     */
    public static function createUpdateStatementFromEntity(EntityMapping $entityMapping, Entity $entity)
    {
        // Start of user code StatementFactory.createUpdateStatementFromEntity
        $updateStatement = new UpdateStatement();
        $updateStatement->setTableName(
            $entityMapping
                ->getDataSourceEntityConfiguration()
                ->getTableName()
        );
        $updateStatement->setSetStatement(
            SetStatement::createKeyValueListFromEntity(
                $entityMapping,
                $entity
            )
        );
        $updateStatement->setWhereDefinition(
            WhereConditions::createEntityTargetFromEntity(
                $entityMapping,
                $entity
            )
        );
        // End of user code
    
        return $updateStatement;
    }

    /**
     * Create a "select" statement to retrieve records of the table
     * specified in the EntityMapping and that matches the CriteriaSet.
     * 
     *
     * @param EntityMapping $entityMapping
     * @param CriteriaSet $criteriaSet
     * @return SelectStatement $selectStatement
     */
    public static function createSelectStatementFromCriteriaSet(EntityMapping $entityMapping, CriteriaSet $criteriaSet)
    {
        // Start of user code StatementFactory.createSelectStatementFromCriteriaSet
        $selectStatement = new SelectStatement();
        $selectStatement->setSelectExpr(
            SelectExpr::createFromEntityAttributes(
                $entityMapping->getAttributeMappings()
            )
        );
        $selectStatement->setTableReferences(
            $entityMapping
                ->getDataSourceEntityConfiguration()
                ->getTableName()
        );
        if($criteriaSet->hasMatchCriterias()) {
            $selectStatement->setWhereConditions(
                WhereConditions::createFromCriteriaSet(
                    $criteriaSet, 
                    $entityMapping
                )
            );
        }
        
        if(!$criteriaSet->getOrderCriterias()->isEmpty()) {
            $selectStatement->setOrderByStatement(
                OrderByStatement::createFromOrderCriterias(
                    $entityMapping, 
                    $criteriaSet->getOrderCriterias()
                )
            );
        }
        
        $limitCriteria = $criteriaSet->getLimitCriteria();
        if(!is_null($limitCriteria)) {
            $selectStatement->setLimitStatement(
                LimitStatement::createFromLimitCriteria($limitCriteria)
            );
        }
        // End of user code
    
        return $selectStatement;
    }

    /**
     * Create an "delete" statement that will delete the row 
     * pointed by the specified entity. 
     *
     * @param EntityMapping $entityMapping
     * @param Entity $entity
     * @return DeleteStatement $deleteStatement
     */
    public static function createDeleteStatement(EntityMapping $entityMapping, Entity $entity)
    {
        // Start of user code StatementFactory.createDeleteStatement
        $deleteStatement = new DeleteStatement();
        $deleteStatement->setTableName(
            $entityMapping
                ->getDataSourceEntityConfiguration()
                ->getTableName()
        );
        $deleteStatement->setWhereConditions(
            WhereConditions::createEntityTargetFromEntity(
                $entityMapping,
                $entity
            )
        );
        // End of user code
    
        return $deleteStatement;
    }

    // Start of user code StatementFactory.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
