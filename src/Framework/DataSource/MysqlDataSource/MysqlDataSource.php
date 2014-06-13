<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\DataSource\DataSource;
use TiBeN\Framework\Entity\CriteriaSet;
use TiBeN\Framework\Entity\EntityMapping;
use TiBeN\Framework\Entity\Entity;
use TiBeN\Framework\Entity\EntityCollection;

// Start of user code MysqlDataSource.useStatements
// Place your use statements here.
// End of user code

/**
 * This datasource allow the use of a Mysql database 
 * as a datasource.
 *
 * @package TiBeN\Framework\DataSource\MysqlDataSource
 * @author TiBeN
 */
class MysqlDataSource implements DataSource
{
    /**
     * @var string
     */
    public $databaseName;

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $host;

    /**
     * @var int
     */
    public $port;

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
     * @return Connection
     */
    private function getConnection()
    {
        // Start of user code Getter MysqlDataSource.getConnection
        if(!isset($this->connection)) {
            $this->connection = Driver::connect(
                $this->getHost(), 
                $this->getUserName(), 
                $this->getPassword(), 
                $this->getDatabaseName(),
                $this->getPort()
            );
        }
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
     * Store a new entity on the datasource.
     * The entity must not be already on the datasource.
     *
     * @param EntityMapping $entityMapping
     * @param Entity $entity
     */
    public function create(EntityMapping $entityMapping, Entity $entity)
    {
        // Start of user code DataSource.create
        $insertStatement = StatementFactory::createInsertStatement($entityMapping, $entity);
        $statementResult = Driver::executeStatement(
            $insertStatement, 
            $this->getConnection()
        );
        
        if($statementResult->getSuccess() == false) {
            throw new \RuntimeException(
                sprintf(    
                    'MysqlDataSource error %s : %s',
                    $statementResult->getErrorCode(),
                    $statementResult->getErrorMessage()                         
                )                                      
            );
        }
        
        $mapper = new MysqlEntityAttributeMapper();
        $mapper->setEntity($entity);
        $mapper->setEntityMapping($entityMapping);
        $mapper->setIdentifier($statementResult->getLastInsertId());
        // End of user code
    }

    /**
     * Retrieve a collection of entities of the specified EntityMapping
     *  that matches some CriteriaSet.
     *   
     *
     * @param EntityMapping $entityMapping
     * @param CriteriaSet $criteriaSet
     * @return EntityCollection $entityCollection
     */
    public function read(EntityMapping $entityMapping, CriteriaSet $criteriaSet)
    {
        // Start of user code DataSource.read
        $selectStatement = StatementFactory::createSelectStatementFromCriteriaSet(
            $entityMapping,
            $criteriaSet     
        );

        $statementResult = Driver::executeStatement(
            $selectStatement, 
            $this->getConnection()
        );
        
        if ($statementResult->getSuccess() == false) {
            throw new \RuntimeException(
                sprintf(    
                    'MysqlDataSource error %s : %s',
                    $statementResult->getErrorCode(),
                    $statementResult->getErrorMessage()                         
                )                                      
            );
        }

        $rowToEntityConverter = new RowToEntityConverter();
        $rowToEntityConverter->setEntityMapping($entityMapping);
        
        $entityCollection = new EntityCollection();
        $entityCollection->defineAsProxyOf(
            $statementResult->getRowCollection(),
            $rowToEntityConverter
        );
        // End of user code
    
        return $entityCollection;
    }

    /**
     * Delete an entity from the datasource.
     *
     * @param EntityMapping $entityMapping
     * @param Entity $entity
     */
    public function delete(EntityMapping $entityMapping, Entity $entity)
    {
        // Start of user code DataSource.delete
        $deleteStatement = StatementFactory::createDeleteStatement($entityMapping, $entity);
        $statementResult = Driver::executeStatement(
            $deleteStatement, 
            $this->getConnection()
        );
        
        if ($statementResult->getSuccess() == false) {
            throw new \RuntimeException(
                sprintf(    
                    'MysqlDataSource error %s : %s',
                    $statementResult->getErrorCode(),
                    $statementResult->getErrorMessage()                         
                )                                      
            );
        }

        if ($statementResult->getNumberOfAffectedRows() !== 1) {
            throw new \LogicException(
                'The entity doesn\'t exist. Maybe it has already been deleted ?'
            );
        }       
        // End of user code
    }

    /**
     * Return the name of the AttributeMappingConfiguration class
     * of the datasource
     *
     * @return string $className
     */
    public static function getAttributeMappingConfigurationClassName()
    {
        // Start of user code DataSource.getAttributeMappingConfigurationClassName
        $namespace = 'TiBeN\\Framework\\DataSource\\MysqlDataSource';
        $className = $namespace . '\\MysqlAttributeConfiguration';
        // End of user code
    
        return $className;
    }

    /**
     * Return the name of the EntityMappingConfiguration class 
     * of the data source.
     *
     * @return string $className
     */
    public static function getEntityMappingConfigurationClassName()
    {
        // Start of user code DataSource.getEntityMappingConfigurationClassName
        $namespace = 'TiBeN\\Framework\\DataSource\\MysqlDataSource';
        $className = $namespace . '\\MysqlEntityConfiguration';
        // End of user code
    
        return $className;
    }

    /**
     * Update the content of an entity.
     *
     * @param EntityMapping $entityMapping
     * @param Entity $entity
     */
    public function update(EntityMapping $entityMapping, Entity $entity)
    {
        // Start of user code DataSource.update
        $updateStatement = StatementFactory
            ::createUpdateStatementFromEntity($entityMapping, $entity)
        ;
        $statementResult = Driver::executeStatement(
            $updateStatement, 
            $this->getConnection()
        );
        
        if($statementResult->getSuccess() == false) {
            throw new \RuntimeException(
                sprintf(    
                    'MysqlDataSource error %s : %s',
                    $statementResult->getErrorCode(),
                    $statementResult->getErrorMessage()                         
                )                                      
            );
        }

        if ($statementResult->getNumberOfAffectedRows() !== 1) {
            throw new \LogicException(
                'The entity doesn\'t exist into the database.'
            );
        }       
        // End of user code
    }

    // Start of user code MysqlDataSource.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
