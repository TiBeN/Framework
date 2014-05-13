<?php

namespace TiBeN\Framework\Tests\DataSource\MysqlDataSource;

use TiBeN\Framework\DataSource\MysqlDataSource\MysqlDataSource;

// Start of user code MysqlDataSource.useStatements
use TiBeN\Framework\Tests\Fixtures\DataSource\MysqlDataSource\MysqlDataSourceTestSetupTearDown;
use TiBeN\Framework\Tests\Fixtures\Entity\SomeEntity;
use TiBeN\Framework\DataSource\DataSourcesRegistry;
use TiBeN\Framework\Entity\EntityMappingsRegistry;
use TiBeN\Framework\Entity\CriteriaSet;
use TiBeN\Framework\Entity\MatchCriteria;
use TiBeN\Framework\Entity\OrderCriteria;
use TiBeN\Framework\Entity\LimitCriteria;

// End of user code

/**
 * Test cases for class MysqlDataSource
 * 
 * Start of user code MysqlDataSourceTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\DataSource\MysqlDataSource
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
        MysqlDataSourceTestSetupTearDown::tearDown();
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
     * Test method delete from interface DataSource
     * Start of user code DataSource.testdeleteAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testDelete()
    {
        // Start of user code DataSource.testdelete
        $pdo = MysqlDataSourceTestSetupTearDown::getPdoConnection($GLOBALS['db_name']);
       
        // Insert a record into a table
        $pdo->exec(
            'INSERT INTO some_entity_data_table (idTable, a, b, c) VALUES (2, \'foo\', \'foo\', \'foo\')'
        );

        // Check if the record has been inserted on the table
        $pdoStatement = $pdo->query(
            'SELECT * FROM some_entity_data_table WHERE idTable = 2'
        ); 
        $this->assertInstanceOf('PDOStatement', $pdoStatement);
        $this->assertEquals(1, $pdoStatement->rowCount());

        // Manually construct the entity
        $entity = new SomeEntity();
        $entity->setId(2);
        $entity->setAttributeA('foo');
        $entity->setAttributeB('foo');
        $entity->setAttributeC('foo');

        // Delete entity using MysqlDataSource
        $dataSource = DataSourcesRegistry::getDataSource('test-mysql');   
        $entityMapping = EntityMappingsRegistry::getEntityMapping(
            'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
        );
        $dataSource->delete($entityMapping, $entity);
        
        // Check if the record has been deleted from the table
        $pdoStatement = $pdo->query(
            'SELECT * FROM some_entity_data_table WHERE idTable = 2'
        ); 
        $this->assertInstanceOf('PDOStatement', $pdoStatement);
        $this->assertSame(0, $pdoStatement->rowCount());
        
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
        $pdo = MysqlDataSourceTestSetupTearDown::getPdoConnection($GLOBALS['db_name']);
       
        // Insert a record into a table
        $pdo->exec(
            'INSERT INTO some_entity_data_table (idTable, a, b, c) VALUES (2, \'foo\', \'foo\', \'foo\')'
        );

        // Check if the record has been inserted on the table
        $pdoStatement = $pdo->query(
            'SELECT * FROM some_entity_data_table WHERE idTable = 2'
        ); 
        $this->assertInstanceOf('PDOStatement', $pdoStatement);
        $this->assertEquals(1, $pdoStatement->rowCount());

        // Manually construct the entity
        $entity = new SomeEntity();
        $entity->setId(2);
        $entity->setAttributeA('bar');
        $entity->setAttributeB('bar');
        $entity->setAttributeC('bar');

        // Update entity using MysqlDataSource
        $dataSource = DataSourcesRegistry::getDataSource('test-mysql');   
        $entityMapping = EntityMappingsRegistry::getEntityMapping(
            'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
        );
        $dataSource->update($entityMapping, $entity);
        
        // Check if the record has been updated into the table
        $pdoStatement = $pdo->query(
            'SELECT * FROM some_entity_data_table WHERE idTable = 2'
        ); 
        $this->assertInstanceOf('PDOStatement', $pdoStatement);
        $this->assertSame(1, $pdoStatement->rowCount());
        
        $expectedRow = array(
            'idTable' => '2',
            'a' => 'bar',
            'b' => 'bar',
            'c' => 'bar'
        );
        $this->assertEquals($expectedRow, $pdoStatement->fetch(\PDO::FETCH_ASSOC));
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
        $pdoStatement = $pdo->query(
            'SELECT * FROM some_entity_data_table WHERE idTable = 1'
        );
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
     * Test method read from interface DataSource
     * Start of user code DataSource.testreadAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testRead()
    {
        // Start of user code DataSource.testread
        $pdo = MysqlDataSourceTestSetupTearDown::getPdoConnection($GLOBALS['db_name']);
        
        // Insert some records into table
        $pdo->exec(
            'INSERT INTO some_entity_data_table (idTable, a, b, c) VALUES (1, \'foo\', \'foo\', \'foo\')'
        );

        $pdo->exec(
            'INSERT INTO some_entity_data_table (idTable, a, b, c) VALUES (2, \'bar\', \'bar\', \'bar\')'
        );

        $expectedEntity1 = new SomeEntity();
        $expectedEntity1->setId(1);
        $expectedEntity1->setAttributeA('foo');
        $expectedEntity1->setAttributeB('foo');
        $expectedEntity1->setAttributeC('foo');

        $expectedEntity2 = new SomeEntity();
        $expectedEntity2->setId(2);
        $expectedEntity2->setAttributeA('bar');
        $expectedEntity2->setAttributeB('bar');
        $expectedEntity2->setAttributeC('bar');

        $dataSource = DataSourcesRegistry::getDataSource('test-mysql');   
        $entityMapping = EntityMappingsRegistry::getEntityMapping(
            'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
        );

        $criterias = CriteriaSet::createAnd();

        $entityCollection = $dataSource->read($entityMapping, $criterias);
        $this->assertEquals(2, $entityCollection->count()); 
        $this->assertEquals($expectedEntity1, $entityCollection->get(0));
        $this->assertEquals($expectedEntity2, $entityCollection->get(1));
       
        $criterias->getOrderCriterias()->add(OrderCriteria::desc('id')); 
        
        $entityCollection = $dataSource->read($entityMapping, $criterias);
        $this->assertEquals(2, $entityCollection->count()); 
        $this->assertEquals($expectedEntity2, $entityCollection->get(0));
        $this->assertEquals($expectedEntity1, $entityCollection->get(1));
      
        $criterias->setLimitCriteria(LimitCriteria::to(1));

        $entityCollection = $dataSource->read($entityMapping, $criterias);
        $this->assertEquals(1, $entityCollection->count()); 
        $this->assertEquals($expectedEntity2, $entityCollection->get(0));
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

    // Start of user code MysqlDataSourceTest.methods
    /**
     * Test deleting a non existant record
     *
     * @expectedException LogicException
     * @expectedExceptionMessage The entity doesn't exist. Maybe it has already been deleted ?
     */
    public function testDeleteANonExistantEntity()
    {
        $entity = new SomeEntity();
        $entity->setId(1337);
        $entity->setAttributeA('foo');
        $entity->setAttributeB('bar');
        $entity->setAttributeC('baz');
        
        $dataSource = DataSourcesRegistry::getDataSource('test-mysql');   

        $entityMapping = EntityMappingsRegistry::getEntityMapping(
            'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
        );
        
        $dataSource->delete($entityMapping, $entity);
    }

    /**
     * Test update a non existant record
     *
     * @expectedException LogicException
     * @expectedExceptionMessage The entity doesn't exist into the database. 

     */
    public function testUpdateANonExistantEntity()
    {
        $entity = new SomeEntity();
        $entity->setId(1337);
        $entity->setAttributeA('foo');
        $entity->setAttributeB('bar');
        $entity->setAttributeC('baz');
        
        $dataSource = DataSourcesRegistry::getDataSource('test-mysql');   

        $entityMapping = EntityMappingsRegistry::getEntityMapping(
            'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
        );
        
        $dataSource->update($entityMapping, $entity);
    }

    // End of user code
}
