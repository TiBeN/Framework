<?php

namespace TiBeN\Framework\Validation;

use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code ValidatorsRegistry.useStatements
// Place your use statements here.
// End of user code

/**
 * 
 *
 * @package Validation
 * @author TiBeN
 */
class ValidatorsRegistry
{
    /**
     * @var AssociativeArray
     */
    private static $validators;

    public function __construct()
    {
        // Start of user code ValidatorsRegistry.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code ValidatorsRegistry.destructor
        // End of user code
    }

    /**
     * @return AssociativeArray
     */
    private static function getValidators()
    {
        // Start of user code Static getter ValidatorsRegistry.getValidators
        // End of user code
        return self::$validators;
    }

    /**
     * @param AssociativeArray $validators
     */
    private static function setValidators(AssociativeArray $validators)
    {
        // Start of user code Static setter ValidatorsRegistry.setValidators
        // End of user code
        self::$validators = $validators;
    }

    /**
     * @param Validator $validator
     */
    public static function registerValidator(Validator $validator)
    {
        // Start of user code ValidatorsRegistry.registerValidator
        // TODO should be implemented.
        // End of user code
    }

    /**
     * @param string $name
     * @return bool $boolean
     */
    public static function hasValidator($name)
    {
        // Start of user code ValidatorsRegistry.hasValidator
        // TODO should be implemented.
        // End of user code
    
        return $boolean;
    }

    /**
     * @param string $name
     */
    public static function clearValidator($name)
    {
        // Start of user code ValidatorsRegistry.clearValidator
        // TODO should be implemented.
        // End of user code
    }

    /**
     * @param string $name
     * @return Validator $validator
     */
    public static function getValidator($name)
    {
        // Start of user code ValidatorsRegistry.getValidator
        // TODO should be implemented.
        // End of user code
    
        return $validator;
    }

    // Start of user code ValidatorsRegistry.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
