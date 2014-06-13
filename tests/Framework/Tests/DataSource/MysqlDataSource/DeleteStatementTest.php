<?php

namespace TiBeN\Framework\Tests\DataSource\MysqlDataSource;

use TiBeN\Framework\DataSource\MysqlDataSource\DeleteStatement;

// Start of user code DeleteStatement.useStatements
use TiBeN\Framework\DataSource\MysqlDataSource\WhereConditions;
use TiBeN\Framework\DataSource\MysqlDataSource\Expr;
use TiBeN\Framework\Datatype\AssociativeArray;

// End of user code

/**
 * Test cases for class DeleteStatement
 * 
 * Start of user code DeleteStatementTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\DataSource\MysqlDataSource
 * @author TiBeN
 */
class DeleteStatementTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code DeleteStatementTest.attributes
    // Place additional tests attributes here.  
    // End of user code

    public function setUp()
    {
        // Start of user code DeleteStatementTest.setUp
        // Place additional setUp code here.  
        // End of user code
    }

    public function tearDown()
    {
        // Start of user code DeleteStatementTest.tearDown
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
        $deleteStatement = new DeleteStatement();
        $deleteStatement->setTableName('foo'); 
        $deleteStatement->setWhereConditions(
            WhereConditions::createFromExpr(
                Expr::fromString(
                    'bar = :bar',
                    AssociativeArray::createFromNativeArray(
                        null,
                        array('bar' => 1337)
                    )
                )
            )
        );
        $this->assertEquals(
            'DELETE FROM foo WHERE bar = :bar',
            $deleteStatement->toString()
        );

        $expectedParameters = AssociativeArray::createFromNativeArray(
            NULL, 
            array('bar' => 1337)
        );
        $this->assertEquals(
            $expectedParameters, 
            $deleteStatement->getStatementParameters()
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
        // Case covered by testToString
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
        $deleteStatement = new DeleteStatement();
        $this->assertFalse($deleteStatement->isReadyToBeExecuted());
        $deleteStatement->setTableName('some_table');
        $this->assertTrue($deleteStatement->isReadyToBeExecuted());
        // End of user code
    }

    // Start of user code DeleteStatementTest.methods
    // End of user code
}
