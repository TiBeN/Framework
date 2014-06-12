<?php

namespace TiBeN\Framework\Validation;

use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code ValidationRule.useStatements
// Place your use statements here.
// End of user code

/**
 * Describe a validation rule by specifying the 
 * validator to use, its configuration and optionaly a custom
 * validation error message pattern. the "{value}" 
 * can be used in the pattern. It will be replaced by the validated value.
 * 
 *  
 *
 * @package TiBeN\Framework\Validation
 * @author TiBeN
 */
class ValidationRule
{
    /**
     * @var string
     */
    public $errorMessagePattern;

    /**
     * @var string
     */
    public $validatorName;

    /**
     * @var AssociativeArray
     */
    public $configuration;

    public function __construct()
    {
        // Start of user code ValidationRule.constructor
        $this->configuration = new AssociativeArray();

        // End of user code
    }

    public function __destruct()
    {
        // Start of user code ValidationRule.destructor
        // End of user code
    }

    /**
     * @return string
     */
    public function getErrorMessagePattern()
    {
        // Start of user code Getter ValidationRule.getErrorMessagePattern
        // End of user code
        return $this->errorMessagePattern;
    }

    /**
     * @param string $errorMessagePattern
     */
    public function setErrorMessagePattern($errorMessagePattern)
    {
        // Start of user code Setter ValidationRule.setErrorMessagePattern
        // End of user code
        $this->errorMessagePattern = $errorMessagePattern;
    }

    /**
     * @return string
     */
    public function getValidatorName()
    {
        // Start of user code Getter ValidationRule.getValidatorName
        // End of user code
        return $this->validatorName;
    }

    /**
     * @param string $validatorName
     */
    public function setValidatorName($validatorName)
    {
        // Start of user code Setter ValidationRule.setValidatorName
        // End of user code
        $this->validatorName = $validatorName;
    }

    /**
     * @return AssociativeArray
     */
    public function getConfiguration()
    {
        // Start of user code Getter ValidationRule.getConfiguration
        // End of user code
        return $this->configuration;
    }

    /**
     * @param AssociativeArray $configuration
     */
    public function setConfiguration(AssociativeArray $configuration)
    {
        // Start of user code Setter ValidationRule.setConfiguration
        // End of user code
        $this->configuration = $configuration;
    }

    /**
     * Factory method that ease ValidationRule creation 
     * from associative arrays.
     *
     * @param AssociativeArray $config
     * @return ValidationRule $validationRule
     */
    public static function create(AssociativeArray $config)
    {
        // Start of user code ValidationRule.create
        if(!$config->has('name') || empty($config->get('name'))) {
            throw new \InvalidArgument('The validator name must be set');
        }

        $validationRule = new self;
        $validationRule->setValidatorName($config->get('name'));
        if($config->has('configuration')) {
            $validationRule->setConfiguration(
                AssociativeArray::createFromNativeArray(
                    null, 
                    $config->get('configuration')
                )
            );
        }
        if($config->has('message')) {
            $validationRule->setErrorMessagePattern($config->get('message'));
        }
        // End of user code
    
        return $validationRule;
    }

    // Start of user code ValidationRule.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
