<?php

namespace TiBeN\Framework\Router;

use TiBeN\Framework\Controller\Controller;

/**
 * Service responsible of transforming HttpRequest to HttpResponses.
 * The router contain methods to handle HttpRequest, Generate ressources uris,
 * control the action flow (follows, redirections) using RouteRules Définitions.   
 *
 * @package Router
 * @author TiBeN
 */
class Router
{
    /**
     * @var array
     */
    public static $routeRules;

    public function __construct()
    {
        // Start of user code Router.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code Router.destructor
        // End of user code
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
     * Return a route rule from her name
     *
     * @param string $routeName
     * @return RouteRule $routeRule
     */
    public static function getRouteRuleByName($routeName)
    {
        // Start of user code Router.getRouteRuleByName
        // TODO should be implemented.
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
    public static function generateUri($routeName, AssociativeArray $variables)
    {
        // Start of user code Router.generateUri
        // TODO should be implemented.
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
        // TODO should be implemented.
        // End of user code
    }

    /**
     * Search route as requested by client Http request then follow it.
     */
    public static function handleCurrentHttpRequest()
    {
        // Start of user code Router.handleCurrentHttpRequest
        // TODO should be implemented.
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
        // TODO should be implemented.
        // End of user code
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
        // TODO should be implemented.
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
        // TODO should be implemented.
        // End of user code
    }

    // Start of user code Router.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
