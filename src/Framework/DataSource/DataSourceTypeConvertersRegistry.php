<?php

namespace TiBeN\Framework\DataSource;

/**
 * 
 *
 * @package DataSource
 * @author TiBeN
 */
class DataSourceTypeConvertersRegistry
{
    /**
     * @var AssociativeArray
     */
    private static $typeConverters;

    public function __construct()
    {
        // Start of user code DataSourceTypeConvertersRegistry.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code DataSourceTypeConvertersRegistry.destructor
        // End of user code
    }

    /**
     * @return AssociativeArray
     */
    private static function getTypeConverters()
    {
        // Start of user code Static getter DataSourceTypeConvertersRegistry.getTypeConverters
        // End of user code
        return self::$typeConverters;
    }

    /**
     * @param AssociativeArray $typeConverters
     */
    private static function setTypeConverters(AssociativeArray $typeConverters)
    {
        // Start of user code Static setter DataSourceTypeConvertersRegistry.setTypeConverters
        // End of user code
        self::$typeConverters = $typeConverters;
    }

    /**
     * @param TypeConverter $typeConverter
     */
    public static function registerTypeConverter(TypeConverter $typeConverter)
    {
        // Start of user code DataSourceTypeConvertersRegistry.registerTypeConverter
        // TODO should be implemented.
        // End of user code
    }

    /**
     * @param string $type
     * @param string $dataSourceType
     * @return TypeConverter $typeConverter
     */
    public static function getTypeConverter($type, $dataSourceType)
    {
        // Start of user code DataSourceTypeConvertersRegistry.getTypeConverter
        // TODO should be implemented.
        // End of user code
    
        return $typeConverter;
    }

    /**
     * @param string $type
     * @param string $dataSourceType
     */
    public static function clearTypeConverter($type, $dataSourceType)
    {
        // Start of user code DataSourceTypeConvertersRegistry.clearTypeConverter
        // TODO should be implemented.
        // End of user code
    }

    /**
     * @param string $type
     * @param string $dataSourceType
     * @return bool $boolean
     */
    public static function hasTypeConverter($type, $dataSourceType)
    {
        // Start of user code DataSourceTypeConvertersRegistry.hasTypeConverter
        // TODO should be implemented.
        // End of user code
    
        return $boolean;
    }

    // Start of user code DataSourceTypeConvertersRegistry.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
