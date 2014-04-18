<?php

namespace TiBeN\Framework\Router;

use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code RouteRule.useStatements
// Place your use statements here.
// End of user code

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
    public $uriPattern;

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
    public $controller;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $action;

    /**
     * @var string
     */
    public $method;

    /**
     * @var AssociativeArray
     */
    public $requirments;

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
     * Generate the Route from the RouteRule and optional variables
     *
     * @param AssociativeArray $variables
     * @return Route $route
     */
    public function getRoute(AssociativeArray $variables)
    {
        // Start of user code RouteRule.getRoute
        $route = new Route();
        $route->setController($this->controller);
        $route->setAction($this->action);
        $route->setVariables($variables); 
        // End of user code
    
        return $route;
    }

    /**
     * Create a new Routerule from an 
     * AssociativeArray of configuration. 
     *
     * @param AssociativeArray $config
     * @return RouteRule $routeRule
     */
    public static function create(AssociativeArray $config)
    {
        // Start of user code RouteRule.create
        $routeRule = new self();
            
        if ($config->has('name')) {
            $routeRule->setName($config->get('name'));
        }
        
        if ($config->has('uri-pattern')) {
            $routeRule->setUriPattern($config->get('uri-pattern'));
        }           
        
        if ($config->has('controller')) {
            $routeRule->setController($config->get('controller'));
        }
        
        if ($config->has('action')) {
            $routeRule->setAction($config->get('action'));
        }           
        
        if ($config->has('method')) {
            $routeRule->setMethod($config->get('method'));
        }           
        
        if ($config->has('host')) {
            $routeRule->setHost($config->get('host'));
        }           
        
        if ($config->has('requirments')) {
            $routeRule->setRequirments(AssociativeArray::createFromNativeArray(
                null, 
                $config->get('requirments'))
            );
        }           
        
        if ($config->has('default-variables')) {
            $routeRule->setDefaultVariables(AssociativeArray::createFromNativeArray(
                null, 
                $config->get('default-variables'))
            );
        }
        // End of user code
    
        return $routeRule;
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
        
        // Testing RouteRule validity
        if (!isset($this->name) || empty($this->name)) {
            throw new \DomainException('Invalid RouteRule : a name must be set');
        }

        if (!isset($this->controller) || empty($this->controller)) {
            throw new \DomainException(
                sprintf('Invalid RouteRule "%s" : a controller must be set', $this->name)
            );
        }
        
        if (!isset($this->action) || empty($this->action)) {
            throw new \DomainException(
                sprintf('Invalid RouteRule "%s" : an action must be set', $this->name)
            );
        }
        
        if (!isset($this->uriPattern) || empty($this->uriPattern)) {
            throw new \DomainException(
                sprintf('Invalid RouteRule "%s" : an uri pattern must be set', $this->name)
            );
        }           
        
        // Testing HttpRequest
        if (isset($this->method) && ($this->method != $httpRequest->getMethod())) {
            return false;
        }
        
        if (isset($this->host) && ($this->host != $httpRequest->getHost())) {
            return false;
        }

        $routeUriManager = new RouteUriManager();
        $matchUriResult = $routeUriManager->matchAndParseUri(
            $httpRequest->getRequestUri(), 
            $this->uriPattern, 
            isset($this->requirments) ? $this->requirments : new AssociativeArray('string')
        );
        
        if (!$matchUriResult->getMatch()) {
            return false;
        }
        
        $route = new Route();
        $route->setController($this->controller);
        $route->setAction($this->action);
        
        $variables = $matchUriResult->getParsedVariables();
        
        if (isset($this->defaultVariables) && !$this->defaultVariables->isEmpty()) {
            $variables->merge($this->defaultVariables);             
        }
        
        if (!$variables->isEmpty()) {
            $route->setVariables($variables);
        }
        // End of user code
    
        return $route;
    }

    // Start of user code RouteRule.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
