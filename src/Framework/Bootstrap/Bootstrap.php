<?php

namespace TiBeN\Framework\Bootstrap;

use TiBeN\Framework\Router\Route;
use TiBeN\Framework\Router\Router;

/**
 * Load application configuration and perform
 * needed booting tasks
 *
 * @package Bootstrap
 * @author TiBeN
 */
class Bootstrap
{
    public function __construct()
    {
        // Start of user code Bootstrap.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code Bootstrap.destructor
        // End of user code
    }

    /**
     * Init The booting process of the Framework.
     * Allways call this before use any component.
     *
     * @param string $configFolder
     */
    public static function init($configFolder)
    {
        // Start of user code Bootstrap.init
        
        // Configure specials Router routes with default
        // controller bundled with the framework. Theses can
        // be customized using the routeRules config file
        $onNotFoundRoute = new Route(); 
        $onNotFoundRoute->setController(
            'TiBeN\\Framework\\Controller\\RouterSpecialEventsController'
        ); 
        $onNotFoundRoute->setAction('onNotFound');
        Router::setOnNotFoundRoute($onNotFoundRoute);
        
        $onExecuteActionExceptionRoute = new Route();
        $onExecuteActionExceptionRoute->setController(
            'TiBeN\\Framework\\Controller\\RouterSpecialEventsController'
        );
        $onExecuteActionExceptionRoute->setAction('onExecuteActionException');
        Router::setOnExecuteActionExceptionRoute($onExecuteActionExceptionRoute);

        // Load application route rules config file
        $appRouteRulesConfigFile = $configFolder 
            . DIRECTORY_SEPARATOR 
            . 'routeRules.php'
        ;
        if (file_exists($appRouteRulesConfigFile)) {
            include($appRouteRulesConfigFile);
        }
        // End of user code
    }

    // Start of user code Bootstrap.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
