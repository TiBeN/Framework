<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code InsertStatement.useStatements
// Place your use statements here.
// End of user code

/**
 * 
 *
 * @package MysqlDataSource
 * @author TiBeN
 */
class InsertStatement implements Statement
{
    /**
     * @var string
     */
    public $tableName;

    /**
     * @var ColumnNamesListStatement
     */
    public $columnNamesListStatement;

    /**
     * @var ValuesStatement
     */
    public $valuesStatement;

    public function __construct()
    {
        // Start of user code InsertStatement.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code InsertStatement.destructor
        // End of user code
    }

    /**
     * @return string
     */
    public function getTableName()
    {
        // Start of user code Getter InsertStatement.getTableName
        // End of user code
        return $this->tableName;
    }

    /**
     * @param string $tableName
     */
    public function setTableName($tableName)
    {
        // Start of user code Setter InsertStatement.setTableName
        // End of user code
        $this->tableName = $tableName;
    }

    /**
     * @return ColumnNamesListStatement
     */
    public function getColumnNamesListStatement()
    {
        // Start of user code Getter InsertStatement.getColumnNamesListStatement
        // End of user code
        return $this->columnNamesListStatement;
    }

    /**
     * @param ColumnNamesListStatement $columnNamesListStatement
     */
    public function setColumnNamesListStatement(ColumnNamesListStatement $columnNamesListStatement)
    {
        // Start of user code Setter InsertStatement.setColumnNamesListStatement
        // End of user code
        $this->columnNamesListStatement = $columnNamesListStatement;
    }

    /**
     * @return ValuesStatement
     */
    public function getValuesStatement()
    {
        // Start of user code Getter InsertStatement.getValuesStatement
        // End of user code
        return $this->valuesStatement;
    }

    /**
     * @param ValuesStatement $valuesStatement
     */
    public function setValuesStatement(ValuesStatement $valuesStatement)
    {
        // Start of user code Setter InsertStatement.setValuesStatement
        // End of user code
        $this->valuesStatement = $valuesStatement;
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

    // Start of user code InsertStatement.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
