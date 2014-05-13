<?php

namespace TiBeN\Framework\Tests\Entity;

use TiBeN\Framework\Entity\LimitCriteria;

// Start of user code LimitCriteria.useStatements
// Place your use statements here.
// End of user code

/**
 * Test cases for class LimitCriteria
 * 
 * Start of user code LimitCriteriaTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\Entity
 * @author TiBeN
 */
class LimitCriteriaTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code LimitCriteriaTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code LimitCriteriaTest.setUp
		// Place additional setUp code here.  
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code LimitCriteriaTest.tearDown
		// Place additional tearDown code here.  
		// End of user code
    }
    
    /**
     * Test static method to from class LimitCriteria
     *
     * Start of user code LimitCriteriaTest.testtoAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testTo()
    {
        // Start of user code LimitCriteriaTest.testto
	    $expectedLimitCriteria = new LimitCriteria();
	    $expectedLimitCriteria->setNumber(5);
	    $this->assertEquals(
	    		$expectedLimitCriteria, 
	    		LimitCriteria::to(5)
		);
	    
	    $expectedLimitCriteria = new LimitCriteria();
	    $expectedLimitCriteria->setNumber(5);
	    $expectedLimitCriteria->setOffset(1337);
	    $this->assertEquals(
	    		$expectedLimitCriteria,
	    		LimitCriteria::to(5, 1337)
	    );	    
		// End of user code
    }

    // Start of user code LimitCriteriaTest.methods
	// Place additional tests methods here.  
	// End of user code
}
