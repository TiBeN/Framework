<?php

namespace TiBeN\Framework\Router;


/**
 * Contain methods to manipulate ressources URIs
 *
 * @package Router
 * @author TiBeN
 */
class RouteUriManager
{
    public function __construct()
    {
        // Start of user code RouteUriManager.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code RouteUriManager.destructor
        // End of user code
    }

    /**
     * Generate an uri from an uri pattern and optional variables.
     *
     * @param string $uriPattern
     * @param AssociativeArray $variables
     * @return string $uri
     */
    public static function generateUri($uriPattern, AssociativeArray $variables)
    {
        // Start of user code RouteUriManager.generateUri
        // TODO should be implemented.
        // End of user code
    
        return $uri;
    }

    /**
     * Test an uri against an uri pattern and optionnal variables requirments 
     * then return parsed variables if match.
     *
     * @param string $uri
     * @param string $uriPattern
     * @param AssociativeArray $requirments
     * @return RouteUriMatchAndParseResult $matchResult
     */
    public static function matchAndParseUri($uri, $uriPattern, AssociativeArray $requirments)
    {
        // Start of user code RouteUriManager.matchAndParseUri
        // TODO should be implemented.
        // End of user code
    
        return $matchResult;
    }

    // Start of user code RouteUriManager.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
