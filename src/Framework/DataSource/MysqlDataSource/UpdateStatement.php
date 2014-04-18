<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code UpdateStatement.useStatements
// Place your use statements here.
// End of user code

/**
 * 
 *
 * @package MysqlDataSource
 * @author TiBeN
 */
class UpdateStatement implements Statement
{
    /**
     * @var SetStatement
     */
    public $setStatement;

    /**
     * @var WhereConditions
     */
    public $whereDefinition;

    /**
     * @var string
     */
    public $tableName;

    public function __construct()
    {
        // Start of user code UpdateStatement.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code UpdateStatement.destructor
        // End of user code
    }

    /**
     * @return SetStatement
     */
    public function getSetStatement()
    {
        // Start of user code Getter UpdateStatement.getSetStatement
        // End of user code
        return $this->setStatement;
    }

    /**
     * @param SetStatement $setStatement
     */
    public function setSetStatement(SetStatement $setStatement)
    {
        // Start of user code Setter UpdateStatement.setSetStatement
        // End of user code
        $this->setStatement = $setStatement;
    }

    /**
     * @return WhereConditions
     */
    public function getWhereDefinition()
    {
        // Start of user code Getter UpdateStatement.getWhereDefinition
        // End of user code
        return $this->whereDefinition;
    }

    /**
     * @param WhereConditions $whereDefinition
     */
    public function setWhereDefinition(WhereConditions $whereDefinition)
    {
        // Start of user code Setter UpdateStatement.setWhereDefinition
        // End of user code
        $this->whereDefinition = $whereDefinition;
    }

    /**
     * @return string
     */
    public function getTableName()
    {
        // Start of user code Getter UpdateStatement.getTableName
        // End of user code
        return $this->tableName;
    }

    /**
     * @param string $tableName
     */
    public function setTableName($tableName)
    {
        // Start of user code Setter UpdateStatement.setTableName
        // End of user code
        $this->tableName = $tableName;
    }

    // Statement Realization

    /**
     * Tell wether the statement is ready or not to be executed
     *
     * @return bool $status
     */
    public function isReadyToBeExecuted()
    {
        // Start of user code Statement.isReadyToBeExecuted
        // TODO should be implemented.
        // End of user code
    
        return $status;
    }

    /**
     * @return AssociativeArray $statementParameters
     */
    public function getStatementParameters()
    {
        // Start of user code Statement.getStatementParameters
        // TODO should be implemented.
        // End of user code
    
        return $statementParameters;
    }

    /**
     * Return the statement in String format
     *
     * @return string $statement
     */
    public function toString()
    {
        // Start of user code Statement.toString
        // TODO should be implemented.
        // End of user code
    
        return $statement;
    }

    // Start of user code UpdateStatement.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
