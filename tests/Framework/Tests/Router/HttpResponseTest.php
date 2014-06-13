<?php

namespace TiBeN\Framework\Tests\Router;

use TiBeN\Framework\Router\HttpResponse;

// Start of user code HttpResponse.useStatements
use TiBeN\Framework\Datatype\AssociativeArray;

// End of user code

/**
 * Test cases for class HttpResponse
 * 
 * Start of user code HttpResponseTest.testAnnotations
 * @runTestsInSeparateProcesses 
 * End of user code
 *
 * @package TiBeN\Framework\Tests\Router
 * @author TiBeN
 */
class HttpResponseTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code HttpResponseTest.attributes
    // Place additional tests attributes here.  
    // End of user code

    public function setUp()
    {
        // Start of user code HttpResponseTest.setUp
        // Place additional setUp code here.  
        // End of user code
    }

    public function tearDown()
    {
        // Start of user code HttpResponseTest.tearDown
        // Place additional tearDown code here.  
        // End of user code
    }
    
    /**
     * Test method sendToClient from class HttpResponse
     *
     * Start of user code HttpResponseTest.testsendToClientAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testSendToClient()
    {
        // Start of user code HttpResponseTest.testsendToClient
        
        // Test normal 200 text/html response message with custom header key value
        $httpResponse = new HttpResponse();         
        $httpResponse->setMessage('<html>Hello world!</html>');  
        $httpResponse->setHeaders(
            AssociativeArray::createFromNativeArray('string', array('foo' => 'bar'))
        );
        ob_start();
        $httpResponse->sendToClient();
        $this->assertEquals('<html>Hello world!</html>', ob_get_clean());

        // Headers testing is only available using Xdebug extension 
        // since PHP CLI SAPI mode doesn't handle any headers
        if (function_exists('xdebug_get_headers')) {
            $headers = xdebug_get_headers();
            $this->assertContains('Content-type: text/html',  $headers  );
            $this->assertContains('Foo: bar',  $headers );
        }
        
        // Note that prior to PHP 5.4 there is no way 
        // to retrieve the status code sent
        if (function_exists('http_response_code')){
            $this->assertEquals(200, http_response_code());
        }
        // End of user code
    }
    
    /**
     * Test static method createRedirectResponse from class HttpResponse
     *
     * Start of user code HttpResponseTest.testcreateRedirectResponseAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testCreateRedirectResponse()
    {
        // Start of user code HttpResponseTest.testcreateRedirectResponse
        $redirectToUri = '/redirect-to-uri.html';
        
        // Test temporary redirect response type (302 http code)
        $redirectResponse = HttpResponse::createRedirectResponse($redirectToUri, false);  
        $redirectResponse->sendToClient();
        
        // Headers testing is only available using Xdebug extension 
        // since PHP CLI SAPI mode doesn't handle any headers 
        if(function_exists('xdebug_get_headers')) {
            $headers = xdebug_get_headers();                
            $this->assertContains('Location: /redirect-to-uri.html',  $headers);
        }
        
        // Note that prior to PHP 5.4 there is no way to retrieve the status code sent
        if(function_exists('http_response_code')){
            $this->assertEquals(302, http_response_code());
        }

        // Test permanent redirect response type (301 http code)
        header_remove();
        $redirectResponse = HttpResponse::createRedirectResponse($redirectToUri, true);
        $redirectResponse->sendToClient();          

        // Headers testing is only available using Xdebug extension 
        // since PHP CLI SAPI mode doesn't handle any headers 
        if(function_exists('xdebug_get_headers')) {
            $headers = xdebug_get_headers();
            $this->assertContains('Location: /redirect-to-uri.html',  $headers);
        }
            
        // Note that prior to PHP 5.4 there is no way to retrieve the status code sent
        if(function_exists('http_response_code')){
            $this->assertEquals(301, http_response_code());
        }
        // End of user code
    }
    
    /**
     * Test static method createDownloadFileResponse from class HttpResponse
     *
     * Start of user code HttpResponseTest.testcreateDownloadFileResponseAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testCreateDownloadFileResponse()
    {
        // Start of user code HttpResponseTest.testcreateDownloadFileResponse
        $downloadFileResponse = HttpResponse::createDownloadFileResponse(
            'my-test-file.txt',
            'text/plain',
            'hello world!'
        );
        
        ob_start();
        $downloadFileResponse->sendToClient();
        $this->assertEquals('hello world!', ob_get_clean());
        
        // headers testing is only available using xdebug extension 
        // since php cli sapi mode doesn't handle any headers
        if(function_exists('xdebug_get_headers')) {
            $headers = xdebug_get_headers();
            $this->assertContains('Content-type: text/plain', $headers);
            $this->assertContains(
                'Content-Disposition: attachment; filename="my-test-file.txt"',
                $headers
            );
        }
            
        // note that prior to php 5.4 there is no way to retrieve the status code sent 
        if(function_exists('http_response_code')){
            $this->assertEquals(200, http_response_code());
        }
        // End of user code
    }

    // Start of user code HttpResponseTest.methods
    // Place additional tests methods here.  
    // End of user code
}
