<?php

namespace TiBeN\Framework\Renderer;

use TiBeN\Framework\Router\Router;
use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code SmartyUriHandler.useStatements
use \Smarty_Internal_Template as Smarty_Internal_Template;

// End of user code

/**
 * Bridge between Smarty and the uri generation that offer the Router. 
 * Allow generating uris inside templates.
 *
 * @package TiBeN\Framework\Renderer
 * @author TiBeN
 */
class SmartyUriHandler
{

    /**
     * Get a ressource uri from its name and variables
     *
     * @param array $parameters
     * @param Smarty_Internal_Template $smarty
     * @return string $uri
     */
    public function getUri(array $parameters, Smarty_Internal_Template $smarty)
    {
        // Start of user code SmartyUriHandler.getUri
        if (!isset($parameters['name'])) {
            throw new \InvalidArgumentException('No route rule name set');
        }
        
        $routeName = $parameters['name'];
        unset($parameters['name']);
                    
        $uri = Router::generateUri(
            $routeName, 
            AssociativeArray::createFromNativeArray('string',  $parameters)
        );
        // End of user code
    
        return $uri;
    }

    // Start of user code SmartyUriHandler.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
