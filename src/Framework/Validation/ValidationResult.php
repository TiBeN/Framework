<?php

namespace TiBeN\Framework\Validation;

// Start of user code ValidationResult.useStatements
// Place your use statements here.
// End of user code

/**
 * Holds a validation result and eventually 
 * its validation error message.
 * 
 *
 * @package TiBeN\Framework\Validation
 * @author TiBeN
 */
class ValidationResult
{
    /**
     * @var bool
     */
    public $validationResult;

    /**
     * @var string
     */
    public $errorMessage;

    public function __construct()
    {
        // Start of user code ValidationResult.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code ValidationResult.destructor
        // End of user code
    }

    /**
     * @return bool
     */
    public function getValidationResult()
    {
        // Start of user code Getter ValidationResult.getValidationResult
        // End of user code
        return $this->validationResult;
    }

    /**
     * @param bool $validationResult
     */
    public function setValidationResult($validationResult)
    {
        // Start of user code Setter ValidationResult.setValidationResult
        // End of user code
        $this->validationResult = $validationResult;
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        // Start of user code Getter ValidationResult.getErrorMessage
        // End of user code
        return $this->errorMessage;
    }

    /**
     * @param string $errorMessage
     */
    public function setErrorMessage($errorMessage)
    {
        // Start of user code Setter ValidationResult.setErrorMessage
        // End of user code
        $this->errorMessage = $errorMessage;
    }

    /**
     * Set the error message from an error 
     * message pattern and the values to be 
     * parsed.
     *
     * @param string $errorMessagePattern
     * @param string $value
     */
    public function parseAndSetErrorMessage($errorMessagePattern, $value)
    {
        // Start of user code ValidationResult.parseAndSetErrorMessage
        $this->errorMessage = str_replace('{value}', $value, $errorMessagePattern);
        // End of user code
    }

    // Start of user code ValidationResult.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
