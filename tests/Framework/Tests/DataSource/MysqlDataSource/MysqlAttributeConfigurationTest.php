<?php

namespace TiBeN\Framework\Tests\DataSource\MysqlDataSource;

use TiBeN\Framework\DataSource\MysqlDataSource\MysqlAttributeConfiguration;

// Start of user code MysqlAttributeConfiguration.useStatements
use TiBeN\Framework\Datatype\AssociativeArray;

// End of user code

/**
 * Test cases for class MysqlAttributeConfiguration
 * 
 * Start of user code MysqlAttributeConfigurationTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @author TiBeN
 */
class MysqlAttributeConfigurationTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code MysqlAttributeConfigurationTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code MysqlAttributeConfigurationTest.setUp
		// Place additional setUp code here.  
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code MysqlAttributeConfigurationTest.tearDown
		// Place additional tearDown code here.  
		// End of user code
    }
    
    

    /**
     * Test static method create from interface DataSourceAttributeMappingConfiguration
     * Start of user code DataSourceAttributeMappingConfiguration.testcreateAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testCreate()
    {
        // Start of user code DataSourceAttributeMappingConfiguration.testcreate
        $expectedMac = new MysqlAttributeConfiguration();
        $expectedMac->setColumnName('test');        
        $expectedMac->setIsAutoIncrement(true);
        
        $this->assertEquals(
            $expectedMac, 
            MysqlAttributeConfiguration::create(
                AssociativeArray::createFromNativeArray(
                    null, 
                    array(
                        'columnName' => 'test',            
                        'isAutoIncrement' => true
                    )
                )
            )
        );
    	// End of user code
    }

    // Start of user code MysqlAttributeConfigurationTest.methods
    
	/**
	 * Test create a MysqlAttributeConfiguration without columnName
     *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage No column name set
	 */
    public function testCreateAMysqlAttributeConfigurationWithoutColumnName() 
    {
        MysqlAttributeConfiguration::create(
            AssociativeArray::createFromNativeArray(
                null, 
                array(           
                    'isAutoIncrement' => true
                )
            )
        );
    }
	// End of user code
}
