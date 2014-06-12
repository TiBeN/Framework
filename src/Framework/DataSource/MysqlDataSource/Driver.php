<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

// Start of user code Driver.useStatements
// Place your use statements here.
// End of user code

/**
 * Handle communication with Mysql server.
 *
 * @package TiBeN\Framework\DataSource\MysqlDataSource
 * @author TiBeN
 */
class Driver
{

    /**
     * Create a new connection to a Mysql database.
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
        if(!extension_loaded('PDO')){
            throw new Exception('PDO extension is not available in your PHP environment.');
        }
        $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s', $host, $port, $databaseName);
        $pdo = new \PDO($dsn, $userName, $password); 

        $connection = new Connection();
        $connection->setPdo($pdo);
        // End of user code
    
        return $connection;
    }

    /**
     * Execute a statement to a Mysql database.
     *
     * @param Statement $statement
     * @param Connection $connection
     * @return StatementExecutionResult $statementResult
     */
    public static function executeStatement(Statement $statement, Connection $connection)
    {
        // Start of user code Driver.executeStatement
        if(!$statement->isReadyToBeExecuted()){
            throw new \InvalidArgumentException('The statement is not ready to be executed');
        }
        
        $pdoStatement = $connection
            ->getPdo()
            ->prepare($statement->toString())
        ;
        
        $success = $pdoStatement
            ->execute(
                $statement
                    ->getStatementParameters()
                    ->toNativeArray()
            )
        ;

        $statementResult = new StatementExecutionResult();
        $statementResult->setSuccess($success);
        
        if(!$success) {
            $errorInfo = $pdoStatement->errorInfo();
            $statementResult->setErrorCode($errorInfo[1]);
            $statementResult->setErrorMessage($errorInfo[2]);
            return $statementResult;
        }

        $statementResult->setNumberOfAffectedRows($pdoStatement->rowCount());               
        $statementResult->setLastInsertId($connection->getPdo()->lastInsertId());
    
        $queryTypeStatementClasses = array(
            'TiBeN\\Framework\\DataSource\\MysqlDataSource\\GenericStatement',
            'TiBeN\\Framework\\DataSource\\MysqlDataSource\\SelectStatement'
        );
        if(in_array(get_class($statement), $queryTypeStatementClasses)) {
            $pdoCollection = new PdoRowCollection($pdoStatement);
            $rowCollection = new RowCollection();
            $rowCollection->defineAsProxyOf(
                $pdoCollection, 
                new PdoRowContainerToRowConverter()
            );
            $statementResult->setRowCollection($rowCollection);
        }
        // End of user code
    
        return $statementResult;
    }

    /**
     * Close the connexion to a Mysql database.
     *
     * @param Connection $connection
     */
    public static function disconnect(Connection $connection)
    {
        // Start of user code Driver.disconnect
        $connection->unsetPdo();
        unset($connection);
        // End of user code
    }

    // Start of user code Driver.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
