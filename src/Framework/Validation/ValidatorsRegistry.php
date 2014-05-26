<?php

namespace TiBeN\Framework\Validation;

use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code ValidatorsRegistry.useStatements
// Place your use statements here.
// End of user code

/**
 * 
 *
 * @package TiBeN\Framework\Validation
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
	    if(!isset(self::$validators)) {
	        self::$validators = new AssociativeArray(
                'TiBeN\\Framework\\Validation\\Validator'
            );
	    }		
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
     * @param string $name
     */
    public static function clearValidator($name)
    {
        // Start of user code ValidatorsRegistry.clearValidator
        if (!self::hasValidator($name)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'There isnt %s Validator registered',
                    $name                
                )
            );
        }
        self::getValidators()->remove($name);
        // End of user code
    }

    /**
     * @param string $name
     * @return bool $boolean
     */
    public static function hasValidator($name)
    {
        // Start of user code ValidatorsRegistry.hasValidator
        $boolean = self::getValidators()->has($name);
        // End of user code
    
        return $boolean;
    }

    /**
     * @param string $name
     * @return Validator $validator
     */
    public static function getValidator($name)
    {
        // Start of user code ValidatorsRegistry.getValidator
        if(!self::hasValidator($name)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'There isnt %s Validator registered',
                    $name                
                )
            );
		}
		$validator = self::getValidators()->get($name);
        // End of user code
    
        return $validator;
    }

    /**
     * @param Validator $validator
     */
    public static function registerValidator(Validator $validator)
    {
        // Start of user code ValidatorsRegistry.registerValidator
        self::getValidators()->set($validator->getName(), $validator);
        // End of user code
    }

    // Start of user code ValidatorsRegistry.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
