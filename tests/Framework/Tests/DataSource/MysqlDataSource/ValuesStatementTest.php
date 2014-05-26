<?php

namespace TiBeN\Framework\Tests\DataSource\MysqlDataSource;

use TiBeN\Framework\DataSource\MysqlDataSource\ValuesStatement;

// Start of user code ValuesStatement.useStatements
use TiBeN\Framework\Tests\Fixtures\DataSource\MysqlDataSource\MysqlDataSourceTestSetupTearDown;
use TiBeN\Framework\Tests\Fixtures\Entity\SomeEntity;
use TiBeN\Framework\Entity\EntityMappingsRegistry;

// End of user code

/**
 * Test cases for class ValuesStatement
 * 
 * Start of user code ValuesStatementTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\DataSource\MysqlDataSource
 * @author TiBeN
 */
class ValuesStatementTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code ValuesStatementTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code ValuesStatementTest.setUp
        MysqlDataSourceTestSetupTearDown::declareBuiltInTypeConverters();
		MysqlDataSourceTestSetupTearDown::declareSomeEntityMapping();
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code ValuesStatementTest.tearDown
		// Place additional tearDown code here.  
		// End of user code
    }
    
    /**
     * Test method toString from class ValuesStatement
     *
     * Start of user code ValuesStatementTest.testtoStringAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testToString()
    {
        // Start of user code ValuesStatementTest.testtoString
        $valuesStatement = new ValuesStatement();
        $valuesStatement->set('a', 'someValueForA');
        $valuesStatement->set('b', 'someValueForB');
        $valuesStatement->set('c', 'someValueForC');
        $this->assertEquals('VALUES(:a,:b,:c)', $valuesStatement->toString());
		// End of user code
    }
    
    /**
     * Test static method createFromEntity from class ValuesStatement
     *
     * Start of user code ValuesStatementTest.testcreateFromEntityAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testCreateFromEntity()
    {
        // Start of user code ValuesStatementTest.testcreateFromEntity
	    $entity = new SomeEntity();
	    
	    $entity->setAttributeA('foo');
	    $entity->setAttributeB('bar');
	    $entity->setAttributeC('baz');	    
	    $entityMapping = EntityMappingsRegistry::getEntityMapping(
            'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
        );
	    $valuesStatement = ValuesStatement::createFromEntity($entityMapping, $entity);
	    $this->assertEquals('VALUES(:idTable,:a,:b,:c)', $valuesStatement->toString());
		// End of user code
    }

    // Start of user code ValuesStatementTest.methods

	/**
	 * Test To String on empty ValuesStatement
     *
	 * @expectedException LogicException
	 * @expectedExceptionMessage The ValuesStatement is empty
	 */
	public function testToStringToEmptyValuesStatement() {
	    $valuesStatement = new ValuesStatement();
	    $valuesStatement->toString();
	}
	// End of user code
}
