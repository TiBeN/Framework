<?php

namespace TiBeN\Framework\Tests\DataSource\MysqlDataSource;

use TiBeN\Framework\DataSource\MysqlDataSource\LimitStatement;

// Start of user code LimitStatement.useStatements
use TiBeN\Framework\Entity\LimitCriteria;

// End of user code

/**
 * Test cases for class LimitStatement
 * 
 * Start of user code LimitStatementTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\DataSource\MysqlDataSource
 * @author TiBeN
 */
class LimitStatementTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code LimitStatementTest.attributes
    // Place additional tests attributes here.  
    // End of user code

    public function setUp()
    {
        // Start of user code LimitStatementTest.setUp
        // Place additional setUp code here.  
        // End of user code
    }

    public function tearDown()
    {
        // Start of user code LimitStatementTest.tearDown
        // Place additional tearDown code here.  
        // End of user code
    }
    
    /**
     * Test static method createFromLimitCriteria from class LimitStatement
     *
     * Start of user code LimitStatementTest.testcreateFromLimitCriteriaAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testCreateFromLimitCriteria()
    {
        // Start of user code LimitStatementTest.testcreateFromLimitCriteria
        $this->assertEquals(
            'LIMIT 10', 
            LimitStatement::createFromLimitCriteria(
                LimitCriteria::to(10)
            )
            ->toString()
        );
        $this->assertEquals(
            'LIMIT 5,10', 
            LimitStatement::createFromLimitCriteria(
                LimitCriteria::to(10,5)
            )
            ->toString()
        );
        // End of user code
    }
    
    /**
     * Test method toString from class LimitStatement
     *
     * Start of user code LimitStatementTest.testtoStringAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testToString()
    {
        // Start of user code LimitStatementTest.testtoString
        // Implicitly tested by testCreateFromLimitCriteria
        // End of user code
    }

    // Start of user code LimitStatementTest.methods
    // Place additional tests methods here.  
    // End of user code
}
