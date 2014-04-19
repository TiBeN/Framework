<?php

namespace TiBeN\Framework\Tests\DataSource\MysqlDataSource;

use TiBeN\Framework\DataSource\MysqlDataSource\MysqlEntityConfiguration;

// Start of user code MysqlEntityConfiguration.useStatements
use TiBeN\Framework\Datatype\AssociativeArray;

// End of user code

/**
 * Test cases for class MysqlEntityConfiguration
 * 
 * Start of user code MysqlEntityConfigurationTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @author TiBeN
 */
class MysqlEntityConfigurationTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code MysqlEntityConfigurationTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code MysqlEntityConfigurationTest.setUp
		// Place additional setUp code here.  
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code MysqlEntityConfigurationTest.tearDown
		// Place additional tearDown code here.  
		// End of user code
    }
    
    

    /**
     * Test static method create from interface DataSourceEntityMappingConfiguration
     * Start of user code DataSourceEntityMappingConfiguration.testcreateAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testCreate()
    {
        // Start of user code DataSourceEntityMappingConfiguration.testcreate
        $expectedEc = new MysqlEntityConfiguration();
        $expectedEc->setTableName('someTable');
        
        $this->assertEquals(
            $expectedEc, 
            MysqlEntityConfiguration::create(
                AssociativeArray::createFromNativeArray(
                    null, 
                    array('tableName' => 'someTable')
                )
            )
        );
    	// End of user code
    }

    // Start of user code MysqlEntityConfigurationTest.methods

	/**
	 * Test create a MysqlEntityConfiguration without tableName
     *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage No table name set
	 */
	public function testCreateAMysqlEntityConfigurationWithoutTableName()
	{
	    MysqlEntityConfiguration::create(
            AssociativeArray::createFromNativeArray(null, array())
        );
	}
	// End of user code
}
