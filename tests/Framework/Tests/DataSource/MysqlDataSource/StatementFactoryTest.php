<?php

namespace TiBeN\Framework\Tests\DataSource\MysqlDataSource;

use TiBeN\Framework\DataSource\MysqlDataSource\StatementFactory;

// Start of user code StatementFactory.useStatements
use TiBeN\Framework\Tests\Fixtures\DataSource\MysqlDataSource\MysqlDataSourceTestSetupTearDown;
use TiBeN\Framework\Tests\Fixtures\Entity\SomeEntity;
use TiBeN\Framework\Entity\EntityMappingsRegistry;
use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\DataSource\MysqlDataSource\GenericStatement;
use TiBeN\Framework\Entity\CriteriaSet;
use TiBeN\Framework\Entity\MatchCriteria;
use TiBeN\Framework\Entity\OrderCriteria;
use TiBeN\Framework\Entity\LimitCriteria;

// End of user code

/**
 * Test cases for class StatementFactory
 * 
 * Start of user code StatementFactoryTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\DataSource\MysqlDataSource
 * @author TiBeN
 */
class StatementFactoryTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code StatementFactoryTest.attributes
    // Place additional tests attributes here.  
    // End of user code

    public function setUp()
    {
        // Start of user code StatementFactoryTest.setUp
        MysqlDataSourceTestSetupTearDown::declareBuiltInTypeConverters();
        MysqlDataSourceTestSetupTearDown::declareSomeEntityMapping();
        // End of user code
    }

    public function tearDown()
    {
        // Start of user code StatementFactoryTest.tearDown
        // Place additional tearDown code here.  
        // End of user code
    }
    
    /**
     * Test static method createUpdateStatementFromEntity from class StatementFactory
     *
     * Start of user code StatementFactoryTest.testcreateUpdateStatementFromEntityAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testCreateUpdateStatementFromEntity()
    {
        // Start of user code StatementFactoryTest.testcreateUpdateStatementFromEntity
        $expectedStatement = 'UPDATE some_entity_data_table SET idTable=:idTable,a=:a,b=:b,c=:c WHERE idTable = :id0'; 
        
        $expectedParameters = array(
            'idTable' => '1337',
            'a' => 'foo',
            'b' => 'bar',
            'c' => 'baz',
            'id0' => '1337'
        );

        $entity = new SomeEntity();
        $entity->setId(1337);
        $entity->setAttributeA('foo');
        $entity->setAttributeB('bar');
        $entity->setAttributeC('baz');

        $entityMapping = EntityMappingsRegistry::getEntityMapping(
            'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
        );

        $update = StatementFactory::createUpdateStatementFromEntity(
            $entityMapping,
            $entity
        );

        $this->assertEquals($expectedStatement, $update->toString());
        $this->assertEquals(
            AssociativeArray::createFromNativeArray(
                null, 
                $expectedParameters
            ),
            $update->getStatementParameters()
        );
        // End of user code
    }
    
    /**
     * Test static method createFromString from class StatementFactory
     *
     * Start of user code StatementFactoryTest.testcreateFromStringAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testCreateFromString()
    {
        // Start of user code StatementFactoryTest.testcreateFromString
        $expectedStatement = new GenericStatement();
        $expectedStatement->setStatementString('SELECT * someTable where id=:id');
        
        $statementParameters = AssociativeArray::createFromNativeArray(
            null, 
            array('id' => 1337)
        );
        
        $expectedStatement->setStatementParameters($statementParameters);        
        $actualStatement = StatementFactory::createFromString(
            'SELECT * someTable where id=:id', 
            $statementParameters
        );
        
        $this->assertEquals($expectedStatement, $actualStatement);
        // End of user code
    }
    
    /**
     * Test static method createDeleteStatement from class StatementFactory
     *
     * Start of user code StatementFactoryTest.testcreateDeleteStatementAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testCreateDeleteStatement()
    {
        // Start of user code StatementFactoryTest.testcreateDeleteStatement
        $expectedStatement = 'DELETE FROM some_entity_data_table WHERE idTable = :id0';
        $expectedParameters = array('id0' => 1337);
        
        $entity = new SomeEntity();
        $entity->setId(1337);
        $entity->setAttributeA('foo');
        $entity->setAttributeB('bar');
        $entity->setAttributeC('baz');

        $entityMapping = EntityMappingsRegistry::getEntityMapping(
            'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
        );

        $delete = StatementFactory::createDeleteStatement(
            $entityMapping,
            $entity
        );

        $this->assertEquals($expectedStatement, $delete->toString());
        $this->assertEquals(
            AssociativeArray::createFromNativeArray(
                null, 
                $expectedParameters
            ),
            $delete->getStatementParameters()
        );
        // End of user code
    }
    
    /**
     * Test static method createSelectStatementFromCriteriaSet from class StatementFactory
     *
     * Start of user code StatementFactoryTest.testcreateSelectStatementFromCriteriaSetAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testCreateSelectStatementFromCriteriaSet()
    {
        // Start of user code StatementFactoryTest.testcreateSelectStatementFromCriteriaSet
        $expectedStatement = 'SELECT idTable,a,b,c FROM some_entity_data_table WHERE ((b = :attributeB0 AND b != :attributeB1) OR b != :attributeB2 OR a = :attributeA0 OR a != :attributeA1 OR a > :attributeA2) AND c LIKE :attributeC0 AND a != :attributeA3 ORDER BY idTable ASC, a DESC LIMIT 5,10';
        $criteriaSet = CriteriaSet::createAnd()
            ->addSubSet(
                CriteriaSet::createOr()
                    ->add(MatchCriteria::notEquals('attributeB', 1337))
                    ->add(MatchCriteria::equals('attributeA', 'foo'))
                    ->add(MatchCriteria::notEquals('attributeA', 'bar'))
                    ->add(MatchCriteria::greaterThan('attributeA', 'baz'))
                    ->addSubSet(
                        CriteriaSet::createAnd()
                            ->add(MatchCriteria::equals('attributeB', 'foo'))
                            ->add(MatchCriteria::notEquals('attributeB', 'bar'))
                    )
            )
            ->add(MatchCriteria::like('attributeC', 'baz'))
            ->add(MatchCriteria::notEquals('attributeA', 'foo'))
            ->addOrder(OrderCriteria::asc('id'))
            ->addOrder(OrderCriteria::desc('attributeA'))
            ->setLimit(LimitCriteria::to(10,5))
        ;           
        $entityMapping = EntityMappingsRegistry::getEntityMapping(
            'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
        );                
        $select = StatementFactory::createSelectStatementFromCriteriaSet(
            $entityMapping, 
            $criteriaSet
        );
        $this->assertEquals($expectedStatement, $select->toString());
        // End of user code
    }
    
    /**
     * Test static method createInsertStatement from class StatementFactory
     *
     * Start of user code StatementFactoryTest.testcreateInsertStatementAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testCreateInsertStatement()
    {
        // Start of user code StatementFactoryTest.testcreateInsertStatement
        $expectedStatement 
            = 'INSERT INTO some_entity_data_table (idTable,a,b,c) VALUES(:idTable,:a,:b,:c)'
        ;
        $expectedParameters = array(
            'idTable' => NULL,
            'a' => 'foo',
            'b' => 'bar',
            'c' => 'baz'                                 
        );
        
        $entity = new SomeEntity();
        $entity->setAttributeA('foo');
        $entity->setAttributeB('bar');
        $entity->setAttributeC('baz');
        
        $actualStatement = StatementFactory::createInsertStatement(
            EntityMappingsRegistry::getEntityMapping(
                'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
            ), 
            $entity
        );        
        
        $this->assertEquals($expectedStatement, $actualStatement->toString());
        
        $this->assertEquals(
            AssociativeArray::createFromNativeArray(
                null,
                $expectedParameters                                    
            ),
            $actualStatement->getStatementParameters()    
        );
        // End of user code
    }

    // Start of user code StatementFactoryTest.methods
    
    /**
     * @expectedException LogicException
     * @expectedExceptionMessage Create an insert statement on an already persisted entity is not allowed
     */
    public function testCreateInsertStatementOnAlreadyPersistedEntity() 
    {
        $entity = new SomeEntity();
        $entity->setId(1337);
        $entity->setAttributeA('foo');
        $entity->setAttributeB('bar');
        $entity->setAttributeC('baz');
        StatementFactory::createInsertStatement(
            EntityMappingsRegistry::getEntityMapping(
                'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
            ),
            $entity
        );
    }

    /**
     * test create a Select statement with an empty CriteriaSet
     */
    public function testCreateSelectStatementFromAnEmptyCriteriaSet() 
    {
        $expectedStatement = 'SELECT idTable,a,b,c FROM some_entity_data_table';
        $entityMapping = EntityMappingsRegistry::getEntityMapping(
            'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
        );                
        $criteriaSet = new CriteriaSet();
        $select = StatementFactory::createSelectStatementFromCriteriaSet(
            $entityMapping, 
            $criteriaSet
        );
        $this->assertEquals($expectedStatement, $select->toString());
    }
    // End of user code
}
