<?php

namespace TiBeN\Framework\Tests\Router;

use TiBeN\Framework\Router\HttpRequest;

// Start of user code HttpRequestTest.useStatements
use TiBeN\Framework\Datatype\AssociativeArray;

// End of user code

/**
 * Test cases for class HttpRequest
 *
 * @author TiBeN
 */
class HttpRequestTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code HttpRequestTest.attributes

    private $originalPhpServerGlobal;

    private $originalPhpGetGlobal;

    private $originalPhpPostGlobal;

    // End of user code

    public function setUp()
    {
        // Start of user code HttpRequestTest.setUp
        $this->originalPhpServerGlobal = $_SERVER;
        $this->originalPhpGetGlobal = $_GET;
        $this->originalPhpPostGlobal = $_POST;
        // End of user code
    }

    public function tearDown()
    {
        // Start of user code HttpRequestTest.tearDown
        $_SERVER = $this->originalPhpServerGlobal;
        $_GET = $this->originalPhpGetGlobal;
        $_POST = $this->originalPhpPostGlobal;
        // End of user code
    }
    
    /**
     * Test static method createFromClientRequest from class HttpRequest
     *
     * Start of user code HttpRequestTest.testcreateFromClientRequestAnnotations
     * PHPUnit users annotations can be placed here
     * End of user code
     */
    public function testCreateFromClientRequest()
    {
        // Start of user code HttpRequestTest.testcreateFromClientRequest

        // Simulate a request at the php globals level
        $_SERVER['REQUEST_METHOD'] = 'get';
        $_SERVER['REQUEST_URI'] = '/some-ressource.html';
        $_SERVER['SERVER_PROTOCOL'] = 'HTTP/1.1';
        $_SERVER['HTTP_HOST'] = 'http://www.my-host.com';
        $_SERVER['HTTP_USER_AGENT']
            = 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:20.0) Gecko/20100101 Firefox/20.0'
        ;
        $_SERVER['HTTP_ACCEPT'] = 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';
        $_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'fr,fr-fr;q=0.8,en-us;q=0.5,en;q=0.3';
        $_SERVER['HTTP_ACCEPT_ENCODING'] = 'gzip, deflate';
        $_SERVER['HTTP_CONNECTION'] = 'keep-alive';
        $_GET = array('var' => 'boobar');

        // Manualy create an HttpRequest Objet that reflect the simulated request
        $expectedHttpRequest = new HttpRequest();
        $expectedHttpRequest->setMethod('get');
        $expectedHttpRequest->setRequestUri('/some-ressource.html');
        $expectedHttpRequest->setHttpVersion('HTTP/1.1');
        $expectedHttpRequest->setHost('http://www.my-host.com');
        $expectedHttpRequest->setHeaders(AssociativeArray::createFromNativeArray(
            'string',
            array(
                'Host' => 'http://www.my-host.com',
                'User-Agent' => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:20.0) Gecko/20100101 Firefox/20.0',
                'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                'Accept-Language' => 'fr,fr-fr;q=0.8,en-us;q=0.5,en;q=0.3',
                'Accept-Encoding' => 'gzip, deflate',
                'Connection' => 'keep-alive'
            )
        ));
        $expectedHttpRequest->setGetVars(
            AssociativeArray::createFromNativeArray('string', array('var' => 'boobar'))
        );

        $this->assertEquals(
            $expectedHttpRequest,
            HttpRequest::createFromClientRequest(),
            'HttpRequest generated doesn\'t match expected'
        );
        // End of user code
    }

    // Start of user code HttpRequestTest.methods
    // Place additional tests methods here.
    // End of user code
}
