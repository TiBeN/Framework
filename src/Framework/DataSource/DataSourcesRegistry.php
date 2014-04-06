<?php

namespace TiBeN\Framework\DataSource;

use TiBeN\Framework\Datatype\AssociativeArray;

/**
 * 
 *
 * @package DataSource
 * @author TiBeN
 */
class DataSourcesRegistry
{
    /**
     * @var AssociativeArray
     */
    private static $dataSources;

    public function __construct()
    {
        // Start of user code DataSourcesRegistry.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code DataSourcesRegistry.destructor
        // End of user code
    }

    /**
     * @return AssociativeArray
     */
    private static function getDataSources()
    {
        // Start of user code Static getter DataSourcesRegistry.getDataSources
        // End of user code
        return self::$dataSources;
    }

    /**
     * @param AssociativeArray $dataSources
     */
    private static function setDataSources(AssociativeArray $dataSources)
    {
        // Start of user code Static setter DataSourcesRegistry.setDataSources
        // End of user code
        self::$dataSources = $dataSources;
    }

    /**
     * @param string $dataSourceName
     */
    public static function clearDataSource($dataSourceName)
    {
        // Start of user code DataSourcesRegistry.clearDataSource
        // TODO should be implemented.
        // End of user code
    }

    /**
     * @param DataSource $dataSource
     */
    public static function registerDataSource(DataSource $dataSource)
    {
        // Start of user code DataSourcesRegistry.registerDataSource
        // TODO should be implemented.
        // End of user code
    }

    /**
     * @param string $dataSourceName
     * @return DataSource $dataSource
     */
    public static function getDataSource($dataSourceName)
    {
        // Start of user code DataSourcesRegistry.getDataSource
        // TODO should be implemented.
        // End of user code
    
        return $dataSource;
    }

    /**
     * @param string $dataSourceName
     * @return bool $boolean
     */
    public static function hasDataSource($dataSourceName)
    {
        // Start of user code DataSourcesRegistry.hasDataSource
        // TODO should be implemented.
        // End of user code
    
        return $boolean;
    }

    // Start of user code DataSourcesRegistry.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
