<?php

namespace TiBeN\Framework\Router;

use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code HttpRequest.useStatements
// Place your use statements here.
// End of user code

/**
 * Represent an HttpRequest.
 * HttpRequest can be instantiated with client request message 
 * that launched the runtime by using the createFromClientRequest() factory method,  
 * HttpRequest can be also manualy constructed for simulation purposes.
 *
 * @package TiBeN\Framework\Router
 * @author TiBeN
 */
class HttpRequest
{
    /**
     * @var AssociativeArray
     */
    public $postVars;

    /**
     * @var AssociativeArray
     */
    public $headers;

    /**
     * @var AssociativeArray
     */
    public $getVars;

    /**
     * @var string
     */
    public $host;

    /**
     * @var string
     */
    public $requestUri;

    /**
     * @var string
     */
    public $method;

    /**
     * @var string
     */
    public $httpVersion;

    public function __construct()
    {
        // Start of user code HttpRequest.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code HttpRequest.destructor
        // End of user code
    }

    /**
     * @return AssociativeArray
     */
    public function getPostVars()
    {
        // Start of user code Getter HttpRequest.getPostVars
        // End of user code
        return $this->postVars;
    }

    /**
     * @param AssociativeArray $postVars
     */
    public function setPostVars(AssociativeArray $postVars)
    {
        // Start of user code Setter HttpRequest.setPostVars
        // End of user code
        $this->postVars = $postVars;
    }

    /**
     * @return AssociativeArray
     */
    public function getHeaders()
    {
        // Start of user code Getter HttpRequest.getHeaders
        // End of user code
        return $this->headers;
    }

    /**
     * @param AssociativeArray $headers
     */
    public function setHeaders(AssociativeArray $headers)
    {
        // Start of user code Setter HttpRequest.setHeaders
        // End of user code
        $this->headers = $headers;
    }

    /**
     * @return AssociativeArray
     */
    public function getGetVars()
    {
        // Start of user code Getter HttpRequest.getGetVars
        // End of user code
        return $this->getVars;
    }

    /**
     * @param AssociativeArray $getVars
     */
    public function setGetVars(AssociativeArray $getVars)
    {
        // Start of user code Setter HttpRequest.setGetVars
        // End of user code
        $this->getVars = $getVars;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        // Start of user code Getter HttpRequest.getHost
        // End of user code
        return $this->host;
    }

    /**
     * @param string $host
     */
    public function setHost($host)
    {
        // Start of user code Setter HttpRequest.setHost
        // End of user code
        $this->host = $host;
    }

    /**
     * @return string
     */
    public function getRequestUri()
    {
        // Start of user code Getter HttpRequest.getRequestUri
        // End of user code
        return $this->requestUri;
    }

    /**
     * @param string $requestUri
     */
    public function setRequestUri($requestUri)
    {
        // Start of user code Setter HttpRequest.setRequestUri
        // End of user code
        $this->requestUri = $requestUri;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        // Start of user code Getter HttpRequest.getMethod
        // End of user code
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod($method)
    {
        // Start of user code Setter HttpRequest.setMethod
        // End of user code
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getHttpVersion()
    {
        // Start of user code Getter HttpRequest.getHttpVersion
        // End of user code
        return $this->httpVersion;
    }

    /**
     * @param string $httpVersion
     */
    public function setHttpVersion($httpVersion)
    {
        // Start of user code Setter HttpRequest.setHttpVersion
        // End of user code
        $this->httpVersion = $httpVersion;
    }

    /**
     * Return an HttpRequest instance that represent client request
     *
     * @return HttpRequest $httpRequest
     */
    public static function createFromClientRequest()
    {
        // Start of user code HttpRequest.createFromClientRequest
        $httpRequest = new self();
        $httpRequest->setMethod($_SERVER['REQUEST_METHOD']);
        $httpRequest->setRequestUri($_SERVER['REQUEST_URI']);
        $httpRequest->setHttpVersion($_SERVER['SERVER_PROTOCOL']);
        $httpRequest->setHeaders(new AssociativeArray('string'));
        
        foreach ($_SERVER as $key => $value) {
            if (preg_match('/^HTTP_([A-Z_]+)$/', $key, $matches)) {
                $key = str_replace('_', ' ', $matches[1]);
                $key = ucwords(strtolower($key));
                $key = str_replace(' ', '-', $key);
                $httpRequest->getHeaders()->set($key, $value);
            }
        }
            
        $httpRequest->setHost($httpRequest->getHeaders()->get('Host'));
        if (!empty($_GET)) {
            $httpRequest->setGetVars(
                AssociativeArray::createFromNativeArray('string', $_GET)
            );
        }
        if (!empty($_POST)) {
            $httpRequest->setPostVars(
                AssociativeArray::createFromNativeArray('string', $_POST)
            );
        }
        // End of user code
    
        return $httpRequest;
    }

    // Start of user code HttpRequest.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
