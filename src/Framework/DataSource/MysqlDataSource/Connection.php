<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

// Start of user code Connection.useStatements
// Place your use statements here.
// End of user code

/**
 * Hold a connection with Mysql server
 *
 * @package TiBeN\Framework\DataSource\MysqlDataSource
 * @author TiBeN
 */
class Connection
{

    // Start of user code Connection.implementationSpecificMethods
    
    /**
     * @var PDO
     */ 
    private $pdo;
    
    public function getPdo() {
        return $this->pdo;
    }
    
    public function setPdo(\PDO $pdo) {
        $this->pdo = $pdo;
    }   
    
    public function unsetPdo() {
        $this->pdo = null;
    }
    
    public function isConnected() {
        return $this->pdo !== null;
    }
    // End of user code
}
