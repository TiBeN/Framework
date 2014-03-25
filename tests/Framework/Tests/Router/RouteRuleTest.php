<?php

namespace TiBeN\Framework\Tests\Router;

use TiBeN\Framework\Router\RouteRule;

// Start of user code RouteRuleTest.useStatements
use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\Router\Route;

// End of user code

/**
 * Test cases for class RouteRule
 * 
 * Start of user code RouteRuleTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 * @author TiBeN
 */
class RouteRuleTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code RouteRuleTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code RouteRuleTest.setUp
		// Place additional setUp code here.  
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code RouteRuleTest.tearDown
		// Place additional tearDown code here.  
		// End of user code
    }
    
    /**
     * Test static method create from class RouteRule
     *
     * Start of user code RouteRuleTest.testcreateAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testCreate()
    {
        // Start of user code RouteRuleTest.testcreate
	    $expectedRouteRule = new RouteRule();
		$expectedRouteRule->setName('my-route-rule-with-variables-test');
		$expectedRouteRule->setUriPattern('/test/{foo}/{bar}.html');
		$expectedRouteRule->setController('myController');
		$expectedRouteRule->setAction('myAction');
		$expectedRouteRule->setMethod('get');
		$expectedRouteRule->setHost('http://www.my-host-for-tests.com');
		$expectedRouteRule->setRequirments(
            AssociativeArray::createFromNativeArray(null, array(
                'foo' => '[a-z]+',
                'bar' => '[0-9]+'
            ))
        );
		$expectedRouteRule->setDefaultVariables(
            AssociativeArray::createFromNativeArray(null, array(
                'default-foo' => 'defaultFooContent',
                'default-bar' => 'defaultBarContent'
            ))
        );
		
		$this->assertEquals(
            $expectedRouteRule, 
            RouteRule::create(AssociativeArray::createFromNativeArray(null, array(
                'name' => 'my-route-rule-with-variables-test',
                'uri-pattern' => '/test/{foo}/{bar}.html',
                'controller' => 'myController',
                'action' => 'myAction',
                'method' => 'get',
                'host' => 'http://www.my-host-for-tests.com',
                'requirments' => array(
                    'foo' => '[a-z]+',
                    'bar' => '[0-9]+'					
                ),
                'default-variables' => array(
                    'default-foo' => 'defaultFooContent',
                    'default-bar' => 'defaultBarContent'					
                )
            )))
        );
		// End of user code
    }
    
    /**
     * Test method getRoute from class RouteRule
     *
     * Start of user code RouteRuleTest.testgetRouteAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testGetRoute()
    {
        // Start of user code RouteRuleTest.testgetRoute
	    $routeRule = new RouteRule();
		$routeRule->setName('my-route-rule-with-variables-test');
		$routeRule->setUriPattern('/test/{foo}/{bar}.html');
		$routeRule->setController('myController');
		$routeRule->setAction('myAction');
						
		$expectedRoute = new Route();
		$expectedRoute->setController('myController');
		$expectedRoute->setAction('myAction');
		$expectedRoute->setVariables(AssociativeArray::createFromNativeArray(
		    'string',
		    array(
    			'foo' => 'foo-content',
    			'bar' => 'bar-content'
    		)
		));
		
		$this->assertEquals(
            $expectedRoute, 
            $routeRule->getRoute(AssociativeArray::createFromNativeArray(
                'string',
                array(
                    'foo' => 'foo-content',
                    'bar' => 'bar-content'					
                )
            ))
        );
		// End of user code
    }
    
    /**
     * Test method matchHttpRequest from class RouteRule
     *
     * Start of user code RouteRuleTest.testmatchHttpRequestAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testMatchHttpRequest()
    {
        // Start of user code RouteRuleTest.testmatchHttpRequest
	    // No tests here because this method is covered by 
        // custom tests cases that follow 
		// End of user code
    }

    // Start of user code RouteRuleTest.methods
	// Place additional tests methods here.  
	// End of user code
}
