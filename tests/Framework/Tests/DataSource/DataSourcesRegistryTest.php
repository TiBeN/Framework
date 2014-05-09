<?php

namespace TiBeN\Framework\Tests\DataSource;

use TiBeN\Framework\DataSource\DataSourcesRegistry;

// Start of user code DataSourcesRegistry.useStatements
use TiBeN\Framework\Tests\Fixtures\DataSource\TestDataSource;

// End of user code

/**
 * Test cases for class DataSourcesRegistry
 * 
 * Start of user code DataSourcesRegistryTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @author TiBeN
 */
class DataSourcesRegistryTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code DataSourcesRegistryTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code DataSourcesRegistryTest.setUp
		// Place additional setUp code here.  
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code DataSourcesRegistryTest.tearDown
		// Place additional tearDown code here.  
		// End of user code
    }
    
    /**
     * Test static method hasDataSource from class DataSourcesRegistry
     *
     * Start of user code DataSourcesRegistryTest.testhasDataSourceAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testHasDataSource()
    {
        // Start of user code DataSourcesRegistryTest.testhasDataSource
        $dataSource = new TestDataSource();
        $dataSource->setName('test');
        DataSourcesRegistry::registerDataSource($dataSource);
        $this->assertTrue(DataSourcesRegistry::hasDataSource('test'));
        $this->assertFalse(DataSourcesRegistry::hasDataSource('foo'));
		// End of user code
    }
    
    /**
     * Test static method registerDataSource from class DataSourcesRegistry
     *
     * Start of user code DataSourcesRegistryTest.testregisterDataSourceAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testRegisterDataSource()
    {
        // Start of user code DataSourcesRegistryTest.testregisterDataSource
        $dataSource = new TestDataSource();
        $dataSource->setName('test');
        DataSourcesRegistry::registerDataSource($dataSource);
        $this->assertEquals($dataSource, DataSourcesRegistry::getDataSource('test'));
		// End of user code
    }
    
    /**
     * Test static method clearDataSource from class DataSourcesRegistry
     *
     * Start of user code DataSourcesRegistryTest.testclearDataSourceAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testClearDataSource()
    {
        // Start of user code DataSourcesRegistryTest.testclearDataSource
	    // Nothing to test here. Tested below by exceptions.
		// End of user code
    }
    
    /**
     * Test static method getDataSource from class DataSourcesRegistry
     *
     * Start of user code DataSourcesRegistryTest.testgetDataSourceAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testGetDataSource()
    {
        // Start of user code DataSourcesRegistryTest.testgetDataSource
	    // Tested by "testRegisterDataSource"
		// End of user code
    }

    // Start of user code DataSourcesRegistryTest.methods

	/**
	 * Test getting a non existant DataSource
     *
     * @runInSeparateProcess
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionArgument No data source named "test"
	 */
	public function testGettingNonExistantDataSource() 
	{
	    DataSourcesRegistry::getDataSource('test');
	}
	
	/**
	 * Test getting a clear DataSource
     *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionArgument No data source named "test"
	 */
	public function testGettingClearDataSource()
	{
	    $dataSource = new TestDataSource();
	    $dataSource->setName('test');
	    DataSourcesRegistry::registerDataSource($dataSource);
	    DataSourcesRegistry::clearDataSource('test');
	    DataSourcesRegistry::getDataSource('test');
	}	
	
	/**
	 * Test clear a non existant DataSource
     *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionArgument No data source named "test"
	 */
	public function testClearNonExistantDataSource()
    {
	    DataSourcesRegistry::clearDataSource('test');	    
	}

	/**
	 * Test register a not named DataSource
     *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionArgument The data source has no name
	 */
	public function testRegisterNotNamedDataSource()
	{
	    $dataSource = new TestDataSource();
	    DataSourcesRegistry::registerDataSource($dataSource);    
	}	
	// End of user code
}
