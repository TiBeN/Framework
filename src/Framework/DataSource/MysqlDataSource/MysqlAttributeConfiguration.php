<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Entity\DataSourceAttributeMappingConfiguration;

/**
 * 
 *
 * @package MysqlDataSource
 * @author TiBeN
 */
class MysqlAttributeConfiguration implements DataSourceAttributeMappingConfiguration
{
    /**
     * @var string
     */
    public $columnName;

    /**
     * @var bool
     */
    public $isAutoIncrement = false;

    public function __construct()
    {
        // Start of user code MysqlAttributeConfiguration.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code MysqlAttributeConfiguration.destructor
        // End of user code
    }

    /**
     * @return string
     */
    public function getColumnName()
    {
        // Start of user code Getter MysqlAttributeConfiguration.getColumnName
        // End of user code
        return $this->columnName;
    }

    /**
     * @param string $columnName
     */
    public function setColumnName($columnName)
    {
        // Start of user code Setter MysqlAttributeConfiguration.setColumnName
        // End of user code
        $this->columnName = $columnName;
    }

    /**
     * @return bool
     */
    public function getIsAutoIncrement()
    {
        // Start of user code Getter MysqlAttributeConfiguration.getIsAutoIncrement
        // End of user code
        return $this->isAutoIncrement;
    }

    /**
     * @param bool $isAutoIncrement
     */
    public function setIsAutoIncrement($isAutoIncrement)
    {
        // Start of user code Setter MysqlAttributeConfiguration.setIsAutoIncrement
        // End of user code
        $this->isAutoIncrement = $isAutoIncrement;
    }

    // DataSourceAttributeMappingConfiguration Realization

    /**
     * @param AssociativeArray $config
     * @return DataSourceAttributeMappingConfiguration $dataSourceAttributeMappingConfiguration
     */
    public static function create(AssociativeArray $config)
    {
        // Start of user code DataSourceAttributeMappingConfiguration.create
        // TODO should be implemented.
        // End of user code
    
        return $dataSourceAttributeMappingConfiguration;
    }

    // Start of user code MysqlAttributeConfiguration.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
