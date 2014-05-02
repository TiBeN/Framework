<?php

namespace TiBeN\Framework\Tests\Entity;

use TiBeN\Framework\Entity\OrderCriteria;

// Start of user code OrderCriteria.useStatements
// Place your use statements here.
// End of user code

/**
 * Test cases for class OrderCriteria
 * 
 * Start of user code OrderCriteriaTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @author TiBeN
 */
class OrderCriteriaTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code OrderCriteriaTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code OrderCriteriaTest.setUp
		// Place additional setUp code here.  
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code OrderCriteriaTest.tearDown
		// Place additional tearDown code here.  
		// End of user code
    }
    
    /**
     * Test static method asc from class OrderCriteria
     *
     * Start of user code OrderCriteriaTest.testascAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testAsc()
    {
        // Start of user code OrderCriteriaTest.testasc
		$expectedOrderCriteria = new OrderCriteria();
		$expectedOrderCriteria->setAttribute('foo');
		$expectedOrderCriteria->setDirection(OrderCriteria::DIRECTION_ASC);
		$this->assertEquals(
			$expectedOrderCriteria, 
			OrderCriteria::asc('foo')
		);
		// End of user code
    }
    
    /**
     * Test static method desc from class OrderCriteria
     *
     * Start of user code OrderCriteriaTest.testdescAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testDesc()
    {
        // Start of user code OrderCriteriaTest.testdesc
		$expectedOrderCriteria = new OrderCriteria();
		$expectedOrderCriteria->setAttribute('foo');
		$expectedOrderCriteria->setDirection(OrderCriteria::DIRECTION_DESC);
		$this->assertEquals(
			$expectedOrderCriteria, 
			OrderCriteria::desc('foo')
		);		
		// End of user code
    }

    // Start of user code OrderCriteriaTest.methods
	// Place additional tests methods here.  
	// End of user code
}
