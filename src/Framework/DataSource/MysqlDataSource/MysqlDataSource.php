<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Entity\EntityMapping;
use TiBeN\Framework\Entity\CriteriaSet;
use TiBeN\Framework\Entity\Entity;
use TiBeN\Framework\DataSource\DataSource;
use TiBeN\Framework\Entity\EntityCollection;

/**
 * 
 *
 * @package MysqlDataSource
 * @author TiBeN
 */
class MysqlDataSource implements DataSource
{
    /**
     * @var int
     */
    public $port;

    /**
     * @var string
     */
    public $host;

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $databaseName;

    /**
     * @var Connection
     */
    private $connection;

    /**
     * @var string
     */
    public $userName;

    /**
     * @var string
     */
    public $name;

    public function __construct()
    {
        // Start of user code MysqlDataSource.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code MysqlDataSource.destructor
        // End of user code
    }

    /**
     * @return int
     */
    public function getPort()
    {
        // Start of user code Getter MysqlDataSource.getPort
        // End of user code
        return $this->port;
    }

    /**
     * @param int $port
     */
    public function setPort($port)
    {
        // Start of user code Setter MysqlDataSource.setPort
        // End of user code
        $this->port = $port;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        // Start of user code Getter MysqlDataSource.getHost
        // End of user code
        return $this->host;
    }

    /**
     * @param string $host
     */
    public function setHost($host)
    {
        // Start of user code Setter MysqlDataSource.setHost
        // End of user code
        $this->host = $host;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        // Start of user code Getter MysqlDataSource.getPassword
        // End of user code
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        // Start of user code Setter MysqlDataSource.setPassword
        // End of user code
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getDatabaseName()
    {
        // Start of user code Getter MysqlDataSource.getDatabaseName
        // End of user code
        return $this->databaseName;
    }

    /**
     * @param string $databaseName
     */
    public function setDatabaseName($databaseName)
    {
        // Start of user code Setter MysqlDataSource.setDatabaseName
        // End of user code
        $this->databaseName = $databaseName;
    }

    /**
     * @return Connection
     */
    private function getConnection()
    {
        // Start of user code Getter MysqlDataSource.getConnection
        // End of user code
        return $this->connection;
    }

    /**
     * @param Connection $connection
     */
    private function setConnection(Connection $connection)
    {
        // Start of user code Setter MysqlDataSource.setConnection
        // End of user code
        $this->connection = $connection;
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        // Start of user code Getter MysqlDataSource.getUserName
        // End of user code
        return $this->userName;
    }

    /**
     * @param string $userName
     */
    public function setUserName($userName)
    {
        // Start of user code Setter MysqlDataSource.setUserName
        // End of user code
        $this->userName = $userName;
    }

    // DataSource Realization

    /**
     * @return string
     */
    public function getName()
    {
        // Start of user code Getter DataSource.getName
        // End of user code
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        // Start of user code Setter DataSource.setName
        // End of user code
        $this->name = $name;
    }
    /**
     * @param EntityMapping $entityMapping
     * @param Entity $entity
     */
    public function update(EntityMapping $entityMapping, Entity $entity)
    {
        // Start of user code DataSource.update
        // TODO should be implemented.
        // End of user code
    }

    /**
     * @param EntityMapping $entityMapping
     * @param CriteriaSet $criteriaSet
     * @return EntityCollection $entityCollection
     */
    public function read(EntityMapping $entityMapping, CriteriaSet $criteriaSet)
    {
        // Start of user code DataSource.read
        // TODO should be implemented.
        // End of user code
    
        return $entityCollection;
    }

    /**
     * @param EntityMapping $entityMapping
     * @param Entity $entity
     */
    public function create(EntityMapping $entityMapping, Entity $entity)
    {
        // Start of user code DataSource.create
        // TODO should be implemented.
        // End of user code
    }

    /**
     * @return string $className
     */
    public static function getEntityMappingConfigurationClassName()
    {
        // Start of user code DataSource.getEntityMappingConfigurationClassName
        // TODO should be implemented.
        // End of user code
    
        return $className;
    }

    /**
     * @return string $className
     */
    public static function getAttributeMappingConfigurationClassName()
    {
        // Start of user code DataSource.getAttributeMappingConfigurationClassName
        // TODO should be implemented.
        // End of user code
    
        return $className;
    }

    /**
     * @param EntityMapping $entityMapping
     * @param Entity $entity
     */
    public function delete(EntityMapping $entityMapping, Entity $entity)
    {
        // Start of user code DataSource.delete
        // TODO should be implemented.
        // End of user code
    }

    // Start of user code MysqlDataSource.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
