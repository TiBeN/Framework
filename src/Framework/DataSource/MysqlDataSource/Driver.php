<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;


/**
 * Handle communication with Mysql server
 *
 * @package MysqlDataSource
 * @author TiBeN
 */
class Driver
{
    public function __construct()
    {
        // Start of user code Driver.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code Driver.destructor
        // End of user code
    }

    /**
     * Execute a statement to a Mysql database
     *
     * @param Statement $statement
     * @param Connection $connection
     * @return StatementExecutionResult $statementResult
     */
    public static function executeStatement(Statement $statement, Connection $connection)
    {
        // Start of user code Driver.executeStatement
        // TODO should be implemented.
        // End of user code
    
        return $statementResult;
    }

    /**
     * Close the connexion to a Mysql database
     *
     * @param Connection $connection
     */
    public static function disconnect(Connection $connection)
    {
        // Start of user code Driver.disconnect
        // TODO should be implemented.
        // End of user code
    }

    /**
     * Create a new connection to a Mysql database
     *
     * @param string $host
     * @param string $userName
     * @param string $password
     * @param string $databaseName
     * @param int $port
     * @return Connection $connection
     */
    public static function connect($host, $userName, $password, $databaseName, $port)
    {
        // Start of user code Driver.connect
        // TODO should be implemented.
        // End of user code
    
        return $connection;
    }

    // Start of user code Driver.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
