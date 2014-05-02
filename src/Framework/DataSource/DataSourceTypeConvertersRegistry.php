<?php

namespace TiBeN\Framework\DataSource;

use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code DataSourceTypeConvertersRegistry.useStatements
// Place your use statements here.
// End of user code

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
	    if(!isset(self::$typeConverters)) {
	        self::$typeConverters = new AssociativeArray(
                'TiBeN\\Framework\\Datatype\\AssociativeArray'
            );
	    }		
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
     * @param string $type
     * @param string $dataSourceType
     * @return bool $boolean
     */
    public static function hasTypeConverter($type, $dataSourceType)
    {
        // Start of user code DataSourceTypeConvertersRegistry.hasTypeConverter
		$boolean = self::getTypeConverters()->has($dataSourceType)
            && self::getTypeConverters()->get($dataSourceType)->has($type)
        ;             		  	    
        // End of user code
    
        return $boolean;
    }

    /**
     * @param string $type
     * @param string $dataSourceType
     * @return TypeConverter $typeConverter
     */
    public static function getTypeConverter($type, $dataSourceType)
    {
        // Start of user code DataSourceTypeConvertersRegistry.getTypeConverter
	    if(!self::hasTypeConverter($type, $dataSourceType)) {
	        throw new \InvalidArgumentException(
                sprintf(
                    'No type converter \'%s\' for datasource \'%s\'',
                    $type,
                    $dataSourceType
                )
	        );
	    }
	     
	    $typeConverter = self::getTypeConverters()
	       ->get($dataSourceType)
	       ->get($type)
        ;	           
        // End of user code
    
        return $typeConverter;
    }

    /**
     * @param TypeConverter $typeConverter
     */
    public static function registerTypeConverter(TypeConverter $typeConverter)
    {
        // Start of user code DataSourceTypeConvertersRegistry.registerTypeConverter
		if(!self::getTypeConverters()->has($typeConverter->getDataSourceType())) {
		    self::getTypeConverters()
                ->set(                                            
                    $typeConverter->getDataSourceType(),
                    new AssociativeArray(
                        'TiBeN\\Framework\\DataSource\\TypeConverter'
                    )
                );
		}
		
		self::getTypeConverters()
            ->get($typeConverter->getDataSourceType())
            ->set($typeConverter->getType(), $typeConverter)    
		;
        // End of user code
    }

    /**
     * @param string $type
     * @param string $dataSourceType
     */
    public static function clearTypeConverter($type, $dataSourceType)
    {
        // Start of user code DataSourceTypeConvertersRegistry.clearTypeConverter
		if(!self::hasTypeConverter($type, $dataSourceType)) {
		    throw new \InvalidArgumentException(
                sprintf(
                    'No type converter \'%s\' for datasource \'%s\'', 
                    $type, 
                    $dataSourceType
                )
            );
		}
		
		self::getTypeConverters()->get($dataSourceType)->remove($type);		
        // End of user code
    }

    // Start of user code DataSourceTypeConvertersRegistry.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
