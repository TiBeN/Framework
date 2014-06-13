<?php

namespace TiBeN\Framework\Tests\Bootstrap;

use TiBeN\Framework\Bootstrap\Bootstrap;

// Start of user code Bootstrap.useStatements
use TiBeN\Framework\Package\PackageInitializer;

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

        // Create a mock of a PackageInitializer
        // To assert that his init method is called by the Bootstrap
        $stubPackageInitializer = $this->getMock(
            'TiBeN\\Framework\\Package\\PackageInitializer', 
            array('init')
        );
        $stubPackageInitializer
            ->expects($this->once())
            ->method('init')
        ;

        $bootstrap = new Bootstrap();
        $bootstrap->init(array($stubPackageInitializer));
        // End of user code
    }

    // Start of user code BootstrapTest.methods
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Only classes that implements PackageInitializer are allowed
     */
    public function testPassANonPackageInitializerObject()
    {
        $someObject = $this->getMock('SomeObject');
        $bootstrap = new Bootstrap();
        $bootstrap->init(array($someObject));
    }
    // End of user code
}
