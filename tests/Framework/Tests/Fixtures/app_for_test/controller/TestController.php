<?php
/**
 * Controller with methods used to test and validate 
 * fonctionnality of router/controller classes.
 * @author tiben 
 */
class TestController {
	
	public function caseWithoutVar() {
		$httpResponse = new HttpResponse();
		$httpResponse->setMessage('<html>Hello From TestController And CaseWithoutVar Action!</html>');
		return $httpResponse;
	}
	
	public function caseWithVar(AssociativeArray $params) {
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
	 * @param array $variables
	 */
	public function throwException($variables) {
		
		throw new RuntimeException('This is the message of the exception');
		
	}
	
}