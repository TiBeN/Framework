<?php

namespace TiBeN\Framework\Tests\Controller;

use TiBeN\Framework\Controller\RouterSpecialEventsController;

// Start of user code RouterSpecialEventsController.useStatements
use TiBeN\Framework\Datatype\AssociativeArray;
// End of user code

/**
 * Test cases for class RouterSpecialEventsController
 * 
 * Start of user code RouterSpecialEventsControllerTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @author TiBeN
 */
class RouterSpecialEventsControllerTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code RouterSpecialEventsControllerTest.attributes
    // Place additional tests attributes here.
    // End of user code

    public function setUp()
    {
        // Start of user code RouterSpecialEventsControllerTest.setUp
        // Place additional setUp code here.
        // End of user code
    }

    public function tearDown()
    {
        // Start of user code RouterSpecialEventsControllerTest.tearDown
        // Place additional tearDown code here.
        // End of user code
    }
    
    /**
     * Test method onNotFound from class RouterSpecialEventsController
     *
     * Start of user code RouterSpecialEventsControllerTest.testonNotFoundAnnotations
     * PHPUnit user annotations can be placed here
     * End of user code
     */
    public function testOnNotFound()
    {
        // Start of user code RouterSpecialEventsControllerTest.testonNotFound
        $controller = new RouterSpecialEventsController();
        $httpResponse = $controller->onNotFound(new AssociativeArray('string'));
        $this->assertEquals(404, $httpResponse->getStatusCode());
        $this->assertEquals(
            "<html><h1>Error 404</h1><p>No ressource available at this URI</p><p>TiBeN Framework</p></html>", 
            $httpResponse->getMessage()
        );
        // End of user code
    }
    
    /**
     * Test method onExecuteActionException from class RouterSpecialEventsController
     *
     * Start of user code RouterSpecialEventsControllerTest.testonExecuteActionExceptionAnnotations
     * PHPUnit user annotations can be placed here
     * End of user code
     */
    public function testOnExecuteActionException()
    {
        // Start of user code RouterSpecialEventsControllerTest.testonExecuteActionException
        $controller = new RouterSpecialEventsController();
        $httpResponse = $controller->onExecuteActionException(
            AssociativeArray::createFromNativeArray(
                'string',
                array(
                    'type' => 'SomeException',
                    'code' => 0,
                    'message' => 'Message of a simulated exception',
                    'file' => '/var/some-folder/some-file.som',
                    'controller' => 'SomeController',
                    'action' => 'someAction'
                )
        ));
        $this->assertEquals(500, $httpResponse->getStatusCode());
        $this->assertEquals(
            "<html><h1>Error 500 : An exception has been thrown</h1><p>While executing SomeController::someAction</p><p>SomeException : Message of a simulated exception</p><p>TiBeN Framework</p></html>", 
            $httpResponse->getMessage()
        );
        // End of user code
    }

    // Start of user code RouterSpecialEventsControllerTest.methods
    // Place additional tests methods here.
    // End of user code
}
