<?php

namespace TiBeN\Framework\Tests\DataSource\MysqlDataSource;

use TiBeN\Framework\DataSource\MysqlDataSource\UpdateStatement;

// Start of user code UpdateStatement.useStatements
use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\DataSource\MysqlDataSource\SetStatement;
use TiBeN\Framework\DataSource\MysqlDataSource\Expr;
use TiBeN\Framework\DataSource\MysqlDataSource\WhereConditions;

// End of user code

/**
 * Test cases for class UpdateStatement
 * 
 * Start of user code UpdateStatementTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\DataSource\MysqlDataSource
 * @author TiBeN
 */
class UpdateStatementTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code UpdateStatementTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code UpdateStatementTest.setUp
		// Place additional setUp code here.  
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code UpdateStatementTest.tearDown
		// Place additional tearDown code here.  
		// End of user code
    }
    
    

    /**
     * Test method isReadyToBeExecuted from interface Statement
     * Start of user code Statement.testisReadyToBeExecutedAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testIsReadyToBeExecuted()
    {
        // Start of user code Statement.testisReadyToBeExecuted
	    $update = new UpdateStatement();
	    $this->assertFalse($update->isReadyToBeExecuted());
	    
	    $update->setTableName('some_table');
	    $this->assertFalse($update->isReadyToBeExecuted());
	    
	    $update->setSetStatement(
            SetStatement::createFromNativeArray(
                null, 
                array(
                    'id' => 10,
                    'foo' => 'foo'    
                )
            )
        );
	    $this->assertTrue($update->isReadyToBeExecuted());
    	// End of user code
    }
    
    /**
     * Test method toString from interface Statement
     * Start of user code Statement.testtoStringAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testToString()
    {
        // Start of user code Statement.testtoString
	    $update = new UpdateStatement();
	    $this->assertFalse($update->isReadyToBeExecuted());
	    
	    $update->setTableName('some_table');
	    $update->setSetStatement(SetStatement::createFromNativeArray(null, array(
	    	'id' => 10,
	        'foo' => 'foo'    
	    )));    
	    $this->assertEquals(
            'UPDATE some_table SET id=:id,foo=:foo', 
            $update->toString()
        );
	    
	    $update->setWhereDefinition(
            WhereConditions::createFromExpr(
                Expr::fromString(
                    'bar!=:bar', 
                    AssociativeArray::createFromNativeArray(
                        null, 
                        array('bar' => 'someValue')
                    )
                )
            )
	    );
	    $this->assertEquals(
            'UPDATE some_table SET id=:id,foo=:foo WHERE bar!=:bar', 
            $update->toString()
        );
	    
	    $expectedStatementParameters = AssociativeArray::createFromNativeArray(
            null, 
            array(
                'id' => 10,
                'foo' => 'foo',            	                            	            
                'bar' => 'someValue'
	        )
        );
	    
	    $this->assertEquals(
            $expectedStatementParameters, 
            $update->getStatementParameters()
        );
    	// End of user code
    }
    
    /**
     * Test method getStatementParameters from interface Statement
     * Start of user code Statement.testgetStatementParametersAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testGetStatementParameters()
    {
        // Start of user code Statement.testgetStatementParameters
	    // implicitly test by testToString
    	// End of user code
    }

    // Start of user code UpdateStatementTest.methods
	// Place additional tests methods here.  
	// End of user code
}
