<?php

namespace TiBeN\Framework\Tests\DataSource\MysqlDataSource;

use TiBeN\Framework\DataSource\MysqlDataSource\SelectStatement;

// Start of user code SelectStatement.useStatements
use TiBeN\Framework\DataSource\MysqlDataSource\WhereConditions;
use TiBeN\Framework\DataSource\MysqlDataSource\Expr;
use TiBeN\Framework\DataSource\MysqlDataSource\OrderByStatement;
use TiBeN\Framework\DataSource\MysqlDataSource\LimitStatement;
use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\DataSource\MysqlDataSource\SelectExpr;

// End of user code

/**
 * Test cases for class SelectStatement
 * 
 * Start of user code SelectStatementTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @author TiBeN
 */
class SelectStatementTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code SelectStatementTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code SelectStatementTest.setUp
		// Place additional setUp code here.  
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code SelectStatementTest.tearDown
		// Place additional tearDown code here.  
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
	    $selectStatement = new SelectStatement();
	    $selectStatement->setSelectExpr(
            SelectExpr::createFromNativeArray('string', array('foo'))
        );
	    $selectStatement->setTableReferences('some_table');	    
	    $this->assertEquals(
            'SELECT foo FROM some_table', 
            $selectStatement->toString()
        );
	    
	    $selectStatement->setWhereConditions(
            WhereConditions::createFromExpr(
                Expr::fromString(
                    'bar > :bar', 
                    AssociativeArray::createFromNativeArray(
                        null , 
                        array('bar' => 1337)
                    )
	            )
            )
        );
	    $this->assertEquals(
            'SELECT foo FROM some_table WHERE bar > :bar', 
            $selectStatement->toString()
        );
	    
	    $selectStatement->setOrderByStatement(
            OrderByStatement::createFromNativeArray(
                'string', 
                array('foo' => OrderByStatement::DIRECTION_ASC)
            )
        );
	    $this->assertEquals(
            'SELECT foo FROM some_table WHERE bar > :bar ORDER BY foo ASC', 
            $selectStatement->toString()
        );
	    
	    $limitStatement = new LimitStatement();
	    $limitStatement->setRowCount(10);	    
	    $selectStatement->setLimitStatement($limitStatement);
	    $this->assertEquals(
            'SELECT foo FROM some_table WHERE bar > :bar ORDER BY foo ASC LIMIT 10', 
            $selectStatement->toString()
        );
	    
	    $expectedParameters = AssociativeArray::createFromNativeArray(
            NULL, 
            array('bar' => 1337)
        );
	    $this->assertEquals(
            $expectedParameters, 
            $selectStatement->getStatementParameters()
        );
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
	    $selectStatement = new SelectStatement();	    
	    $this->assertFalse($selectStatement->isReadyToBeExecuted());
	    $selectStatement->setSelectExpr(
            SelectExpr::createFromNativeArray('string', array('foo'))
        );	    
	    $this->assertFalse($selectStatement->isReadyToBeExecuted());
	    
	    $selectStatement->setTableReferences('some_table');
	    $this->assertTrue($selectStatement->isReadyToBeExecuted());
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
        // Case covered by testToString
    	// End of user code
    }

    // Start of user code SelectStatementTest.methods
	// Place additional tests methods here.  
	// End of user code
}
