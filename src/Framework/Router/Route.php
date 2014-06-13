<?php

namespace TiBeN\Framework\Router;

use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code Route.useStatements
// Place your use statements here.
// End of user code

/**
 * Represent a route to launch a ressource.
 * Contain controller + action name to execute and 
 * optional variables needed by the action.    
 *
 * @package TiBeN\Framework\Router
 * @author TiBeN
 */
class Route
{
    /**
     * @var string
     */
    public $action;

    /**
     * @var AssociativeArray
     */
    public $variables;

    /**
     * @var string
     */
    public $controller;

    /**
     * @return string
     */
    public function getAction()
    {
        // Start of user code Getter Route.getAction
        // End of user code
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction($action)
    {
        // Start of user code Setter Route.setAction
        // End of user code
        $this->action = $action;
    }

    /**
     * @return AssociativeArray
     */
    public function getVariables()
    {
        // Start of user code Getter Route.getVariables
        // End of user code
        return $this->variables;
    }

    /**
     * @param AssociativeArray $variables
     */
    public function setVariables(AssociativeArray $variables)
    {
        // Start of user code Setter Route.setVariables
        // End of user code
        $this->variables = $variables;
    }

    /**
     * @return string
     */
    public function getController()
    {
        // Start of user code Getter Route.getController
        // End of user code
        return $this->controller;
    }

    /**
     * @param string $controller
     */
    public function setController($controller)
    {
        // Start of user code Setter Route.setController
        // End of user code
        $this->controller = $controller;
    }

    /**
     * @return bool $bool
     */
    public function hasVariables()
    {
        // Start of user code Route.hasVariables
        $bool = (isset($this->variables) && !empty($this->variables))
            ? true
            : false
        ;
        // End of user code
    
        return $bool;
    }

    // Start of user code Route.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
