<?php

namespace TiBeN\Framework\Router;

use TiBeN\Framework\Package\PackageInitializer;

// Start of user code RouterPackageInitializer.useStatements
use TiBeN\Framework\ServiceContainer\ServiceContainer;

// End of user code

/**
 * 
 *
 * @package TiBeN\Framework\Router
 * @author TiBeN
 */
class RouterPackageInitializer implements PackageInitializer
{
    /**
     * @var string
     */
    public $routeRulesFilePath;

    public function __construct($routeRulesFilePath)
    {
        // Start of user code RouterPackageInitializer.constructor
        $this->routeRulesFilePath = $routeRulesFilePath;
        // End of user code
    }

    /**
     * @return string
     */
    public function getRouteRulesFilePath()
    {
        // Start of user code Getter RouterPackageInitializer.getRouteRulesFilePath
        // End of user code
        return $this->routeRulesFilePath;
    }

    /**
     * @param string $routeRulesFilePath
     */
    public function setRouteRulesFilePath($routeRulesFilePath)
    {
        // Start of user code Setter RouterPackageInitializer.setRouteRulesFilePath
        // End of user code
        $this->routeRulesFilePath = $routeRulesFilePath;
    }

    // PackageInitializer Realization

    /**
     * Execute initialisation process of a package
     */
    public function init()
    {
        // Start of user code PackageInitializer.init
        ServiceContainer::register(
            'route-uri-manager',
            'TiBeN\\Framework\\Router\\RouteUriManager'
        );
        ServiceContainer::register(
            'router',
            'TiBeN\\Framework\\Router\\Router',
            array('@route-uri-manager')
        );

        require($this->routeRulesFilePath);
        // End of user code
    }

    // Start of user code RouterPackageInitializer.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
