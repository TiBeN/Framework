<?php

namespace TiBeN\Framework\ServiceContainer;

use TiBeN\Framework\Package\PackageInitializer;

// Start of user code ServiceContainerPackageInitializer.useStatements
// Place your use statements here.
// End of user code

/**
 * ServiceContainer Initializer. 
 * Will import user project config file
 * where services and parameters are declared.
 *
 * @package TiBeN\Framework\ServiceContainer
 * @author TiBeN
 */
class ServiceContainerPackageInitializer implements PackageInitializer
{
    /**
     * @var string
     */
    public $configFilePath;

    public function __construct($configFilePath)
    {
        // Start of user code ServiceContainerPackageInitializer.constructor
        $this->configFilePath = $configFilePath;
        // End of user code
    }

    /**
     * @return string
     */
    public function getConfigFilePath()
    {
        // Start of user code Getter ServiceContainerPackageInitializer.getConfigFilePath
        // End of user code
        return $this->configFilePath;
    }

    /**
     * @param string $configFilePath
     */
    public function setConfigFilePath($configFilePath)
    {
        // Start of user code Setter ServiceContainerPackageInitializer.setConfigFilePath
        // End of user code
        $this->configFilePath = $configFilePath;
    }

    // PackageInitializer Realization

    /**
     * Execute initialisation process of a package
     */
    public function init()
    {
        // Start of user code PackageInitializer.init
        require($this->configFilePath);
        // End of user code
    }

    // Start of user code ServiceContainerPackageInitializer.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
