<?php

namespace TiBeN\Framework\Tests\Router;

use TiBeN\Framework\Router\Route;

// Start of user code Route.useStatements
use TiBeN\Framework\Datatype\AssociativeArray;

// End of user code

/**
 * Test cases for class Route
 * 
 * Start of user code RouteTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 * @author TiBeN
 */
class RouteTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code RouteTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code RouteTest.setUp
		// Place additional setUp code here.  
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code RouteTest.tearDown
		// Place additional tearDown code here.  
		// End of user code
    }
    
    /**
     * Test method hasVariables from class Route
     *
     * Start of user code RouteTest.testhasVariablesAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testHasVariables()
    {
        // Start of user code RouteTest.testhasVariables
        $route = new Route();
        $this->assertFalse($route->hasVariables());
        $route->setVariables(
            AssociativeArray::createFromNativeArray(
                'string',
                array('foo' => 'bar')
            )
        );
        $this->assertTrue($route->hasVariables());
		// End of user code
    }

    // Start of user code RouteTest.methods
	// Place additional tests methods here.  
	// End of user code
}
