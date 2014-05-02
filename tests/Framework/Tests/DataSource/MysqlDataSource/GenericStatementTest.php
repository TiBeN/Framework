<?php

namespace TiBeN\Framework\Tests\DataSource\MysqlDataSource;

use TiBeN\Framework\DataSource\MysqlDataSource\GenericStatement;

// Start of user code GenericStatement.useStatements
// Place your use statements here.
// End of user code

/**
 * Test cases for class GenericStatement
 * 
 * Start of user code GenericStatementTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @author TiBeN
 */
class GenericStatementTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code GenericStatementTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code GenericStatementTest.setUp
		// Place additional setUp code here.  
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code GenericStatementTest.tearDown
		// Place additional tearDown code here.  
		// End of user code
    }
    
    /**
     * Test method setStatementParameters from class GenericStatement
     *
     * Start of user code GenericStatementTest.testsetStatementParametersAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testSetStatementParameters()
    {
        // Start of user code GenericStatementTest.testsetStatementParameters
        // Simple setter, nothing to test here
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
        $genericStatement = new GenericStatement();
		$statementString = 'SELECT * FROM `some_test_table`';
		$genericStatement->setStatementString($statementString);
		$this->assertEquals($statementString, $genericStatement->toString());
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
        $statement = new GenericStatement();
		$this->assertFalse($statement->isReadyToBeExecuted());
		$statement->setStatementString('SELECT * FROM `some_table`');
		$this->assertTrue($statement->isReadyToBeExecuted());
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
        // Simple getter, nothing to test here
    	// End of user code
    }

    // Start of user code GenericStatementTest.methods
    
	/**
	 * Test statement->getStatementParameters return an empty AssociativeArray when called 
	 * on a GenericStatement instance that don't have any statement parameters.
	 */
	public function testEmptyStatementParametersAssociativeArray()
	{ 
		$statement = new GenericStatement();
		$statementParameters = $statement->getStatementParameters();
		$this->assertInstanceOf(
            'TiBeN\\Framework\\Datatype\\AssociativeArray', 
            $statementParameters
        );
		$this->assertTrue($statementParameters->isEmpty());
	}
	// End of user code
}
