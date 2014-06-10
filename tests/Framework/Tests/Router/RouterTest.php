<?php

namespace TiBeN\Framework\Tests\Router;

use TiBeN\Framework\Router\Router;

// Start of user code Router.useStatements
use TiBeN\Framework\Router\Route;
use TiBeN\Framework\Router\RouteRule;
use TiBeN\Framework\Datatype\AssociativeArray;

// End of user code

/**
 * Test cases for class Router
 * 
 * Start of user code RouterTest.testAnnotations
 * @runTestsInSeparateProcesses  
 * End of user code
 *
 * @package TiBeN\Framework\Tests\Router
 * @author TiBeN
 */
class RouterTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code RouterTest.attributes
    // Place additional tests attributes here.
    // End of user code

    public function setUp()
    {
        // Start of user code RouterTest.setUp
        $this->originalPhpServerGlobal = $_SERVER;
        $this->originalPhpGetGlobal = $_GET;
        $this->originalPhpPostGlobal = $_POST;
        // End of user code
    }

    public function tearDown()
    {
        // Start of user code RouterTest.tearDown
        $_SERVER = $this->originalPhpServerGlobal;
        $_GET = $this->originalPhpGetGlobal;
        $_POST = $this->originalPhpPostGlobal;
        // End of user code
    }
    
    /**
     * Test static method followRoute from class Router
     *
     * Start of user code RouterTest.testfollowRouteAnnotations
     * PHPUnit users annotations can be placed here
     * End of user code
     */
    public function testFollowRoute()
    {
        // Start of user code RouterTest.testfollowRoute

        // Case : Route without variables
        $route = new Route();
        $route->setController(
            'TiBeN\\Framework\\Tests\\Fixtures\\Controller\\TestController'
        );
        $route->setAction('caseWithoutVar');

        ob_start();
        Router::followRoute($route);
        $this->assertEquals(
            '<html>Hello From TestController And CaseWithoutVar Action!</html>',
            ob_get_clean()
        );

        // Case : Route with variables
        $route = new Route();
        $route->setController(
            'TiBeN\\Framework\\Tests\\Fixtures\\Controller\\TestController'
        );
        $route->setAction('caseWithVar');
        $route->setVariables(AssociativeArray::createFromNativeArray(
            'string',
            array(
                'foo' => 'foo-content',
                'bar' => 'bar-content'
            )
        ));

        ob_start();
        Router::followRoute($route);
        $this->assertEquals(
            '<html>variable "foo" contains "foo-content" and variable bar contains "bar-content"</html>',
            ob_get_clean()
        );
        // End of user code
    }
    
    /**
     * Test static method addRouteRule from class Router
     *
     * Start of user code RouterTest.testaddRouteRuleAnnotations
     * PHPUnit users annotations can be placed here
     * End of user code
     */
    public function testAddRouteRule()
    {
        // Start of user code RouterTest.testaddRouteRule

        // Case : Add a route and retrieve it by name
        $routeRule = new RouteRule();
        $routeRule->setName('my-route-rule');
        $routeRule->setUriPattern('/access-to-my-test-uri.html');
        $routeRule->setController('myController');
        $routeRule->setAction('myAction');

        Router::addRouteRule($routeRule);
        $this->assertEquals(
            $routeRule,
            Router::getRouteRuleByName('my-route-rule'),
            'Case 1'
        );
        // End of user code
    }
    
    /**
     * Test static method forwardToRoute from class Router
     *
     * Start of user code RouterTest.testforwardToRouteAnnotations
     * PHPUnit users annotations can be placed here
     * End of user code
     */
    public function testForwardToRoute()
    {
        // Start of user code RouterTest.testforwardToRoute
        $routeRule = new RouteRule();
        $routeRule->setName('my-route-rule-without-vars-test');
        $routeRule->setUriPattern('/access-to-my-test-uri.html');
        $routeRule->setController(
            'TiBeN\\Framework\\Tests\\Fixtures\\Controller\\TestController'
        );
        $routeRule->setAction('caseWithoutVar');

        Router::addRouteRule($routeRule);

        ob_start();
        Router::forwardToRoute(
            'my-route-rule-without-vars-test',
            new AssociativeArray('string')
        );

        $this->assertEquals(
            '<html>Hello From TestController And CaseWithoutVar Action!</html>',
            ob_get_clean()
        );
        // End of user code
    }
    
    /**
     * Test static method redirectToRoute from class Router
     *
     * Start of user code RouterTest.testredirectToRouteAnnotations
     * PHPUnit users annotations can be placed here
     * End of user code
     */
    public function testRedirectToRoute()
    {
        // Start of user code RouterTest.testredirectToRoute
        $routeRule = new RouteRule();
        $routeRule->setName('my-route-rule-without-vars-test');
        $routeRule->setUriPattern('/access-to-my-test-uri.html');
        $routeRule->setController('test');
        $routeRule->setAction('caseWithoutVar');
        Router::addRouteRule($routeRule);
        Router::redirectToRoute(
            'my-route-rule-without-vars-test',
            new AssociativeArray('string')
        );
        // End of user code
    }
    
    /**
     * Test static method generateUri from class Router
     *
     * Start of user code RouterTest.testgenerateUriAnnotations
     * PHPUnit users annotations can be placed here
     * End of user code
     */
    public function testGenerateUri()
    {
        // Start of user code RouterTest.testgenerateUri

        // Case : Generate an uri without variables
        $routeRule = new RouteRule();
        $routeRule->setName('my-route-rule-without-vars-test');
        $routeRule->setUriPattern('/access-to-my-test-uri.html');
        $routeRule->setController('myController');
        $routeRule->setAction('myAction');
        Router::addRouteRule($routeRule);
        $this->assertEquals(
            '/access-to-my-test-uri.html',
            Router::generateUri(
                'my-route-rule-without-vars-test',
                new AssociativeArray('string')
            )
        );

        // Case : Generate an uri with variables
        $routeRule = new RouteRule();
        $routeRule->setName('my-route-rule-with-variables-test');
        $routeRule->setUriPattern('/test/{foo}/{bar}.html');
        $routeRule->setController('myController');
        $routeRule->setAction('myAction');
        Router::addRouteRule($routeRule);
        $this->assertEquals(
            '/test/foo-content/bar-content.html',
            Router::generateUri(
                'my-route-rule-with-variables-test',
                AssociativeArray::createFromNativeArray(
                    'string',
                    array('foo' => 'foo-content', 'bar' => 'bar-content')
                )
            )
        );
        // End of user code
    }
    
    /**
     * Test static method handleCurrentHttpRequest from class Router
     *
     * Start of user code RouterTest.testhandleCurrentHttpRequestAnnotations
     *
     * End of user code
     */
    public function testHandleCurrentHttpRequest()
    {
        // Start of user code RouterTest.testhandleCurrentHttpRequest
        // Add route rule
        $routeRule = new RouteRule();
        $routeRule->setName('my-route-rule-without-vars-test');
        $routeRule->setUriPattern('/access-to-my-test-uri.html');
        $routeRule->setController(
            'TiBeN\\Framework\\Tests\\Fixtures\\Controller\\TestController'
        );
        $routeRule->setAction('caseWithoutVar');

        Router::addRouteRule($routeRule);

        // Simulate a request at the php globals level
        $_SERVER['REQUEST_METHOD'] = 'get';
        $_SERVER['REQUEST_URI'] = '/access-to-my-test-uri.html';
        $_SERVER['SERVER_PROTOCOL'] = 'HTTP/1.1';
        $_SERVER['HTTP_HOST'] = 'http://www.my-host.com';
        $_SERVER['HTTP_USER_AGENT']
            = 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:20.0) Gecko/20100101 Firefox/20.0'
        ;
        $_SERVER['HTTP_ACCEPT']
            = 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8'
        ;
        $_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'fr,fr-fr;q=0.8,en-us;q=0.5,en;q=0.3';
        $_SERVER['HTTP_ACCEPT_ENCODING'] = 'gzip, deflate';
        $_SERVER['HTTP_CONNECTION'] = 'keep-alive';

        ob_start();
        Router::handleCurrentHttpRequest();

        $this->assertEquals(
            '<html>Hello From TestController And CaseWithoutVar Action!</html>',
            ob_get_clean()
        );
        // End of user code
    }
    
    /**
     * Test static method getRouteRuleByName from class Router
     *
     * Start of user code RouterTest.testgetRouteRuleByNameAnnotations
     * PHPUnit users annotations can be placed here
     * End of user code
     */
    public function testGetRouteRuleByName()
    {
        // Start of user code RouterTest.testgetRouteRuleByName
        // Test of this method is covered by testAddRouteRule */
        // End of user code
    }

    // Start of user code RouterTest.methods

    /**
     * Case : Exception thrown when no route match a request 
     *
     * @expectedException RuntimeException
     * @expectedExceptionMessage No route match current request
     * @runInSeparateProcess
     */
    public function testNotFoundExceptionWhenNoRouteMatchCurrentRequest()
    {
        // Simulate a request at the php globals level
        $_SERVER['REQUEST_METHOD'] = 'get';
        $_SERVER['REQUEST_URI'] = '/access-to-an-unknown-uri.html';
        $_SERVER['SERVER_PROTOCOL'] = 'HTTP/1.1';
        $_SERVER['HTTP_HOST'] = 'http://www.my-host.com';
        $_SERVER['HTTP_USER_AGENT']
            = 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:20.0) Gecko/20100101 Firefox/20.0'
        ;
        $_SERVER['HTTP_ACCEPT']
            = 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8'
        ;
        $_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'fr,fr-fr;q=0.8,en-us;q=0.5,en;q=0.3';
        $_SERVER['HTTP_ACCEPT_ENCODING'] = 'gzip, deflate';
        $_SERVER['HTTP_CONNECTION'] = 'keep-alive';

        Router::handleCurrentHttpRequest();
    }

    /**
     * Case : Execute special configured route when no route match a request
     * @runInSeparateProcess
     */
    public function testExecuteSpecialConfiguredRouteWhenNoRouteMatchCurrentHttpRequest()
    {
        // Configure special route 
        $route = new Route();
        $route->setController(
            'TiBeN\\Framework\\Tests\\Fixtures\\Controller\\TestController'
        );
        $route->setAction('onNotFound');
        Router::setOnNotFoundRoute($route);

        // Simulate a request at the php globals level
        $_SERVER['REQUEST_METHOD'] = 'get';
        $_SERVER['REQUEST_URI'] = '/access-to-an-unknown-uri.html';
        $_SERVER['SERVER_PROTOCOL'] = 'HTTP/1.1';
        $_SERVER['HTTP_HOST'] = 'http://www.my-host.com';
        $_SERVER['HTTP_USER_AGENT']
            = 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:20.0) Gecko/20100101 Firefox/20.0'
        ;
        $_SERVER['HTTP_ACCEPT']
            = 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8'
        ;
        $_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'fr,fr-fr;q=0.8,en-us;q=0.5,en;q=0.3';
        $_SERVER['HTTP_ACCEPT_ENCODING'] = 'gzip, deflate';
        $_SERVER['HTTP_CONNECTION'] = 'keep-alive';

        ob_start(); 
        Router::handleCurrentHttpRequest();
        $this->assertEquals('TestController::onNotFound executed!', ob_get_clean());
    }

    /**
     * Case: Exception thrown when an exception occur when executing an action 
     *
     * @expectedException RuntimeException
     * @expectedExceptionMessage An exception has been thrown when executing TiBeN\Framework\Tests\Fixtures\Controller\TestController::throwException : "RuntimeException : This is the message of the exception
     * @runInSeparateProcess
     */
    public function testExceptionThrownWhenAnExceptionOccurWhenExectingAnAction()
    {
        $route = new Route();
        $route->setController(
            'TiBeN\\Framework\\Tests\\Fixtures\\Controller\\TestController'
        );
        $route->setAction('throwException');
        Router::followRoute($route);
    }

    /**
     * Case: Execute special configured route when an exception is thrown when executing an action
     * @runInSeparateProcess
     */
    public function testExecuteSpecialConfiguredRouteWhenAnExceptionIsThrownWhenExecutingAnAction()
    {
        // Configure special route
        $specialRoute = new Route();
        $specialRoute->setController(
            'TiBeN\\Framework\\Tests\\Fixtures\\Controller\\TestController'
        );
        $specialRoute->setAction('onExecutionActionException');
        Router::setOnExecuteActionExceptionRoute($specialRoute);

        $route = new Route();
        $route->setController(
            'TiBeN\\Framework\\Tests\\Fixtures\\Controller\\TestController'
        );
        $route->setAction('throwException');

        ob_start();
        Router::followRoute($route);
        $this->assertEquals(
            'TestController::onExecutionActionException executed! - RuntimeException : This is the message of the exception',
            ob_get_clean()
        );
    }

    /**
     * Case : Exception when retrieve a route by name that doesn't exist
     *
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage No RouteRule named "my-route-rule" exist
     */
    public function testExceptionWhenGetRouteRuleByNameThatDoesntExist()
    {
        Router::getRouteRuleByName('my-route-rule');
    }

    /**
     * Case : Exception when follow a route containing a controller that doesn't exist
     *
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage No Controller named "Unknown" exist
     */
    public function testExceptionWhenFollowARouteWithControllerThatDoesntExist()
    {
        $route = new Route();
        $route->setController('unknown');
        $route->setAction('someAction');
        Router::followRoute($route);
    }

    /**
     * Case : Exception when follow a route containing an action that doesn't exist
     *
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage No Action named "unknown" exist in controller TiBeN\Framework\Tests\Fixtures\Controller\TestController
     */
    public function testExceptionWhenFollowARouteWithActionThatDoesntExist()
    {
        $route = new Route();
        $route->setController(
            'TiBeN\\Framework\\Tests\\Fixtures\\Controller\\TestController'
        );
        $route->setAction('unknown');
        Router::followRoute($route);
    }
    // End of user code
}
