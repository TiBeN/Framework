<?php

namespace TiBeN\Framework\DataSource;

use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code DataSourcesRegistry.useStatements
// Place your use statements here.
// End of user code

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
		if(!isset(self::$dataSources)) {
		    self::$dataSources = new AssociativeArray(
                'TiBeN\\Framework\\DataSource\\DataSource'
            );
		}
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
     * @return bool $boolean
     */
    public static function hasDataSource($dataSourceName)
    {
        // Start of user code DataSourcesRegistry.hasDataSource
		return self::getDataSources()->has($dataSourceName);
        // End of user code
    
        return $boolean;
    }

    /**
     * @param string $dataSourceName
     */
    public static function clearDataSource($dataSourceName)
    {
        // Start of user code DataSourcesRegistry.clearDataSource
		if(!self::getDataSources()->has($dataSourceName)) {
		    throw new \InvalidArgumentException(
                'No data source named "' . $dataSourceName . '"'
            );
		} 
		self::getDataSources()->remove($dataSourceName);
        // End of user code
    }

    /**
     * @param string $dataSourceName
     * @return DataSource $dataSource
     */
    public static function getDataSource($dataSourceName)
    {
        // Start of user code DataSourcesRegistry.getDataSource
		if(!self::getDataSources()->has($dataSourceName)) {
		    throw new \InvalidArgumentException(
                'No data source named "' . $dataSourceName . '"'
            );
		} 
		$dataSource = self::getDataSources()->get($dataSourceName);
        // End of user code
    
        return $dataSource;
    }

    /**
     * @param DataSource $dataSource
     */
    public static function registerDataSource(DataSource $dataSource)
    {
        // Start of user code DataSourcesRegistry.registerDataSource
		$dataSourceName = $dataSource->getName(); 
		if(empty($dataSourceName)) {
		    throw new \InvalidArgumentException('The data source has no name');
		}
	    self::getDataSources()->set($dataSourceName, $dataSource);
        // End of user code
    }

    // Start of user code DataSourcesRegistry.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
