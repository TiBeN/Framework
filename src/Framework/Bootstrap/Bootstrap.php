<?php

namespace TiBeN\Framework\Bootstrap;

use TiBeN\Framework\Renderer\TemplateRenderer;
use TiBeN\Framework\Validation\ValidatorsRegistry;
use TiBeN\Framework\DataSource\DataSourceTypeConvertersRegistry;
use TiBeN\Framework\Router\Router;
use TiBeN\Framework\Renderer\SmartyEngine;
use TiBeN\Framework\Router\Route;

// Start of user code Bootstrap.useStatements
// Place your use statements here.
// End of user code

/**
 * Load application configuration and perform
 * needed booting tasks
 *
 * @package TiBeN\Framework\Bootstrap
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

        // Some notes about the initialisation code below:
        // 
        // Theses initialisation steps are for most specific to some core 
        // packages but add some unnessessary coupling and
        // should be located into a class in their owning packages
        // when a package init system will be taken in place 

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

        // Declare built-in mysql dataSource type converters
        DataSourceTypeConvertersRegistry::registerTypeConverter(
            new \TiBeN\Framework\DataSource\MysqlDataSource\TypeConverter\BooleanConverter()
        );
        DataSourceTypeConvertersRegistry::registerTypeConverter(
            new \TiBeN\Framework\DataSource\MysqlDataSource\TypeConverter\IntegerConverter()
        );
        DataSourceTypeConvertersRegistry::registerTypeConverter(
            new \TiBeN\Framework\DataSource\MysqlDataSource\TypeConverter\DecimalConverter()
        );
        DataSourceTypeConvertersRegistry::registerTypeConverter(
            new \TiBeN\Framework\DataSource\MysqlDataSource\TypeConverter\StringConverter()
        );
        DataSourceTypeConvertersRegistry::registerTypeConverter(
            new \TiBeN\Framework\DataSource\MysqlDataSource\TypeConverter\DateTimeConverter()
        );

        ValidatorsRegistry::registerValidator(
            new \TiBeN\Framework\Validation\NotEmptyValidator()
        );
        
        ValidatorsRegistry::registerValidator(
            new \TiBeN\Framework\Validation\StringLengthValidator()
        );

        ValidatorsRegistry::registerValidator(
            new \TiBeN\Framework\Validation\NumericRangeValidator()
        );
        // End of user code
    }

    // Start of user code Bootstrap.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
