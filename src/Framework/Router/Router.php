<?php

namespace TiBeN\Framework\Router;

use TiBeN\Framework\Controller\Controller;
use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code Router.useStatements
// Place your use statements here.
// End of user code

/**
 * Service responsible of transforming HttpRequest to HttpResponses.
 * The router contain methods to handle HttpRequest, Generate ressources uris,
 * control the action flow (follows, redirections) using RouteRules Définitions.   
 *
 * @package TiBeN\Framework\Router
 * @author TiBeN
 */
class Router
{
    /**
     * @var RouteUriManager
     */
    public $routeUriManager;

    /**
     * Route who is followed when an exception is thrown during
     * the execution of an action.
     * @var Route
     */
    public $onExecuteActionExceptionRoute;

    /**
     * @var array
     */
    public $routeRules;

    /**
     * Route who is followed when the initial Route is not found 
     * @var Route
     */
    public $onNotFoundRoute;

    public function __construct(RouteUriManager $routeUriManager)
    {
        // Start of user code Router.constructor
        $this->routeUriManager = $routeUriManager;
        $this->routeRules = array();
        // End of user code
    }

    /**
     * @return RouteUriManager
     */
    public function getRouteUriManager()
    {
        // Start of user code Getter Router.getRouteUriManager
        // End of user code
        return $this->routeUriManager;
    }

    /**
     * @param RouteUriManager $routeUriManager
     */
    public function setRouteUriManager(RouteUriManager $routeUriManager)
    {
        // Start of user code Setter Router.setRouteUriManager
        // End of user code
        $this->routeUriManager = $routeUriManager;
    }

    /**
     * @return Route
     */
    public function getOnExecuteActionExceptionRoute()
    {
        // Start of user code Getter Router.getOnExecuteActionExceptionRoute
        // End of user code
        return $this->onExecuteActionExceptionRoute;
    }

    /**
     * @param Route $onExecuteActionExceptionRoute
     */
    public function setOnExecuteActionExceptionRoute(Route $onExecuteActionExceptionRoute)
    {
        // Start of user code Setter Router.setOnExecuteActionExceptionRoute
        // End of user code
        $this->onExecuteActionExceptionRoute = $onExecuteActionExceptionRoute;
    }

    /**
     * @return array
     */
    public function getRouteRules()
    {
        // Start of user code Getter Router.getRouteRules
        // End of user code
        return $this->routeRules;
    }

    /**
     * @param array $routeRules
     */
    public function setRouteRules(array $routeRules)
    {
        // Start of user code Setter Router.setRouteRules
        // End of user code
        $this->routeRules = $routeRules;
    }

    /**
     * @return Route
     */
    public function getOnNotFoundRoute()
    {
        // Start of user code Getter Router.getOnNotFoundRoute
        // End of user code
        return $this->onNotFoundRoute;
    }

    /**
     * @param Route $onNotFoundRoute
     */
    public function setOnNotFoundRoute(Route $onNotFoundRoute)
    {
        // Start of user code Setter Router.setOnNotFoundRoute
        // End of user code
        $this->onNotFoundRoute = $onNotFoundRoute;
    }

    /**
     * Find a route by her name and optionnal variables then follow it. This method can by used to control the controller / action flow.    
     *
     * @param string $routeName
     * @param AssociativeArray $variables
     */
    public function forwardToRoute($routeName, AssociativeArray $variables)
    {
        // Start of user code Router.forwardToRoute
        $routeRule = $this->getRouteRuleByName($routeName);
        $route = $routeRule->getRoute($variables);
        $this->followRoute($route);
        // End of user code
    }

    /**
     * Add a route rule to the route rule collection
     *
     * @param RouteRule $routeRule
     */
    public function addRouteRule(RouteRule $routeRule)
    {
        // Start of user code Router.addRouteRule
        if (!isset($this->routeRules)) {
            $this->routeRules = array();
        }
        array_push($this->routeRules, $routeRule);
        // End of user code
    }

    /**
     * Execute the action of the controller specified by the route then send the generated Http response to client  
     *
     * @param Route $route
     */
    public function followRoute(Route $route)
    {
        // Start of user code Router.followRoute
        $controllerName = ucfirst($route->getController());
        
        if (!class_exists($controllerName)) {
            throw new \InvalidArgumentException(
                sprintf('No Controller named "%s" exist', $controllerName)
            );
        }
        
        $actionName = $route->getAction();
        
        if (!method_exists($controllerName, $actionName)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'No Action named "%s" exist in controller %s', 
                    $actionName, 
                    $controllerName
                )
            );
        }
        
        $controller = new $controllerName;
        
        try {
            $httpResponse = $controller->$actionName(
                $route->hasVariables() 
                    ? $route->getVariables() 
                    : new AssociativeArray('string')
            );
            $httpResponse->sendToClient();
        }
        catch (\Exception $e) {
            if ($this->onExecuteActionExceptionRoute instanceof Route) {    
                $errorRoute = $this->onExecuteActionExceptionRoute;
                $errorRoute->setVariables(AssociativeArray::createFromNativeArray(
                    'string',
                    array(
                        'type' => get_class($e),
                        'code' => (string) $e->getCode(),
                        'message' => $e->getMessage(),
                        'file' => $e->getFile(),
                        'controller' => $controllerName,
                        'action' => $actionName
                    )
                ));
                $this->followRoute($errorRoute);
            } else {
                throw new \RuntimeException(
                    sprintf(    
                        'An exception has been thrown when executing %s::%s : "%s : %s"',
                        $controllerName,
                        $actionName,
                        get_class($e),
                        $e->getMessage()
                    )
                );
            }
        }
        // End of user code
    }

    /**
     * Search route as requested by client Http request then follow it.
     */
    public function handleCurrentHttpRequest()
    {
        // Start of user code Router.handleCurrentHttpRequest
        $httpRequest = HttpRequest::createFromClientRequest();
        
        if (isset($this->routeRules)) {
            foreach ($this->routeRules as $routeRule) {
                $matchResult = $routeRule->matchHttpRequest($httpRequest);
                if ($matchResult instanceof Route) {
                    $route = $matchResult;
                    break;                      
                }
            }
        }
        
        // Define special route when not found or throw not found exception 
        if (!isset($route)) {
            if ($this->onNotFoundRoute instanceof Route) {
                $route = $this->onNotFoundRoute;
            } else {
                throw new \RuntimeException('No route match current request');
            }
        }
        
        $this->followRoute($route);
        // End of user code
    }

    /**
     * Return a route rule from her name
     *
     * @param string $routeName
     * @return RouteRule $routeRule
     */
    public function getRouteRuleByName($routeName)
    {
        // Start of user code Router.getRouteRuleByName
        if (isset($this->routeRules) && !empty($this->routeRules)) {
            foreach ($this->routeRules as $routeRuleCandidate) {
                if ($routeName == $routeRuleCandidate->getName()) {
                    $routeRule = $routeRuleCandidate;
                    break;
                }
            }
        }
        
        if (!isset($routeRule)) {
            throw new \InvalidArgumentException(
                sprintf('No RouteRule named "%s" exist', $routeName)
            );
        }
        // End of user code
    
        return $routeRule;
    }

    /**
     * Generate a ressource URI from it's routerule name and optional variables.
     *
     * @param string $routeName
     * @param AssociativeArray $variables
     * @return string $uri
     */
    public function generateUri($routeName, AssociativeArray $variables)
    {
        // Start of user code Router.generateUri
        $routeRule = $this->getRouteRuleByName($routeName);
        $uri = $this->routeUriManager
            ->generateUri($routeRule->getUriPattern(), $variables)
        ;
        // End of user code
    
        return $uri;
    }

    /**
     * Send a redirect 302 http response to the route specified by her name and optionnal variables
     *
     * @param string $routeName
     * @param AssociativeArray $variables
     */
    public function redirectToRoute($routeName, AssociativeArray $variables)
    {
        // Start of user code Router.redirectToRoute
        $uri = $this->generateUri($routeName, $variables);
        $redirectResponse = HttpResponse::createRedirectResponse($uri, false);
        $redirectResponse->sendToClient();          
        // End of user code
    }

    // Start of user code Router.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
