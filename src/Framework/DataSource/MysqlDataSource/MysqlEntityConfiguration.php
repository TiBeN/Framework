<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Entity\DataSourceEntityMappingConfiguration;
use TiBeN\Framework\Datatype\AssociativeArray;

/**
 * 
 *
 * @package MysqlDataSource
 * @author TiBeN
 */
class MysqlEntityConfiguration implements DataSourceEntityMappingConfiguration
{
    /**
     * @var string
     */
    public $tableName;

    public function __construct()
    {
        // Start of user code MysqlEntityConfiguration.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code MysqlEntityConfiguration.destructor
        // End of user code
    }

    /**
     * @return string
     */
    public function getTableName()
    {
        // Start of user code Getter MysqlEntityConfiguration.getTableName
        // End of user code
        return $this->tableName;
    }

    /**
     * @param string $tableName
     */
    public function setTableName($tableName)
    {
        // Start of user code Setter MysqlEntityConfiguration.setTableName
        // End of user code
        $this->tableName = $tableName;
    }

    // DataSourceEntityMappingConfiguration Realization

    /**
     * @param AssociativeArray $config
     * @return DataSourceEntityMappingConfiguration $dataSourceEntityMappingConfiguration
     */
    public static function create(AssociativeArray $config)
    {
        // Start of user code DataSourceEntityMappingConfiguration.create
        // TODO should be implemented.
        // End of user code
    
        return $dataSourceEntityMappingConfiguration;
    }

    // Start of user code MysqlEntityConfiguration.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
