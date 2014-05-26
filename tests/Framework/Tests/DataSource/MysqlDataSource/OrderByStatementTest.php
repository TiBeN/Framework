<?php

namespace TiBeN\Framework\Tests\DataSource\MysqlDataSource;

use TiBeN\Framework\DataSource\MysqlDataSource\OrderByStatement;

// Start of user code OrderByStatement.useStatements
use TiBeN\Framework\Datatype\GenericCollection;
use TiBeN\Framework\Entity\OrderCriteria;
use TiBeN\Framework\Entity\EntityMappingsRegistry;
use TiBeN\Framework\Tests\Fixtures\DataSource\MysqlDataSource\MysqlDataSourceTestSetupTearDown;

// End of user code

/**
 * Test cases for class OrderByStatement
 * 
 * Start of user code OrderByStatementTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\DataSource\MysqlDataSource
 * @author TiBeN
 */
class OrderByStatementTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code OrderByStatementTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code OrderByStatementTest.setUp
        MysqlDataSourceTestSetupTearDown::declareSomeEntityMapping(); 
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code OrderByStatementTest.tearDown
		// Place additional tearDown code here.  
		// End of user code
    }
    
    /**
     * Test method toString from class OrderByStatement
     *
     * Start of user code OrderByStatementTest.testtoStringAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testToString()
    {
        // Start of user code OrderByStatementTest.testtoString
	    // Implicitly tested
		// End of user code
    }
    
    /**
     * Test static method createFromOrderCriterias from class OrderByStatement
     *
     * Start of user code OrderByStatementTest.testcreateFromOrderCriteriasAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testCreateFromOrderCriterias()
    {
        // Start of user code OrderByStatementTest.testcreateFromOrderCriterias
        $expectedOrderByStatementString = "ORDER BY idTable ASC, a DESC";
        
        $orderCriterias = GenericCollection::createFromNativeArray(
            'TiBeN\\Framework\\Entity\\OrderCriteria', 
            array(
                OrderCriteria::asc('id'),
                OrderCriteria::desc('attributeA'),
            )
        );
        
        $entityMapping = EntityMappingsRegistry::getEntityMapping(
            'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
        );
        $orderByStatement = OrderByStatement::createFromOrderCriterias(
            $entityMapping, 
            $orderCriterias
        );
        
        $this->assertEquals(
            $expectedOrderByStatementString, 
            $orderByStatement->toString()
        );
		// End of user code
    }

    // Start of user code OrderByStatementTest.methods
	// Place additional tests methods here.  
	// End of user code
}
