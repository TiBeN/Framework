<?php

namespace TiBeN\Framework\Tests\Entity;

use TiBeN\Framework\Entity\EntityRepository;

// Start of user code EntityRepository.useStatements
use TiBeN\Framework\Tests\Fixtures\DataSource\MysqlDataSource\MysqlDataSourceTestSetupTearDown;
use TiBeN\Framework\Tests\Fixtures\Entity\SomeEntity;
use TiBeN\Framework\Entity\CriteriaSet;

// End of user code

/**
 * Test cases for class EntityRepository
 * 
 * Start of user code EntityRepositoryTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\Entity
 * @author TiBeN
 */
class EntityRepositoryTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code EntityRepositoryTest.attributes
    // Place additional tests attributes here.  
    // End of user code

    public function setUp()
    {
        // Start of user code EntityRepositoryTest.setUp
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
        // Start of user code EntityRepositoryTest.tearDown
        MysqlDataSourceTestSetupTearDown::tearDown();
        // End of user code
    }
    
    /**
     * Test method persist from class EntityRepository
     *
     * Start of user code EntityRepositoryTest.testpersistAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testPersist()
    {
        // Start of user code EntityRepositoryTest.testpersist
        $entity = new SomeEntity();
        $entity->setAttributeA('foo');
        $entity->setAttributeB('bar');
        $entity->setAttributeC('baz');
        $repository = EntityRepository::instantiateFromEntityClassName(
            'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
        );

        $repository->persist($entity);
        
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

        // Test updating an entity
        $entity->setAttributeA('refoo');
        $repository->persist($entity);
        
        $pdoStatement = $pdo->query(
            'SELECT * FROM some_entity_data_table WHERE idTable = 1'
        );
        $this->assertInstanceOf('PDOStatement', $pdoStatement);
        $this->assertEquals(1, $pdoStatement->rowCount());
        
        $expectedRow = array(
            'idTable' => '1',
            'a' => 'refoo',
            'b' => 'bar',
            'c' => 'baz'
        );
        $this->assertEquals($expectedRow, $pdoStatement->fetch(\PDO::FETCH_ASSOC));
        $this->assertSame(1, $entity->getId());

        // End of user code
    }
    
    /**
     * Test static method instantiateFromEntityClassName from class EntityRepository
     *
     * Start of user code EntityRepositoryTest.testinstantiateFromEntityClassNameAnnotations
     * PHPUnit user annotations can be placed here
     * End of user code
     */
    public function testInstantiateFromEntityClassName()
    {
        // Start of user code EntityRepositoryTest.testinstantiateFromEntityClassName
        // Case tested by others test cases
        // End of user code
    }
    
    /**
     * Test method find from class EntityRepository
     *
     * Start of user code EntityRepositoryTest.testfindAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testFind()
    {
        // Start of user code EntityRepositoryTest.testfind
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
    
        $repository = EntityRepository::instantiateFromEntityClassName(
            'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
        );

        $criterias = CriteriaSet::createAnd();

        $entityCollection = $repository->find($criterias);
        $this->assertEquals(2, $entityCollection->count()); 
        $this->assertEquals($expectedEntity1, $entityCollection->get(0));
        $this->assertEquals($expectedEntity2, $entityCollection->get(1));
        // End of user code
    }
    
    /**
     * Test method delete from class EntityRepository
     *
     * Start of user code EntityRepositoryTest.testdeleteAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testDelete()
    {
        // Start of user code EntityRepositoryTest.testdelete
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

        // Delete the entity
        $repository = EntityRepository::instantiateFromEntityClassName(
            'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
        );

        $repository->delete($entity);
        
        // Check if the record has been deleted from the table
        $pdoStatement = $pdo->query(
            'SELECT * FROM some_entity_data_table WHERE idTable = 2'
        ); 
        $this->assertInstanceOf('PDOStatement', $pdoStatement);
        $this->assertSame(0, $pdoStatement->rowCount());
        // End of user code
    }

    // Start of user code EntityRepositoryTest.methods
    // Place additional tests methods here.  
    // End of user code
}
