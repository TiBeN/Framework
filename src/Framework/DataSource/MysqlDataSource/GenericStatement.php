<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Datatype\AssociativeArray;

/**
 * Container for custom string queries. 
 * Use it when you have to execute custom queries that can't be built 
 * with other Statement classes.
 *
 * @package MysqlDataSource
 * @author TiBeN
 */
class GenericStatement implements Statement
{
    /**
     * The statement string
     * @var string
     */
    public $statementString;

    public function __construct()
    {
        // Start of user code GenericStatement.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code GenericStatement.destructor
        // End of user code
    }

    /**
     * @return string
     */
    public function getStatementString()
    {
        // Start of user code Getter GenericStatement.getStatementString
        // End of user code
        return $this->statementString;
    }

    /**
     * @param string $statementString
     */
    public function setStatementString($statementString)
    {
        // Start of user code Setter GenericStatement.setStatementString
        // End of user code
        $this->statementString = $statementString;
    }

    /**
     * @param AssociativeArray $statementParameters
     */
    public function setStatementParameters(AssociativeArray $statementParameters)
    {
        // Start of user code GenericStatement.setStatementParameters
        // TODO should be implemented.
        // End of user code
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

    // Start of user code GenericStatement.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
