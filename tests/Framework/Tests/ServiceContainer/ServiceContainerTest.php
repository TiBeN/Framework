<?php

namespace TiBeN\Framework\Tests\ServiceContainer;

use TiBeN\Framework\ServiceContainer\ServiceContainer;

// Start of user code ServiceContainer.useStatements
use TiBeN\Framework\Tests\Fixtures\ServiceContainer\SomeService;
use TiBeN\Framework\Tests\Fixtures\ServiceContainer\SomeSecondService;
use TiBeN\Framework\Tests\Fixtures\ServiceContainer\SomeThirdService;

// End of user code

/**
 * Test cases for class ServiceContainer
 * 
 * Start of user code ServiceContainerTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\ServiceContainer
 * @author TiBeN
 */
class ServiceContainerTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code ServiceContainerTest.attributes
    // Place additional tests attributes here.
    // End of user code

    public function setUp()
    {
        // Start of user code ServiceContainerTest.setUp
        // Place additional setUp code here.
        // End of user code
    }

    public function tearDown()
    {
        // Start of user code ServiceContainerTest.tearDown
        // Place additional tearDown code here.
        // End of user code
    }
    
    /**
     * Test static method remove from class ServiceContainer
     *
     * Start of user code ServiceContainerTest.testremoveAnnotations
     * @runInSeparateProcess
     * End of user code
     */
    public function testRemove()
    {
        // Start of user code ServiceContainerTest.testremove
        $this->assertFalse(ServiceContainer::has('some-service'));
        ServiceContainer::register(
            'some-service',
            'TiBeN\\Framework\\Tests\\Fixtures\\ServiceContainer\\SomeService',
            array('%some-parameter')
        );
        $this->assertTrue(ServiceContainer::has('some-service'));
        ServiceContainer::remove('some-service');
        $this->assertFalse(ServiceContainer::has('some-service'));
        // End of user code
    }
    
    /**
     * Test static method getParameter from class ServiceContainer
     *
     * Start of user code ServiceContainerTest.testgetParameterAnnotations
     * PHPUnit user annotations can be placed here
     * End of user code
     */
    public function testGetParameter()
    {
        // Start of user code ServiceContainerTest.testgetParameter
        ServiceContainer::setParameter('some-parameter', 'some-value');
        $this->assertEquals(
            'some-value',
            ServiceContainer::getParameter('some-parameter')
        );
        // End of user code
    }
    
    /**
     * Test static method register from class ServiceContainer
     *
     * Start of user code ServiceContainerTest.testregisterAnnotations
     * PHPUnit user annotations can be placed here
     * End of user code
     */
    public function testRegister()
    {
        // Start of user code ServiceContainerTest.testregister

        // Declare first service which depend on a parameter
        ServiceContainer::setParameter('some-parameter', 'foo');
        ServiceContainer::register(
            'some-service',
            'TiBeN\\Framework\\Tests\\Fixtures\\ServiceContainer\\SomeService',
            array('%some-parameter')
        );
        $this->assertEquals('foo', ServiceContainer::get('some-service')->getParam());

        // Declare second service which depend on the first
        ServiceContainer::register(
            'some-second-service',
            'TiBeN\\Framework\\Tests\\Fixtures\\ServiceContainer\\SomeSecondService',
            array('@some-service')
        );
        $this->assertEquals(
            'foo', 
            ServiceContainer::get('some-second-service')->getFirstService()->getParam()
        );
            
        // Declare third service which depend on the second and parameters are in 
        // nested arrays 
        ServiceContainer::register(
            'some-third-service',
            'TiBeN\\Framework\\Tests\\Fixtures\\ServiceContainer\\SomeThirdService',
            array(
                array(
                    'some-raw-values' => array('foo', 'bar', 1337), 
                    'service' => '@some-second-service' 
                ),
                '%some-parameter'
            )
        );
        $this->assertEquals(
            array(
                array(
                    'some-raw-values' => array('foo', 'bar', 1337),
                    'service' => ServiceContainer::get('some-second-service')
                ),
                'foo'
            ),
            ServiceContainer::get('some-third-service')->getConstructorData()
        );

        // Declare fourth service containing a static factory method
        ServiceContainer::register(
            'some-fourth-service',
            'TiBeN\\Framework\\Tests\\Fixtures\\ServiceContainer\\SomeFourthService',
            array('%some-parameter'),
            'createNewInstance'
        );
        
        $this->assertEquals(
            'foo',
            ServiceContainer::get('some-fourth-service')->getParam()
        );

        // End of user code
    }
    
    /**
     * Test static method removeParameter from class ServiceContainer
     *
     * Start of user code ServiceContainerTest.testremoveParameterAnnotations
     * PHPUnit user annotations can be placed here
     * End of user code
     */
    public function testRemoveParameter()
    {
        // Start of user code ServiceContainerTest.testremoveParameter
        ServiceContainer::setParameter('some-parameter', 'foo');
        $this->assertTrue(ServiceContainer::hasParameter('some-parameter'));
        ServiceContainer::removeParameter('some-parameter');
        $this->assertFalse(ServiceContainer::hasParameter('some-parameter'));
        // End of user code
    }
    
    /**
     * Test static method get from class ServiceContainer
     *
     * Start of user code ServiceContainerTest.testgetAnnotations
     * 
     * End of user code
     */
    public function testGet()
    {
        // Start of user code ServiceContainerTest.testget
        ServiceContainer::register(
            'some-service',
            'TiBeN\\Framework\\Tests\\Fixtures\\ServiceContainer\\SomeService',
            array('foo')
        );
        $this->assertInstanceOf(
            'TiBeN\\Framework\\Tests\\Fixtures\\ServiceContainer\\SomeService', 
            ServiceContainer::get('some-service')
        );
        // End of user code
    }
    
    /**
     * Test method has from class ServiceContainer
     *
     * Start of user code ServiceContainerTest.testhasAnnotations
     * @runInSeparateProcess
     * End of user code
     */
    public function testHas()
    {
        // Start of user code ServiceContainerTest.testhas
        $this->assertFalse(ServiceContainer::has('some-service'));
        ServiceContainer::register(
            'some-service',
            'TiBeN\\Framework\\Tests\\Fixtures\\ServiceContainer\\SomeService',
            array('%some-parameter')
        );
        $this->assertTrue(ServiceContainer::has('some-service'));
        // End of user code
    }
    
    /**
     * Test static method setParameter from class ServiceContainer
     *
     * Start of user code ServiceContainerTest.testsetParameterAnnotations
     * PHPUnit user annotations can be placed here
     * End of user code
     */
    public function testSetParameter()
    {
        // Start of user code ServiceContainerTest.testsetParameter
        // Tested by "testGetParameter" 
        // End of user code
    }
    
    /**
     * Test method hasParameter from class ServiceContainer
     *
     * Start of user code ServiceContainerTest.testhasParameterAnnotations
     * @runInSeparateProcess
     * End of user code
     */
    public function testHasParameter()
    {
        // Start of user code ServiceContainerTest.testhasParameter
        $this->assertFalse(ServiceContainer::hasParameter('some-parameter'));
        ServiceContainer::setParameter('some-parameter', 'bar');
        $this->assertTrue(ServiceContainer::hasParameter('some-parameter'));
        // End of user code
    }

    // Start of user code ServiceContainerTest.methods

    /**
     * @runInSeparateProcess
     * @expectedException LogicException
     * @expectedExceptionMessage The parameter "some-parameter" doesn't exists
     */
    public function testGettingANonExistantParameter()
    {
        ServiceContainer::getParameter('some-parameter');
    }

    /**
     * @expectedException LogicException
     * @expectedExceptionMessage The service "some-service" contain circular dependencies then can't be instanciated
     */
    public function getAServiceWithCircularDependencies()
    {
        ServiceContainer::register(
            'some-service',
            'TiBeN\\Framework\\Tests\\Fixtures\\ServiceContainer\\SomeService',
            array('@some-second-service')
        );
        ServiceContainer::register(
            'some-second-service',
            'TiBeN\\Framework\\Tests\\Fixtures\\ServiceContainer\\SomeSecondService',
            array('@some-service')
        );
        ServiceContainer::get('some-service');
    }

    /**
     * @runInSeparateProcess
     * @expectedException LogicException
     * @expectedExceptionMessage The service "some-service" doesn't exists
     */
    public function testGetANonExistantService()
    {
        ServiceContainer::get('some-service');
    }

    /**
     * Testing cascade instantiation
     * @runInSeparateProcess
     */
    public function testCascadeDependenciesInstanciation()
    {
        ServiceContainer::setParameter('some-parameter', 'foo');
        ServiceContainer::register(
            'some-service',
            'TiBeN\\Framework\\Tests\\Fixtures\\ServiceContainer\\SomeService',
            array('%some-parameter')
        );
        ServiceContainer::register(
            'some-second-service',
            'TiBeN\\Framework\\Tests\\Fixtures\\ServiceContainer\\SomeSecondService',
            array('@some-service')
        );
        ServiceContainer::register(
            'some-third-service',
            'TiBeN\\Framework\\Tests\\Fixtures\\ServiceContainer\\SomeThirdService',
            array(
                array(
                    'some-raw-values' => array('foo', 'bar', 1337), 
                    'service' => '@some-second-service' 
                ),
                '%some-parameter'
            )
        );

        $thirdServiceData = ServiceContainer::get('some-third-service')
            ->getConstructorData()
        ;
        $this->assertEquals(
            array(
                array(
                    'some-raw-values' => array('foo', 'bar', 1337),
                    'service' => ServiceContainer::get('some-second-service')
                ),
                'foo'
            ),
            $thirdServiceData
        );

        $this->assertInstanceOf(
            'TiBeN\\Framework\\Tests\\Fixtures\\ServiceContainer\\SomeSecondService',
            ServiceContainer::get('some-third-service')->getSecondService()
        );

        $this->assertInstanceOf(
            'TiBeN\\Framework\\Tests\\Fixtures\\ServiceContainer\\SomeService',
            ServiceContainer::get('some-third-service')
                ->getSecondService()
                ->getFirstService()
        );
    }
    // End of user code
}
