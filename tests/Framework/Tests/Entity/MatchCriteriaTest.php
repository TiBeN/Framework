<?php

namespace TiBeN\Framework\Tests\Entity;

use TiBeN\Framework\Entity\MatchCriteria;

// Start of user code MatchCriteria.useStatements
// Place your use statements here.
// End of user code

/**
 * Test cases for class MatchCriteria
 * 
 * Start of user code MatchCriteriaTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\Entity
 * @author TiBeN
 */
class MatchCriteriaTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code MatchCriteriaTest.attributes
    // Place additional tests attributes here.  
    // End of user code

    public function setUp()
    {
        // Start of user code MatchCriteriaTest.setUp
        // Place additional setUp code here.  
        // End of user code
    }

    public function tearDown()
    {
        // Start of user code MatchCriteriaTest.tearDown
        // Place additional tearDown code here.  
        // End of user code
    }
    
    /**
     * Test static method greaterThan from class MatchCriteria
     *
     * Start of user code MatchCriteriaTest.testgreaterThanAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testGreaterThan()
    {
        // Start of user code MatchCriteriaTest.testgreaterThan
        $expectedMatchCriteria = new MatchCriteria();
        $expectedMatchCriteria->setAttribute('foo');
        $expectedMatchCriteria->setValue(1337);
        $expectedMatchCriteria->setOperator(MatchCriteria::OPERATOR_GREATER_THAN);
        $this->assertEquals(
            $expectedMatchCriteria,
            MatchCriteria::greaterThan('foo', 1337)
        );
        // End of user code
    }
    
    /**
     * Test static method lessThan from class MatchCriteria
     *
     * Start of user code MatchCriteriaTest.testlessThanAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testLessThan()
    {
        // Start of user code MatchCriteriaTest.testlessThan
        $expectedMatchCriteria = new MatchCriteria();
        $expectedMatchCriteria->setAttribute('foo');
        $expectedMatchCriteria->setValue(1337);
        $expectedMatchCriteria->setOperator(MatchCriteria::OPERATOR_LESS_THAN);
        $this->assertEquals(
            $expectedMatchCriteria,
            MatchCriteria::lessThan('foo', 1337)
        );
        // End of user code
    }
    
    /**
     * Test static method equals from class MatchCriteria
     *
     * Start of user code MatchCriteriaTest.testequalsAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testEquals()
    {
        // Start of user code MatchCriteriaTest.testequals
        $expectedMatchCriteria = new MatchCriteria();
        $expectedMatchCriteria->setAttribute('foo');
        $expectedMatchCriteria->setValue('bar');
        $expectedMatchCriteria->setOperator(MatchCriteria::OPERATOR_EQUALS);
        $this->assertEquals(
            $expectedMatchCriteria,
            MatchCriteria::equals('foo', 'bar')
        );
        // End of user code
    }
    
    /**
     * Test static method lessThanOrEquals from class MatchCriteria
     *
     * Start of user code MatchCriteriaTest.testlessThanOrEqualsAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testLessThanOrEquals()
    {
        // Start of user code MatchCriteriaTest.testlessThanOrEquals
        $expectedMatchCriteria = new MatchCriteria();
        $expectedMatchCriteria->setAttribute('foo');
        $expectedMatchCriteria->setValue(1337);
        $expectedMatchCriteria->setOperator(MatchCriteria::OPERATOR_LESS_THAN_OR_EQUALS);
        $this->assertEquals(
            $expectedMatchCriteria,
            MatchCriteria::lessThanOrEquals('foo', 1337)
        );      
        // End of user code
    }
    
    /**
     * Test static method notLike from class MatchCriteria
     *
     * Start of user code MatchCriteriaTest.testnotLikeAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testNotLike()
    {
        // Start of user code MatchCriteriaTest.testnotLike
        $expectedMatchCriteria = new MatchCriteria();
        $expectedMatchCriteria->setAttribute('foo');
        $expectedMatchCriteria->setValue('%bar%');
        $expectedMatchCriteria->setOperator(MatchCriteria::OPERATOR_NOT_LIKE);
        $this->assertEquals(
            $expectedMatchCriteria,
            MatchCriteria::notLike('foo', '%bar%')      
        );
        // End of user code
    }
    
    /**
     * Test static method greaterThanOrEquals from class MatchCriteria
     *
     * Start of user code MatchCriteriaTest.testgreaterThanOrEqualsAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testGreaterThanOrEquals()
    {
        // Start of user code MatchCriteriaTest.testgreaterThanOrEquals
        $expectedMatchCriteria = new MatchCriteria();
        $expectedMatchCriteria->setAttribute('foo');
        $expectedMatchCriteria->setValue(1337);
        $expectedMatchCriteria->setOperator(MatchCriteria::OPERATOR_GREATER_THAN_OR_EQUALS);
        $this->assertEquals(
            $expectedMatchCriteria,
            MatchCriteria::greaterThanOrEquals('foo', 1337)
        );
        // End of user code
    }
    
    /**
     * Test static method notEquals from class MatchCriteria
     *
     * Start of user code MatchCriteriaTest.testnotEqualsAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testNotEquals()
    {
        // Start of user code MatchCriteriaTest.testnotEquals
        $expectedMatchCriteria = new MatchCriteria();
        $expectedMatchCriteria->setAttribute('foo');
        $expectedMatchCriteria->setValue('bar');
        $expectedMatchCriteria->setOperator(MatchCriteria::OPERATOR_NOT_EQUALS);
        $this->assertEquals(
            $expectedMatchCriteria,
            MatchCriteria::notEquals('foo', 'bar')
        );      
        // End of user code
    }
    
    /**
     * Test static method like from class MatchCriteria
     *
     * Start of user code MatchCriteriaTest.testlikeAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testLike()
    {
        // Start of user code MatchCriteriaTest.testlike
        $expectedMatchCriteria = new MatchCriteria();
        $expectedMatchCriteria->setAttribute('foo');
        $expectedMatchCriteria->setValue('%bar%');
        $expectedMatchCriteria->setOperator(MatchCriteria::OPERATOR_LIKE);
        $this->assertEquals(
            $expectedMatchCriteria,
            MatchCriteria::like('foo', '%bar%')
        );
        // End of user code
    }

    // Start of user code MatchCriteriaTest.methods
    // Place additional tests methods here.  
    // End of user code
}
