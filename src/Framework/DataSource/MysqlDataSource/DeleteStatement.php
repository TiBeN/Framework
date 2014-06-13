<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code DeleteStatement.useStatements
// Place your use statements here.
// End of user code

/**
 * Represent a mysql delete statement.
 *
 * @package TiBeN\Framework\DataSource\MysqlDataSource
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
        
        if(is_null($this->tableName)) {
            $status = false;
        }
        // End of user code
    
        return $status;
    }

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
        
        $statement = sprintf(
            'DELETE FROM %s', 
            $this->tableName
        );      
        if($this->whereConditions instanceof WhereConditions) {
            $statement .= ' ' . $this->whereConditions->toString();
        }
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
        $statementParameters = !is_null($this->whereConditions)
            ? $this->whereConditions->getStatementParameters()
            : new AssociativeArray()
        ;    
        // End of user code
    
        return $statementParameters;
    }

    // Start of user code DeleteStatement.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
