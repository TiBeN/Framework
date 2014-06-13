<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Entity\DataSourceAttributeMappingConfiguration;
use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code MysqlAttributeConfiguration.useStatements
// Place your use statements here.
// End of user code

/**
 * Hold specific attribute mapping data required 
 * by the mysql data source.
 *
 * @package TiBeN\Framework\DataSource\MysqlDataSource
 * @author TiBeN
 */
class MysqlAttributeConfiguration implements DataSourceAttributeMappingConfiguration
{
    /**
     * @var bool
     */
    public $isAutoIncrement = false;

    /**
     * @var string
     */
    public $columnName;

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

    // DataSourceAttributeMappingConfiguration Realization

    /**
     * @param AssociativeArray $config
     * @return DataSourceAttributeMappingConfiguration $dataSourceAttributeMappingConfiguration
     */
    public static function create(AssociativeArray $config)
    {
        // Start of user code DataSourceAttributeMappingConfiguration.create
        if (!$config->has('columnName')) {
            throw new \InvalidArgumentException('No column name set');
        }
        $dataSourceAttributeMappingConfiguration = new MysqlAttributeConfiguration();
        $dataSourceAttributeMappingConfiguration->setColumnName(
            $config->get('columnName')
        );        
        if ($config->has('isAutoIncrement')) {
            $dataSourceAttributeMappingConfiguration->setIsAutoIncrement(
                $config->get('isAutoIncrement')
            );
        }        
        // End of user code
    
        return $dataSourceAttributeMappingConfiguration;
    }

    // Start of user code MysqlAttributeConfiguration.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
