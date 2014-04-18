<?php

namespace TiBeN\Framework\Controller;

use TiBeN\Framework\Router\HttpResponse;
use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code RouterSpecialEventsController.useStatements
// Place your use statements here.
// End of user code

/**
 * This bundled controller hold default actions of 
 * special router events (route not found  etc..).
 *
 * @package Controller
 * @author TiBeN
 */
class RouterSpecialEventsController
{
    public function __construct()
    {
        // Start of user code RouterSpecialEventsController.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code RouterSpecialEventsController.destructor
        // End of user code
    }

    /**
     * Executed by the router when an exception is thrown
     * during the execution of an action.
     *
     * @param AssociativeArray $variables
     * @return HttpResponse $httpResponse
     */
    public function onExecuteActionException(AssociativeArray $variables)
    {
        // Start of user code RouterSpecialEventsController.onExecuteActionException
        $httpResponse = new HttpResponse();
        $httpResponse->setStatusCode(500);
        $httpResponse->setMessage(
            sprintf(
                "<html><h1>Error 500 : An exception has been thrown</h1><p>While executing %s::%s</p><p>%s : %s</p><p>TiBeN Framework</p></html>",
                $variables->get('controller'),
                $variables->get('action'),
                $variables->get('type'),
                $variables->get('message')
            )
        );
        return $httpResponse;
        // End of user code
    
        return $httpResponse;
    }

    /**
     * Executed when no routes has been found during
     * request handling
     *
     * @param AssociativeArray $variables
     * @return HttpResponse $httpResponse
     */
    public function onNotFound(AssociativeArray $variables)
    {
        // Start of user code RouterSpecialEventsController.onNotFound
        $httpResponse = new HttpResponse();
        $httpResponse->setStatusCode(404);
        $httpResponse->setMessage("<html><h1>Error 404</h1><p>No ressource available at this URI</p><p>TiBeN Framework</p></html>");
        return $httpResponse;
        // End of user code
    
        return $httpResponse;
    }

    // Start of user code RouterSpecialEventsController.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
