<?php

namespace TiBeN\Framework\Tests\DataSource\MysqlDataSource;

use TiBeN\Framework\DataSource\MysqlDataSource\MysqlDataSource;

// Start of user code MysqlDataSource.useStatements
use TiBeN\Framework\Tests\Fixtures\DataSource\MysqlDataSource\MysqlDataSourceTestSetupTearDown;
use TiBeN\Framework\Tests\Fixtures\Entity\SomeEntity;
use TiBeN\Framework\DataSource\DataSourcesRegistry;
use TiBeN\Framework\Entity\EntityMappingsRegistry;

// End of user code

/**
 * Test cases for class MysqlDataSource
 * 
 * Start of user code MysqlDataSourceTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @author TiBeN
 */
class MysqlDataSourceTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code MysqlDataSourceTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code MysqlDataSourceTest.setUp
		try {
			MysqlDataSourceTestSetupTearDown::setUp();
            MysqlDataSourceTestSetupTearDown::declareBuiltInTypeConverters();
			MysqlDataSourceTestSetupTearDown::declareSomeEntityMapping();
			MysqlDataSourceTestSetupTearDown::createTableForSomeEntity();
		}
		catch(\Exception $e) {
			$this->markTestSkipped($e->getMessage());
		}
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code MysqlDataSourceTest.tearDown
		// Place additional tearDown code here.  
		// End of user code
    }
    
    

    /**
     * Test method delete from interface DataSource
     * Start of user code DataSource.testdeleteAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testDelete()
    {
        // Start of user code DataSource.testdelete
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    	// End of user code
    }
    
    /**
     * Test method read from interface DataSource
     * Start of user code DataSource.testreadAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testRead()
    {
        // Start of user code DataSource.testread
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    	// End of user code
    }
    
    /**
     * Test static method getEntityMappingConfigurationClassName from interface DataSource
     * Start of user code DataSource.testgetEntityMappingConfigurationClassNameAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testGetEntityMappingConfigurationClassName()
    {
        // Start of user code DataSource.testgetEntityMappingConfigurationClassName
	    $this->assertEquals(
            'TiBeN\\Framework\\DataSource\\MysqlDataSource\\MysqlEntityConfiguration',
            MysqlDataSource::getEntityMappingConfigurationClassName()
	    );        
    	// End of user code
    }
    
    /**
     * Test method create from interface DataSource
     * Start of user code DataSource.testcreateAnnotations 
     * @group mysqldatasource-create 
     * End of user code
     */
    public function testCreate()
    {
        // Start of user code DataSource.testcreate
        $entity = new SomeEntity();
        $entity->setAttributeA('foo');
        $entity->setAttributeB('bar');
        $entity->setAttributeC('baz');
        
        $dataSource = DataSourcesRegistry::getDataSource('test-mysql');   

        $entityMapping = EntityMappingsRegistry::getEntityMapping(
            'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
        );
        
        $dataSource->create($entityMapping, $entity);
        
        $pdo = MysqlDataSourceTestSetupTearDown::getPdoConnection($GLOBALS['db_name']);
        
        $pdoStatement = $pdo->query('SELECT * FROM some_entity_data_table WHERE idTable = 1');
        $this->assertInstanceOf('PDOStatement', $pdoStatement);
        $this->assertEquals(1, $pdoStatement->rowCount());
        
        $expectedRow = array(
            'idTable' => '1',
            'a' => 'foo',
            'b' => 'bar',
            'c' => 'baz'                                    
        );
        
        $this->assertEquals($expectedRow, $pdoStatement->fetch(\PDO::FETCH_ASSOC));

        $this->assertSame(1, $entity->getId());
    	// End of user code
    }
    
    /**
     * Test static method getAttributeMappingConfigurationClassName from interface DataSource
     * Start of user code DataSource.testgetAttributeMappingConfigurationClassNameAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testGetAttributeMappingConfigurationClassName()
    {
        // Start of user code DataSource.testgetAttributeMappingConfigurationClassName
	    $this->assertEquals(
            'TiBeN\\Framework\\DataSource\\MysqlDataSource\\MysqlAttributeConfiguration', 
            MysqlDataSource::getAttributeMappingConfigurationClassName()
        );
    	// End of user code
    }
    
    /**
     * Test method update from interface DataSource
     * Start of user code DataSource.testupdateAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testUpdate()
    {
        // Start of user code DataSource.testupdate
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    	// End of user code
    }

    // Start of user code MysqlDataSourceTest.methods
	// Place additional tests methods here.  
	// End of user code
}
