<?php

namespace TiBeN\Framework\Validation;

/**
 * 
 *
 * @package Validation
 * @author TiBeN
 */
class ValidationResult
{
    /**
     * @var bool
     */
    public $validationResult;

    /**
     * @var ValidationError
     */
    public $validationError;

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
     * @return ValidationError
     */
    public function getValidationError()
    {
        // Start of user code Getter ValidationResult.getValidationError
        // End of user code
        return $this->validationError;
    }

    /**
     * @param ValidationError $validationError
     */
    public function setValidationError(ValidationError $validationError)
    {
        // Start of user code Setter ValidationResult.setValidationError
        // End of user code
        $this->validationError = $validationError;
    }

    // Start of user code ValidationResult.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
