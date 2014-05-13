<?php

namespace TiBeN\Framework\Tests\Bootstrap;

use TiBeN\Framework\Bootstrap\Bootstrap;

// Start of user code Bootstrap.useStatements
use TiBeN\Framework\Router\RouteRule;
use TiBeN\Framework\Router\Router;
use TiBeN\Framework\Renderer\TemplateRenderer;
use TiBeN\Framework\DataSource\DataSourceTypeConvertersRegistry;
// End of user code

/**
 * Test cases for class Bootstrap
 * 
 * Start of user code BootstrapTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\Bootstrap
 * @author TiBeN
 */
class BootstrapTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code BootstrapTest.attributes
    private $frameworkTempDirectory = '/tmp/tiben_framework_test';
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

        Router::setRouteRules(array());

        if (!file_exists($this->frameworkTempDirectory)) {
            return;
        }

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(
                $this->frameworkTempDirectory, 
                \FilesystemIterator::SKIP_DOTS
            ), 
            \RecursiveIteratorIterator::CHILD_FIRST
        );
        foreach ($iterator as $filename => $fileInfo) {
            if ($fileInfo->isDir()) {
                rmdir($filename);
            } else {
                unlink($filename);
            }
        }
        rmdir($this->frameworkTempDirectory);
        // End of user code
    }
    
    /**
     * Test static method init from class Bootstrap
     *
     * Start of user code BootstrapTest.testinitAnnotations
     * @runInSeparateProcess
     * End of user code
     */
    public function testInit()
    {
        // Start of user code BootstrapTest.testinit
        
        // Bootstrap should set special routes of the router 
        // (onNotFound etc..) with default controller/actions 
        // included with the framework.
        Bootstrap::init(
            dirname(__FILE__) . '/../Fixtures/config',
            $this->frameworkTempDirectory
        );

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

        // Bootstrap should instanciate and set SmartyEngine 
        // as default template engine.
        $this->assertInstanceOf(
            'TiBeN\\Framework\\Renderer\\SmartyEngine', 
            TemplateRenderer::getDefaultTemplateEngine()
        );

        // Bootstrap should declare built-in Mysql Datasource TypeConverters
        $this->assertInstanceOf(
            'TiBeN\\Framework\\DataSource\\MysqlDataSource\\TypeConverter\\BooleanConverter',
            DataSourceTypeConvertersRegistry::getTypeConverter('boolean', 'mysql')
        );

        $this->assertInstanceOf(
            'TiBeN\\Framework\\DataSource\\MysqlDataSource\\TypeConverter\\IntegerConverter',
            DataSourceTypeConvertersRegistry::getTypeConverter('integer', 'mysql')
        );

        $this->assertInstanceOf(
            'TiBeN\\Framework\\DataSource\\MysqlDataSource\\TypeConverter\\DecimalConverter',
            DataSourceTypeConvertersRegistry::getTypeConverter('decimal', 'mysql')
        );

        $this->assertinstanceof(
            'tiben\\framework\\datasource\\mysqldatasource\\TypeConverter\\Stringconverter',
            datasourcetypeconvertersregistry::gettypeconverter('string', 'mysql')
        );

        $this->assertInstanceOf(
            'TiBeN\\Framework\\DataSource\\MysqlDataSource\\TypeConverter\\DateTimeConverter',
            DataSourceTypeConvertersRegistry::getTypeConverter('datetime', 'mysql')
        );
        // End of user code
    }

    // Start of user code BootstrapTest.methods
    // End of user code
}
