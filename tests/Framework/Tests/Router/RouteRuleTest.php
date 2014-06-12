<?php

namespace TiBeN\Framework\Tests\Router;

use TiBeN\Framework\Router\RouteRule;

// Start of user code RouteRule.useStatements
use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\Router\Route;
use TiBeN\Framework\Router\HttpRequest;

// End of user code

/**
 * Test cases for class RouteRule
 * 
 * Start of user code RouteRuleTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\Router
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

    // Start of user code RouteRuleTest.methods
    
    /**
     * Case 1 : RouteRule without variables 
     */     
    public function testRouteRuleWithoutVariables() 
    {
        $routeRule = new RouteRule();
        $routeRule->setName('my-route-rule-without-variables-test');
        $routeRule->setUriPattern('/access-to-my-test-uri.html');
        $routeRule->setController('myController');
        $routeRule->setAction('myAction');
            
        /* Case 1.1 : Request with uri that match uri pattern */
        
        $expectedRoute = new Route();
        $expectedRoute->setController('myController');
        $expectedRoute->setAction('myAction');
        $httpRequest = new HttpRequest();
        $httpRequest->setRequestUri('/access-to-my-test-uri.html');
        $this->assertEquals(
            $expectedRoute, 
            $routeRule->matchHttpRequest($httpRequest), 
            'Case 1.1'
        );
        
        /* Case 1.2 : Request with uri that don't match uri pattern */
        $httpRequest = new HttpRequest();
        $httpRequest->setRequestUri('/access-to-my-test-wrong-uri.html');
        $this->assertEquals(false, $routeRule->matchHttpRequest($httpRequest), 'Case 1.2');
    }
    
    /**
     * Case 2 : RouteRule with variables
     */
    public function testRouteRuleWithVariables() 
    {
        $routeRule = new RouteRule();
        $routeRule->setName('my-route-rule-with-variables-test');
        $routeRule->setUriPattern('/test/{foo}/{bar}.html');
        $routeRule->setController('myController');
        $routeRule->setAction('myAction');
        
        /* Case 2.1 : Request with uri that match uri pattern */
        $expectedRoute = new Route();
        $expectedRoute->setController('myController');
        $expectedRoute->setAction('myAction');
        $expectedRoute->setVariables(
            AssociativeArray::createFromNativeArray(
                'string', 
                array('foo' => 'foo-content', 'bar' => 'bar-content')
            )
        );
        $httpRequest = new HttpRequest();
        $httpRequest->setRequestUri('/test/foo-content/bar-content.html');
        $this->assertEquals(
            $expectedRoute, 
            $routeRule->matchHttpRequest($httpRequest), 
            'Case 2.1'
        );
            
        /* Case 2.2 : Request with uri that match uri pattern */
        $httpRequest = new HttpRequest();
        $httpRequest->setRequestUri('/access-to-my-test-uri.html');
        $this->assertEquals(
            false, 
            $routeRule->matchHttpRequest($httpRequest), 
            'Case 2.2'
        );
                        
        
    }
    
    /**
     * Case 3 : RouteRule with variables and requirments
     */
    public function testRouteRuleWithVariablesAndRequirments() 
    {
        $routeRule = new RouteRule();
        $routeRule->setName('my-route-rule-with-variables-test');
        $routeRule->setUriPattern('/test/{foo}/{bar}.html');
        $routeRule->setController('myController');
        $routeRule->setAction('myAction');
        $routeRule->setRequirments(AssociativeArray::createFromNativeArray(
            'string',
            array(
                'foo' => '[a-z]+',  // foo must be a alpha only
                'bar' => '[0-9]+'  // bar must be a numeric only
            )));

        /* Case 3.1 : Request with uri that match uri pattern and requirments */
        $expectedRoute = new Route();
        $expectedRoute->setController('myController');
        $expectedRoute->setAction('myAction');
        $expectedRoute->setVariables(
            AssociativeArray::createFromNativeArray(
                'string', 
                array('foo' => 'alphaonly', 'bar' => '1234')
            )
        );
        $httpRequest = new HttpRequest();
        $httpRequest->setRequestUri('/test/alphaonly/1234.html');
        $this->assertEquals(
            $expectedRoute, 
            $routeRule->matchHttpRequest($httpRequest), 
            'Case 3.1'
        );
        
        /* Case 3.2 : Request with uri that don't match uri pattern and requirments */
        $httpRequest = new HttpRequest();
        $httpRequest->setRequestUri('/test/not-alphaonly/1234-and-five.html');
        $this->assertEquals(
            false, 
            $routeRule->matchHttpRequest($httpRequest), 
            'Case 3.2'
        );
    }
    
    /**
     * Case 4 : RouteRule with specific request method required
     */
    public function testRouteRuleWithSpecificMethodRequired() 
    {
        $routeRule = new RouteRule();
        $routeRule->setName('my-route-rule-with-specific-method');
        $routeRule->setUriPattern('/access-to-my-test-uri.html');
        $routeRule->setMethod('post');
        $routeRule->setController('myController');
        $routeRule->setAction('myAction');
        
        // Case 4.1 : Request with uri and method that match uri pattern and required method
        $expectedRoute = new Route();
        $expectedRoute->setController('myController');
        $expectedRoute->setAction('myAction');
        $httpRequest = new HttpRequest();
        $httpRequest->setRequestUri('/access-to-my-test-uri.html');
        $httpRequest->setMethod('post');
        $this->assertEquals(
            $expectedRoute, 
            $routeRule->matchHttpRequest($httpRequest), 
            'Case 4.1'
        );
            
        // Case 4.2 : Request with uri that match uri pattern and method 
        // that dont match required method
        $httpRequest = new HttpRequest();
        $httpRequest->setRequestUri('/access-to-my-test-uri.html');
        $httpRequest->setMethod('get');
        $this->assertEquals(false, $routeRule->matchHttpRequest($httpRequest), 'Case 4.2');
    }
    
    /**
     * Case 5 : RouteRule with specific host required
     */
    public function testRouteRuleWithSpecificHostRequired() 
    {
        $routeRule = new RouteRule();
        $routeRule->setName('my-route-rule-with-specific-domain');
        $routeRule->setUriPattern('/access-to-my-test-uri.html');
        $routeRule->setHost('http://www.my-host-for-tests.com');
        $routeRule->setController('myController');
        $routeRule->setAction('myAction');
        
        // Case 5.1 : Request with uri and host that match uri pattern and required domain 
        $expectedRoute = new Route();
        $expectedRoute->setController('myController');
        $expectedRoute->setAction('myAction');
        $httpRequest = new HttpRequest();
        $httpRequest->setRequestUri('/access-to-my-test-uri.html');
        $httpRequest->setHost('http://www.my-host-for-tests.com');
        $this->assertEquals(
            $expectedRoute, 
            $routeRule->matchHttpRequest($httpRequest), 
            'Case 5.1'
        );
            
        // Case 5.2 : Request with uri that match uri pattern 
        // and host that dont match required domain
        $httpRequest = new HttpRequest();
        $httpRequest->setRequestUri('/access-to-my-test-uri.html');
        $httpRequest->setHost('http://another-domain.org');
        $this->assertEquals(false, $routeRule->matchHttpRequest($httpRequest), 'Case 5.2');
    }       
    
    /**
     * Case 6 : RouteRule with default variables
     */
    public function testRouteRuleWithDefaultVariables() 
    {
        // Case 6.1 : RouteRule without variables
        $routeRule = new RouteRule();
        $routeRule->setName('my-route-rule-with-specific-domain');
        $routeRule->setUriPattern('/access-to-my-test-uri.html');           
        $routeRule->setController('myController');
        $routeRule->setAction('myAction');
        $routeRule->setDefaultVariables(AssociativeArray::createFromNativeArray(
            'string',    
            array(
                'defaultfoo' => 'default-foo-content',
                'defaultbar' => 'default-bar-content'
             )
        ));             

        $expectedRoute = new Route();
        $expectedRoute->setController('myController');
        $expectedRoute->setAction('myAction');
        $expectedRoute->setVariables(AssociativeArray::createFromNativeArray(
            'string',
            array(                  
                'defaultfoo' => 'default-foo-content',
                'defaultbar' => 'default-bar-content'
            )
        ));         
            
        $httpRequest = new HttpRequest();
        $httpRequest->setRequestUri('/access-to-my-test-uri.html');
        $this->assertEquals(
            $expectedRoute, 
            $routeRule->matchHttpRequest($httpRequest), 
            'Case 6.1'
        );
            
        // Case 6.2 : RouteRule with variables (this will test variables merging )
        $routeRule = new RouteRule();
        $routeRule->setName('my-route-rule-with-variables-test');
        $routeRule->setUriPattern('/test/{foo}/{bar}.html');
        $routeRule->setController('myController');
        $routeRule->setAction('myAction');
        $routeRule->setDefaultVariables(AssociativeArray::createFromNativeArray(
            'string',
            array(
                'defaultfoo' => 'default-foo-content',
                'defaultbar' => 'default-bar-content'
            )
        ));
        $expectedRoute = new Route();
        $expectedRoute->setController('myController');
        $expectedRoute->setAction('myAction');
        $expectedRoute->setVariables(AssociativeArray::createFromNativeArray(
           'string', 
           array(
                'foo' => 'foo-content', 
                'bar' => 'bar-content',
                'defaultfoo' => 'default-foo-content',
                'defaultbar' => 'default-bar-content'               
        )));
            
        $httpRequest = new HttpRequest();
        $httpRequest->setRequestUri('/test/foo-content/bar-content.html');
        
        $this->assertEquals(
            $expectedRoute, 
            $routeRule->matchHttpRequest($httpRequest), 
            'Case 6.2'
        );
    }
    
    /**
     * Case 7 : Testing invalid RouteRules
     */
    
    /**
     * Case 7.1 : Route without name
     *
     * @expectedException DomainException
     * @expectedExceptionMessage Invalid RouteRule : a name must be set
     */
    public function testNoNameSet() 
    {
        $routeRule = new RouteRule();           
        $routeRule->setUriPattern('/access-to-my-test-uri.html');
        $routeRule->setController('myController');
        $routeRule->setAction('myAction');
        $httpRequest = new HttpRequest();
        $httpRequest->setRequestUri('/access-to-my-test-uri.html');
        $routeRule->matchHttpRequest($httpRequest);
    }
    
    /**
     * Case 7.2 : Route without controller
     *
     * @expectedException DomainException
     * @expectedExceptionMessage Invalid RouteRule "some-route-rule" : a controller must be set
     */
    public function testNoControllerSet() 
    {
        $routeRule = new RouteRule();
        $routeRule->setName('some-route-rule');
        $routeRule->setUriPattern('/access-to-my-test-uri.html');           
        $routeRule->setAction('myAction');
        $httpRequest = new HttpRequest();
        $httpRequest->setRequestUri('/access-to-my-test-uri.html');
        $routeRule->matchHttpRequest($httpRequest);
    }       

    /**
     * Case 7.3 : Route without action
     *
     * @expectedException DomainException
     * @expectedExceptionMessage Invalid RouteRule "some-route-rule" : an action must be set
     */
    public function testNoActionSet() 
    {
        $routeRule = new RouteRule();
        $routeRule->setName('some-route-rule');
        $routeRule->setUriPattern('/access-to-my-test-uri.html');
        $routeRule->setController('myController');
        $httpRequest = new HttpRequest();
        $httpRequest->setRequestUri('/access-to-my-test-uri.html');
        $routeRule->matchHttpRequest($httpRequest);
    }       

    /**
     * Case 7.4 : Route without uri pattern
     *
     * @expectedException DomainException
     * @expectedExceptionMessage Invalid RouteRule "some-route-rule" : an uri pattern must be set
     */
    public function testNoUriPatternSet() 
    {
        $routeRule = new RouteRule();
        $routeRule->setName('some-route-rule');         
        $routeRule->setController('myController');
        $routeRule->setAction('myAction');
        $httpRequest = new HttpRequest();
        $httpRequest->setRequestUri('/access-to-my-test-uri.html');
        $routeRule->matchHttpRequest($httpRequest);
    }
    // End of user code
}
