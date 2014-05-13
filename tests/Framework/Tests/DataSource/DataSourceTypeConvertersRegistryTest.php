<?php

namespace TiBeN\Framework\Tests\DataSource;

use TiBeN\Framework\DataSource\DataSourceTypeConvertersRegistry;

// Start of user code DataSourceTypeConvertersRegistry.useStatements
use TiBeN\Framework\DataSource\MysqlDataSource\TypeConverter\IntegerConverter;

// End of user code

/**
 * Test cases for class DataSourceTypeConvertersRegistry
 * 
 * Start of user code DataSourceTypeConvertersRegistryTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\DataSource
 * @author TiBeN
 */
class DataSourceTypeConvertersRegistryTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code DataSourceTypeConvertersRegistryTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code DataSourceTypeConvertersRegistryTest.setUp
		// Place additional setUp code here.  
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code DataSourceTypeConvertersRegistryTest.tearDown
		// Place additional tearDown code here.  
		// End of user code
    }
    
    /**
     * Test static method registerTypeConverter from class DataSourceTypeConvertersRegistry
     *
     * Start of user code DataSourceTypeConvertersRegistryTest.testregisterTypeConverterAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testRegisterTypeConverter()
    {
        // Start of user code DataSourceTypeConvertersRegistryTest.testregisterTypeConverter
        DataSourceTypeConvertersRegistry::registerTypeConverter(new IntegerConverter());
        $this->assertInstanceOf(
            'TiBeN\\Framework\\DataSource\\MysqlDataSource\\TypeConverter\\IntegerConverter',
            DataSourceTypeConvertersRegistry::getTypeConverter('integer', 'mysql')
        );
		// End of user code
    }
    
    /**
     * Test static method hasTypeConverter from class DataSourceTypeConvertersRegistry
     *
     * Start of user code DataSourceTypeConvertersRegistryTest.testhasTypeConverterAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testHasTypeConverter()
    {
        // Start of user code DataSourceTypeConvertersRegistryTest.testhasTypeConverter
	    DataSourceTypeConvertersRegistry::registerTypeConverter(new IntegerConverter());
	    $this->assertTrue(
            DataSourceTypeConvertersRegistry::hasTypeConverter('integer', 'mysql')
        );
		// End of user code
    }
    
    /**
     * Test static method getTypeConverter from class DataSourceTypeConvertersRegistry
     *
     * Start of user code DataSourceTypeConvertersRegistryTest.testgetTypeConverterAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testGetTypeConverter()
    {
        // Start of user code DataSourceTypeConvertersRegistryTest.testgetTypeConverter
	    // test case covered by testRegisterTypeConverter
		// End of user code
    }
    
    /**
     * Test static method clearTypeConverter from class DataSourceTypeConvertersRegistry
     *
     * Start of user code DataSourceTypeConvertersRegistryTest.testclearTypeConverterAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testClearTypeConverter()
    {
        // Start of user code DataSourceTypeConvertersRegistryTest.testclearTypeConverter
	    DataSourceTypeConvertersRegistry::registerTypeConverter(new IntegerConverter());
	    DataSourceTypeConvertersRegistry::clearTypeConverter('integer', 'mysql');
	    $this->assertFalse(
            DataSourceTypeConvertersRegistry::hasTypeConverter('integer', 'mysql')
        );
		// End of user code
    }

    // Start of user code DataSourceTypeConvertersRegistryTest.methods

	/**
	 * Test getting a non existant TypeConverter
     *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionArgument No type converter 'foo' for datasource 'bar'
	 */
	public function testGettingNonExistantTypeConverter()
	{
	    DataSourceTypeConvertersRegistry::getTypeConverter('foo', 'bar');	    
	}
	
	/**
	 * Test getting a clear TypeConverter
     *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage No type converter 'integer' for datasource 'mysql'
	 */
	public function testGettingClearTypeConverter()
	{	    
	    DataSourceTypeConvertersRegistry::registerTypeConverter(new IntegerConverter());
	    DataSourceTypeConvertersRegistry::clearTypeConverter('integer', 'mysql');
	    DataSourceTypeConvertersRegistry::getTypeConverter('integer', 'mysql');
	}
	
	/**
	 * Test clear a non existant TypeConverter
     *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage No type converter 'sometype' for datasource 'mysql'
	 */
	public function testClearNonExistantTypeConverter()
	{
	    DataSourceTypeConvertersRegistry::clearTypeConverter('sometype', 'mysql');
	}
	// End of user code
}
