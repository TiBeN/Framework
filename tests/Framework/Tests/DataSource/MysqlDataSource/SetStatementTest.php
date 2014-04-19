<?php

namespace TiBeN\Framework\Tests\DataSource\MysqlDataSource;

use TiBeN\Framework\DataSource\MysqlDataSource\SetStatement;

// Start of user code SetStatement.useStatements
use TiBeN\Framework\Entity\EntityMappingsRegistry;
use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\Tests\Fixtures\DataSource\MysqlDataSource\MysqlDataSourceTestSetupTearDown;
use TiBeN\Framework\Tests\Fixtures\Entity\SomeEntity;

// End of user code

/**
 * Test cases for class SetStatement
 * 
 * Start of user code SetStatementTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @author TiBeN
 */
class SetStatementTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code SetStatementTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code SetStatementTest.setUp
		MysqlDataSourceTestSetupTearDown::declareSomeEntityMapping();
        MysqlDataSourceTestSetupTearDown::declareBuiltInTypeConverters();
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code SetStatementTest.tearDown
		// Place additional tearDown code here.  
		// End of user code
    }
    
    /**
     * Test method toString from class SetStatement
     *
     * Start of user code SetStatementTest.testtoStringAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testToString()
    {
        // Start of user code SetStatementTest.testtoString
	    // Implicitly tested by testCreateKeyValueListFromEntity
		// End of user code
    }
    
    /**
     * Test method getStatementParameters from class SetStatement
     *
     * Start of user code SetStatementTest.testgetStatementParametersAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testGetStatementParameters()
    {
        // Start of user code SetStatementTest.testgetStatementParameters
	    // Implicitly tested by testCreateKeyValueListFromEntity
		// End of user code
    }
    
    /**
     * Test static method createKeyValueListFromEntity from class SetStatement
     *
     * Start of user code SetStatementTest.testcreateKeyValueListFromEntityAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testCreateKeyValueListFromEntity()
    {
        // Start of user code SetStatementTest.testcreateKeyValueListFromEntity
        $entity = new SomeEntity();    
        $entity->setId(10);
        $entity->setAttributeA('someValue');
        $entity->setAttributeC('someValue');
        $entityMapping = EntityMappingsRegistry::getEntityMapping(
            'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
        );        
        $setStatement = SetStatement::createKeyValueListFromEntity($entityMapping, $entity);
        $expectedStatement = 'SET idTable=:idTable,a=:a,b=:b,c=:c';
        $this->assertEquals($expectedStatement, $setStatement->toString());

        $expectedStatementParameters = AssociativeArray::createFromNativeArray(null, array(
        	'idTable' => '10',
            'a' => 'someValue',
            'b' => null,
            'c' => 'someValue'
        ));
        
        $this->assertEquals(
            $expectedStatementParameters, 
            $setStatement->getStatementParameters()
        );
		// End of user code
    }

    // Start of user code SetStatementTest.methods
	// Place additional tests methods here.  
	// End of user code
}
