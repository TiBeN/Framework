<?php

namespace TiBeN\Framework\Validation;

/**
 * 
 *
 * @package Validation
 * @author TiBeN
 */
class ValidationError
{
    /**
     * @var string
     */
    public $message;

    /**
     * @var string
     */
    public $validatorName;

    public function __construct()
    {
        // Start of user code ValidationError.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code ValidationError.destructor
        // End of user code
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        // Start of user code Getter ValidationError.getMessage
        // End of user code
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        // Start of user code Setter ValidationError.setMessage
        // End of user code
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getValidatorName()
    {
        // Start of user code Getter ValidationError.getValidatorName
        // End of user code
        return $this->validatorName;
    }

    /**
     * @param string $validatorName
     */
    public function setValidatorName($validatorName)
    {
        // Start of user code Setter ValidationError.setValidatorName
        // End of user code
        $this->validatorName = $validatorName;
    }

    // Start of user code ValidationError.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
