<?php

namespace TiBeN\Framework\Tests\Bootstrap;

use TiBeN\Framework\Bootstrap\Bootstrap;

// Start of user code BootstrapTest.useStatements
use TiBeN\Framework\Router\RouteRule;
use TiBeN\Framework\Router\Router;

// End of user code

/**
 * Test cases for class Bootstrap
 * 
 * Start of user code BootstrapTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 * @author TiBeN
 */
class BootstrapTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code BootstrapTest.attributes
    // Place additional tests attributes here.
    // End of user code

    public function setUp()
    {
        // Start of user code BootstrapTest.setUp
        // Place additional setUp code here.
        // End of user code
    }

    public function tearDown()
    {
        // Start of user code BootstrapTest.tearDown
        // Place additional tearDown code here.
        // End of user code
    }
    
    /**
     * Test static method init from class Bootstrap
     *
     * Start of user code BootstrapTest.testinitAnnotations
     * PHPUnit user annotations can be placed here
     * End of user code
     */
    public function testInit()
    {
        // Start of user code BootstrapTest.testinit
        
        // Bootstrap should set special routes of the router 
        // (onNotFound etc..) with default controller/actions 
        // included with the framework.
        Bootstrap::init(dirname(__FILE__) . '/../Fixtures/config');
        
        // Bootstrap should load the routeRules config file
        $expectedRouteRule = new RouteRule();
        $expectedRouteRule->setName('some-route-for-testing-bootstrap');
        $expectedRouteRule->setUriPattern('/testing-bootstrap-routerule');
        $this->assertEquals(
            $expectedRouteRule,
            Router::getRouteRuleByName('some-route-for-testing-bootstrap')
        );    

        // Bootstrap should load the routeRules config file
        // After set default special routes  
        $this->assertInstanceOf(
            'TiBeN\\Framework\\Router\\Route', 
            Router::getOnNotFoundRoute()
        );
        $this->assertInstanceOf(
            'TiBeN\\Framework\\Router\\Route', 
            Router::getOnExecuteActionExceptionRoute()
        );
        // End of user code
    }

    // Start of user code BootstrapTest.methods
    // End of user code
}
