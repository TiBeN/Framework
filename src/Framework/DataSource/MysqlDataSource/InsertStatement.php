<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code InsertStatement.useStatements
// Place your use statements here.
// End of user code

/**
 * Represent an mysql insert statement.
 *
 * @package TiBeN\Framework\DataSource\MysqlDataSource
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
     * Generate the statement as a string.
     *
     * @return string $statement
     */
    public function toString()
    {
        // Start of user code Statement.toString
        if(!$this->isReadyToBeExecuted()) {
            throw new \LogicException('The statement is not ready');    
        }
        
        /* Compare ColumnNamesListStatement with ValuesStatement */
        $columnsNames = array();
        foreach($this->columnNamesListStatement as $columnName) {
            $columnsNames[] = $columnName;
        }
        $valuesStatementColumnNames = array_keys($this->valuesStatement->toNativeArray());
        if($columnsNames != $valuesStatementColumnNames) {
            throw new \LogicException(
                'The ColumnNamesListStatement set doesn\'t match the ValuesStatement'
            );
        }
        
        $statement = sprintf(
            'INSERT INTO %s %s %s',
            $this->tableName,
            $this->columnNamesListStatement->toString(),
            $this->valuesStatement->toString()
        );
        // End of user code
    
        return $statement;
    }

    /**
     * Return an associative array of parameters of the corresponding
     * named placeholder in the statement. 
     * 
     *
     * @return AssociativeArray $statementParameters
     */
    public function getStatementParameters()
    {
        // Start of user code Statement.getStatementParameters
        $statementParameters = AssociativeArray::createFromNativeArray(
            null,
            $this->valuesStatement->toNativeArray()
        );
        // End of user code
    
        return $statementParameters;
    }

    /**
     * Check whether all statement chunks are set 
     * in order to generate a complete statement string to 
     * be executed.
     *
     * @return bool $status
     */
    public function isReadyToBeExecuted()
    {
        // Start of user code Statement.isReadyToBeExecuted
        $status = true;
        if(
            (!isset($this->tableName) || empty($this->tableName))
            || (!isset($this->columnNamesListStatement) 
                || $this->columnNamesListStatement->isEmpty() 
            )
            || (!isset($this->valuesStatement) || $this->valuesStatement->isEmpty())
        ) {
            return false;
        }
        // End of user code
    
        return $status;
    }

    // Start of user code InsertStatement.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
