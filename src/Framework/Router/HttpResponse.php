<?php

namespace TiBeN\Framework\Router;

use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code HttpResponse.useStatements
// Place your use statements here.
// End of user code

/**
 * Represent an HttpResponse. 
 * Factory Method createRedirectResponse can be used to instantiate a redirect response. 
 *
 * @package TiBeN\Framework\Router
 * @author TiBeN
 */
class HttpResponse
{
    /**
     * @var string
     */
    public $contentType = 'text/html';

    /**
     * @var string
     */
    public $statusCode = '200';

    /**
     * @var AssociativeArray
     */
    public $headers;

    /**
     * @var string
     */
    public $message;

    /**
     * @return string
     */
    public function getContentType()
    {
        // Start of user code Getter HttpResponse.getContentType
        // End of user code
        return $this->contentType;
    }

    /**
     * @param string $contentType
     */
    public function setContentType($contentType)
    {
        // Start of user code Setter HttpResponse.setContentType
        // End of user code
        $this->contentType = $contentType;
    }

    /**
     * @return string
     */
    public function getStatusCode()
    {
        // Start of user code Getter HttpResponse.getStatusCode
        // End of user code
        return $this->statusCode;
    }

    /**
     * @param string $statusCode
     */
    public function setStatusCode($statusCode)
    {
        // Start of user code Setter HttpResponse.setStatusCode
        // End of user code
        $this->statusCode = $statusCode;
    }

    /**
     * @return AssociativeArray
     */
    public function getHeaders()
    {
        // Start of user code Getter HttpResponse.getHeaders
        // End of user code
        return $this->headers;
    }

    /**
     * @param AssociativeArray $headers
     */
    public function setHeaders(AssociativeArray $headers)
    {
        // Start of user code Setter HttpResponse.setHeaders
        // End of user code
        $this->headers = $headers;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        // Start of user code Getter HttpResponse.getMessage
        // End of user code
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        // Start of user code Setter HttpResponse.setMessage
        // End of user code
        $this->message = $message;
    }

    /**
     * Create an HttpResponse configured to send content of type contentType as file named fileName 
     * Typically open a download box using common browsers. 
     *
     * @param string $fileName
     * @param string $contentType
     * @param string $content
     * @return HttpResponse $httpResponse
     */
    public static function createDownloadFileResponse($fileName, $contentType, $content)
    {
        // Start of user code HttpResponse.createDownloadFileResponse
        $httpResponse = new self();
        $httpResponse->setContentType($contentType);
        $httpResponse->setHeaders(
            AssociativeArray::createFromNativeArray(
                'string', 
                array(
                    'content-Disposition' => sprintf(
                        'attachment; filename="%s"', 
                        $fileName
                    )
                )
            )
        );
        $httpResponse->setMessage($content);
        // End of user code
    
        return $httpResponse;
    }

    /**
     * Send the http response message to the client
     */
    public function sendToClient()
    {
        // Start of user code HttpResponse.sendToClient
        
        // Set http response status code
        header('HTTP/1.1 ' . $this->statusCode .' ');
        
        // Set http content-type
        header('Content-type: ' . $this->contentType);
        
        // Set custom headers
        if(isset($this->headers)) {
            foreach($this->headers->toNativeArray() as $key => $value) {
                header(sprintf('%s: %s', ucfirst($key), $value));
            }
        }       
        
        // Send content
        if(isset($this->message)) {
            echo $this->message;
        }
        
        return;
        // End of user code
    }

    /**
     * Create an HttpResponse object configured to send a type redirect 302 response  
     *
     * @param string $uri
     * @param bool $permanent
     * @return HttpResponse $httpResponse
     */
    public static function createRedirectResponse($uri, $permanent)
    {
        // Start of user code HttpResponse.createRedirectResponse
        $httpResponse = new self();         
        $httpResponse->setStatusCode($permanent ? '301' : '302');
        $httpResponse->setHeaders(
            AssociativeArray::createFromNativeArray('string', array('location' => $uri))
        );
        // End of user code
    
        return $httpResponse;
    }

    // Start of user code HttpResponse.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
