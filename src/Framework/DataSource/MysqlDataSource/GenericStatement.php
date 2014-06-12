<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code GenericStatement.useStatements
// Place your use statements here.
// End of user code

/**
 * Container for custom string queries. 
 * Use it when you have to execute custom queries that can't be built 
 * with other Statement classes.
 *
 * @package TiBeN\Framework\DataSource\MysqlDataSource
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
        $this->statementParameters = new AssociativeArray('string');
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
     * Set an associative array of parameters of the corresponding
     * named placeholders of the statement.
     *
     * @param AssociativeArray $statementParameters
     */
    public function setStatementParameters(AssociativeArray $statementParameters)
    {
        // Start of user code GenericStatement.setStatementParameters
        $this->statementParameters = $statementParameters;
        // End of user code
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
        $statement = $this->statementString;
        // End of user code
    
        return $statement;
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
        return isset($this->statementString) && !empty($this->statementString);  
        // End of user code
    
        return $status;
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
        $statementParameters = $this->statementParameters; 
        // End of user code
    
        return $statementParameters;
    }

    // Start of user code GenericStatement.implementationSpecificMethods
    
    /**
     * @var AssociativeArray
     */
    private $statementParameters;

    // End of user code
}
