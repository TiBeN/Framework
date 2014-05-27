<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Entity\DataSourceEntityMappingConfiguration;
use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code MysqlEntityConfiguration.useStatements
// Place your use statements here.
// End of user code

/**
 * Hold specific entity mapping data required 
 * by the mysql data source.
 *
 * @package TiBeN\Framework\DataSource\MysqlDataSource
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
     * Factory method that ease the instanciation process using
     * associative arrays.
     *
     * @param AssociativeArray $config
     * @return DataSourceEntityMappingConfiguration $dataSourceEntityMappingConfiguration
     */
    public static function create(AssociativeArray $config)
    {
        // Start of user code DataSourceEntityMappingConfiguration.create
		if(!$config->has('tableName')) {
		    throw new \InvalidArgumentException('No table name set');
		}
		$dataSourceEntityMappingConfiguration = new self();
		$dataSourceEntityMappingConfiguration->setTableName($config->get('tableName'));
        // End of user code
    
        return $dataSourceEntityMappingConfiguration;
    }

    // Start of user code MysqlEntityConfiguration.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
