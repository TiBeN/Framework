<?php

namespace TiBeN\Framework\Bootstrap;

use TiBeN\Framework\Package\PackageInitializer;

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

    /**
     * Init The booting process of the Framework.
     * Allways call this before use any component.
     *
     * @param array $packageInitializers
     */
    public static function init(array $packageInitializers = NULL)
    {
        // Start of user code Bootstrap.init
        if (!is_null($packageInitializers) && !empty($packageInitializers)) {
            foreach($packageInitializers as $packageInitializer) {
                
                if(!$packageInitializer 
                    instanceof \TiBeN\Framework\Package\PackageInitializer
                ) {
                    throw new \InvalidArgumentException(
                        'Only classes that implements PackageInitializer are allowed'
                    );
                }
                $packageInitializer->init();
            }
        }
        // End of user code
    }

    // Start of user code Bootstrap.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
