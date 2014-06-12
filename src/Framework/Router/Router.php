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
     * Route who is followed when an exception is thrown during
     * the execution of an action.
     * @var Route
     */
    public static $onExecuteActionExceptionRoute;

    /**
     * @var array
     */
    public static $routeRules;

    /**
     * Route who is followed when the initial Route is not found 
     * @var Route
     */
    public static $onNotFoundRoute;

    /**
     * @return Route
     */
    public static function getOnExecuteActionExceptionRoute()
    {
        // Start of user code Static getter Router.getOnExecuteActionExceptionRoute
        // End of user code
        return self::$onExecuteActionExceptionRoute;
    }

    /**
     * @param Route $onExecuteActionExceptionRoute
     */
    public static function setOnExecuteActionExceptionRoute(Route $onExecuteActionExceptionRoute)
    {
        // Start of user code Static setter Router.setOnExecuteActionExceptionRoute
        // End of user code
        self::$onExecuteActionExceptionRoute = $onExecuteActionExceptionRoute;
    }

    /**
     * @return array
     */
    public static function getRouteRules()
    {
        // Start of user code Static getter Router.getRouteRules
        // End of user code
        return self::$routeRules;
    }

    /**
     * @param array $routeRules
     */
    public static function setRouteRules(array $routeRules)
    {
        // Start of user code Static setter Router.setRouteRules
        // End of user code
        self::$routeRules = $routeRules;
    }

    /**
     * @return Route
     */
    public static function getOnNotFoundRoute()
    {
        // Start of user code Static getter Router.getOnNotFoundRoute
        // End of user code
        return self::$onNotFoundRoute;
    }

    /**
     * @param Route $onNotFoundRoute
     */
    public static function setOnNotFoundRoute(Route $onNotFoundRoute)
    {
        // Start of user code Static setter Router.setOnNotFoundRoute
        // End of user code
        self::$onNotFoundRoute = $onNotFoundRoute;
    }

    /**
     * Search route as requested by client Http request then follow it.
     */
    public static function handleCurrentHttpRequest()
    {
        // Start of user code Router.handleCurrentHttpRequest
        $httpRequest = HttpRequest::createFromClientRequest();
        
        if (isset(self::$routeRules)) {
            foreach (self::$routeRules as $routeRule) {
                $matchResult = $routeRule->matchHttpRequest($httpRequest);
                if ($matchResult instanceof Route) {
                    $route = $matchResult;
                    break;                      
                }
            }
        }
        
        // Define special route when not found or throw not found exception 
        if (!isset($route)) {
            if (self::$onNotFoundRoute instanceof Route) {
                $route = self::$onNotFoundRoute;
            } else {
                throw new \RuntimeException('No route match current request');
            }
        }
        
        self::followRoute($route);
        // End of user code
    }

    /**
     * Generate a ressource URI from it's routerule name and optional variables.
     *
     * @param string $routeName
     * @param AssociativeArray $variables
     * @return string $uri
     */
    public static function generateUri($routeName, AssociativeArray $variables)
    {
        // Start of user code Router.generateUri
        $routeRule = self::getRouteRuleByName($routeName);
        $routeUriManager = new RouteUriManager();
        $uri = $routeUriManager->generateUri($routeRule->getUriPattern(), $variables);
        // End of user code
    
        return $uri;
    }

    /**
     * Execute the action of the controller specified by the route then send the generated Http response to client  
     *
     * @param Route $route
     */
    public static function followRoute(Route $route)
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
            if (self::$onExecuteActionExceptionRoute instanceof Route) {    
                $errorRoute = self::$onExecuteActionExceptionRoute;
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
                self::followRoute($errorRoute);
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
     * Find a route by her name and optionnal variables then follow it. This method can by used to control the controller / action flow.    
     *
     * @param string $routeName
     * @param AssociativeArray $variables
     */
    public static function forwardToRoute($routeName, AssociativeArray $variables)
    {
        // Start of user code Router.forwardToRoute
        $routeRule = self::getRouteRuleByName($routeName);
        $route = $routeRule->getRoute($variables);
        self::followRoute($route);
        // End of user code
    }

    /**
     * Return a route rule from her name
     *
     * @param string $routeName
     * @return RouteRule $routeRule
     */
    public static function getRouteRuleByName($routeName)
    {
        // Start of user code Router.getRouteRuleByName
        if (isset(self::$routeRules) && !empty(self::$routeRules)) {
            foreach (self::$routeRules as $routeRuleCandidate) {
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
     * Send a redirect 302 http response to the route specified by her name and optionnal variables
     *
     * @param string $routeName
     * @param AssociativeArray $variables
     */
    public static function redirectToRoute($routeName, AssociativeArray $variables)
    {
        // Start of user code Router.redirectToRoute
        $uri = self::generateUri($routeName, $variables);
        $redirectResponse = HttpResponse::createRedirectResponse($uri, false);
        $redirectResponse->sendToClient();          
        // End of user code
    }

    /**
     * Add a route rule to the route rule collection
     *
     * @param RouteRule $routeRule
     */
    public static function addRouteRule(RouteRule $routeRule)
    {
        // Start of user code Router.addRouteRule
        if (!isset(self::$routeRules)) {
            self::$routeRules = array();
        }
        array_push(self::$routeRules, $routeRule);
        // End of user code
    }

    // Start of user code Router.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
