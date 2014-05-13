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
     * @var AssociativeArray
     */
    public $configuration;

    /**
     * @var string
     */
    public $errorMessagePattern;

    /**
     * @var string
     */
    public $validatorName;

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

    // Start of user code ValidationRule.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
