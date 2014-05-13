<?php

namespace TiBeN\Framework\Tests\Renderer;

use TiBeN\Framework\Renderer\SmartyUriHandler;

// Start of user code SmartyUriHandler.useStatements
use TiBeN\Framework\Router\RouteRule;
use TiBeN\Framework\Router\Router;

// End of user code

/**
 * Test cases for class SmartyUriHandler
 * 
 * Start of user code SmartyUriHandlerTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\Renderer
 * @author TiBeN
 */
class SmartyUriHandlerTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code SmartyUriHandlerTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code SmartyUriHandlerTest.setUp
		// Place additional setUp code here.  
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code SmartyUriHandlerTest.tearDown
		// Place additional tearDown code here.  
		// End of user code
    }
    
    /**
     * Test method getUri from class SmartyUriHandler
     *
     * Start of user code SmartyUriHandlerTest.testgetUriAnnotations 
	 * @runInSeparateProcess 
	 * End of user code
     */
    public function testGetUri()
    {
        // Start of user code SmartyUriHandlerTest.testgetUri
	    $routeRule = new RouteRule();
		$routeRule->setName('my-route-rule-with-variables-test');
		$routeRule->setUriPattern('/test/{foo}/{bar}.html');
		$routeRule->setController('MyProject\\Controller\\MyController');
		$routeRule->setAction('myAction');
		
		Router::addRouteRule($routeRule);
		
		$smartyUriHandler = new SmartyUriHandler();
		
		$smartyInternalTemplateMock = $this->getMock(
            'Smarty_Internal_Template', 
            array(), 
            array(), 
            '', 
            false
        );
		
		$this->assertEquals(
			'/test/foo-content/bar-content.html',
			$smartyUriHandler->getUri(
				array(
					'name' => 'my-route-rule-with-variables-test',
					'foo' => 'foo-content',
					'bar' => 'bar-content'	
				), 
				$smartyInternalTemplateMock
			)
		);
		// End of user code
    }

    // Start of user code SmartyUriHandlerTest.methods

	/**
	 * Case : Exception when no route rule name are set
     *
     * @runInSeparateProcess
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage No route rule name set
	 */
	public function testExceptionWhenNoRouteRuleByNameAreSet() {
			
		$smartyUriHandler = new SmartyUriHandler();				
		$smartyInternalTemplateMock = $this->getMock(
            'Smarty_Internal_Template', 
            array(), 
            array(), 
            '', 
            false
        );
		$smartyUriHandler->getUri(
			array('foo' => 'foo-content'),
			$smartyInternalTemplateMock
		);						
			
	}
	// End of user code
}
