<?php

namespace TiBeN\Framework\Bootstrap;

use TiBeN\Framework\Router\Route;
use TiBeN\Framework\Renderer\SmartyEngine;
use TiBeN\Framework\Renderer\TemplateRenderer;
use TiBeN\Framework\Router\Router;

// Start of user code Bootstrap.useStatements
// Place your use statements here.
// End of user code

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
     * @param string $configDirectory
     * @param string $tempDirectory
     */
    public static function init($configDirectory, $tempDirectory)
    {
        // Start of user code Bootstrap.init

        // Instanciate and set default template engine
        $templateTempDirectory = $tempDirectory
            . DIRECTORY_SEPARATOR
            . 'smarty_templates'
        ;    
        if (!file_exists($templateTempDirectory)) {
            if (!@mkdir($templateTempDirectory, 0777, true)) {
                throw new \RuntimeException($tempDirectory . ' is not writable');
            }
        }

        $smartyEngine = new SmartyEngine();
        $smartyEngine->setTempDirectory($templateTempDirectory);
       
        TemplateRenderer::setDefaultTemplateEngine($smartyEngine);

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
        $appRouteRulesConfigFile = $configDirectory 
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
