<?php

namespace TiBeN\Framework\Router;


/**
 * Holds rules and conditions 
 * to match an URI with a ressource.
 *
 * @package Router
 * @author TiBeN
 */
class RouteRule
{
    /**
     * @var string
     */
    public $controller;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $uriPattern;

    /**
     * @var AssociativeArray
     */
    public $requirments;

    /**
     * @var string
     */
    public $action;

    /**
     * @var string
     */
    public $host;

    /**
     * @var AssociativeArray
     */
    public $defaultVariables;

    /**
     * @var string
     */
    public $method;

    public function __construct()
    {
        // Start of user code RouteRule.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code RouteRule.destructor
        // End of user code
    }

    /**
     * @return string
     */
    public function getController()
    {
        // Start of user code Getter RouteRule.getController
        // End of user code
        return $this->controller;
    }

    /**
     * @param string $controller
     */
    public function setController($controller)
    {
        // Start of user code Setter RouteRule.setController
        // End of user code
        $this->controller = $controller;
    }

    /**
     * @return string
     */
    public function getName()
    {
        // Start of user code Getter RouteRule.getName
        // End of user code
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        // Start of user code Setter RouteRule.setName
        // End of user code
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getUriPattern()
    {
        // Start of user code Getter RouteRule.getUriPattern
        // End of user code
        return $this->uriPattern;
    }

    /**
     * @param string $uriPattern
     */
    public function setUriPattern($uriPattern)
    {
        // Start of user code Setter RouteRule.setUriPattern
        // End of user code
        $this->uriPattern = $uriPattern;
    }

    /**
     * @return AssociativeArray
     */
    public function getRequirments()
    {
        // Start of user code Getter RouteRule.getRequirments
        // End of user code
        return $this->requirments;
    }

    /**
     * @param AssociativeArray $requirments
     */
    public function setRequirments(AssociativeArray $requirments)
    {
        // Start of user code Setter RouteRule.setRequirments
        // End of user code
        $this->requirments = $requirments;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        // Start of user code Getter RouteRule.getAction
        // End of user code
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction($action)
    {
        // Start of user code Setter RouteRule.setAction
        // End of user code
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        // Start of user code Getter RouteRule.getHost
        // End of user code
        return $this->host;
    }

    /**
     * @param string $host
     */
    public function setHost($host)
    {
        // Start of user code Setter RouteRule.setHost
        // End of user code
        $this->host = $host;
    }

    /**
     * @return AssociativeArray
     */
    public function getDefaultVariables()
    {
        // Start of user code Getter RouteRule.getDefaultVariables
        // End of user code
        return $this->defaultVariables;
    }

    /**
     * @param AssociativeArray $defaultVariables
     */
    public function setDefaultVariables(AssociativeArray $defaultVariables)
    {
        // Start of user code Setter RouteRule.setDefaultVariables
        // End of user code
        $this->defaultVariables = $defaultVariables;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        // Start of user code Getter RouteRule.getMethod
        // End of user code
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod($method)
    {
        // Start of user code Setter RouteRule.setMethod
        // End of user code
        $this->method = $method;
    }

    /**
     * Generate the Route from the RouteRule and optional variables
     *
     * @param AssociativeArray $variables
     * @return Route $route
     */
    public function getRoute(AssociativeArray $variables)
    {
        // Start of user code RouteRule.getRoute
        // TODO should be implemented.
        // End of user code
    
        return $route;
    }

    /**
     * Test if the routerule match an HttpRequest then return the associated route.
     *
     * @param HttpRequest $httpRequest
     * @return Route $route
     */
    public function matchHttpRequest(HttpRequest $httpRequest)
    {
        // Start of user code RouteRule.matchHttpRequest
        // TODO should be implemented.
        // End of user code
    
        return $route;
    }

    /**
     * @param AssociativeArray $config
     * @return RouteRule $routeRule
     */
    public static function create(AssociativeArray $config)
    {
        // Start of user code RouteRule.create
        // TODO should be implemented.
        // End of user code
    
        return $routeRule;
    }

    // Start of user code RouteRule.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
