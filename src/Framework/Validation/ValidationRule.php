<?php

namespace TiBeN\Framework\Validation;

use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code ValidationRule.useStatements
// Place your use statements here.
// End of user code

/**
 * 
 *
 * @package Validation
 * @author TiBeN
 */
class ValidationRule
{
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

    // Start of user code ValidationRule.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
