<?php

namespace TiBeN\Framework\Tests\Fixtures\Controller;

use TiBeN\Framework\Router\HttpResponse;
use TiBeN\Framework\Datatype\AssociativeArray;

/**
 * Controller with methods used to test and validate 
 * fonctionnality of router/controller classes.
 *
 * @author TiBeN 
 */
class TestController 
{
	public function caseWithoutVar() 
    {
		$httpResponse = new HttpResponse();
		$httpResponse->setMessage('<html>Hello From TestController And CaseWithoutVar Action!</html>');
		return $httpResponse;
	}
	
	public function caseWithVar(AssociativeArray $params) 
    {
		$httpResponse = new HttpResponse();
		$httpResponse->setMessage(
			sprintf(
				'<html>variable "foo" contains "%s" and variable bar contains "%s"</html>', 
				$params->get('foo'), 
				$params->get('bar')
			)
		);
		return $httpResponse;
	}
	
	/**
	 * This action throw an exception
     *
	 * @param array $variables
	 */
	public function throwException($variables) 
    {
		throw new \RuntimeException('This is the message of the exception');
	}

    /**
     * Used by RouterTest to prove execution of some configured action when
     * no route match current http request
     */
    public function onNotFound(AssociativeArray $variables)
    {
        $httpResponse = new HttpResponse();
        $httpResponse->setMessage('TestController::onNotFound executed!');
        return  $httpResponse;
    }

    /**
     * Used by RouterTest to prove execution of some configured action when
     * an exception is throw during execution of an action
     */
    public function onExecutionActionException(AssociativeArray $variables)
    {
        $httpResponse = new HttpResponse();
        $httpResponse->setMessage(
            sprintf(    
                'TestController::onExecutionActionException executed! - %s : %s',
                $variables->get('type'),
                $variables->get('message')
            )
        );
        return $httpResponse;
    }
}
