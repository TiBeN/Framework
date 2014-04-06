<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Datatype\AssociativeArray;

/**
 * 
 *
 * @package MysqlDataSource
 * @author TiBeN
 */
class DeleteStatement implements Statement
{
    /**
     * @var string
     */
    public $tableName;

    /**
     * @var WhereConditions
     */
    public $whereConditions;

    public function __construct()
    {
        // Start of user code DeleteStatement.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code DeleteStatement.destructor
        // End of user code
    }

    /**
     * @return string
     */
    public function getTableName()
    {
        // Start of user code Getter DeleteStatement.getTableName
        // End of user code
        return $this->tableName;
    }

    /**
     * @param string $tableName
     */
    public function setTableName($tableName)
    {
        // Start of user code Setter DeleteStatement.setTableName
        // End of user code
        $this->tableName = $tableName;
    }

    /**
     * @return WhereConditions
     */
    public function getWhereConditions()
    {
        // Start of user code Getter DeleteStatement.getWhereConditions
        // End of user code
        return $this->whereConditions;
    }

    /**
     * @param WhereConditions $whereConditions
     */
    public function setWhereConditions(WhereConditions $whereConditions)
    {
        // Start of user code Setter DeleteStatement.setWhereConditions
        // End of user code
        $this->whereConditions = $whereConditions;
    }

    // Statement Realization

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

    // Start of user code DeleteStatement.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
