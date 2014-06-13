<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code UpdateStatement.useStatements
// Place your use statements here.
// End of user code

/**
 * Represent a mysql update statement.
 *
 * @package TiBeN\Framework\DataSource\MysqlDataSource
 * @author TiBeN
 */
class UpdateStatement implements Statement
{
    /**
     * @var SetStatement
     */
    public $setStatement;

    /**
     * @var string
     */
    public $tableName;

    /**
     * @var WhereConditions
     */
    public $whereDefinition;

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
        $statement = sprintf(
            'UPDATE %s %s',
            $this->tableName,
            $this->setStatement->toString()                                                        
        );        
        if(!is_null($this->whereDefinition)) {
            $statement .= ' ' . $this->whereDefinition->toString();
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
        $statementParameters = new AssociativeArray();
        if($this->setStatement instanceof SetStatement) {
            $statementParameters->merge($this->setStatement->getStatementParameters());
        } 
        if($this->whereDefinition instanceof WhereConditions) {
            $statementParameters->merge($this->whereDefinition->getStatementParameters());
        }        
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
        $status = !is_null($this->tableName)
            && !empty($this->tableName)
            && $this->setStatement instanceof SetStatement
        ;                                                                       
        // End of user code
    
        return $status;
    }

    // Start of user code UpdateStatement.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
