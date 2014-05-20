<?php

namespace TiBeN\Framework\Entity;

use TiBeN\Framework\Validation\ValidationResult;

// Start of user code EntityValidationResult.useStatements
// Place your use statements here.
// End of user code

/**
 * 
 *
 * @package TiBeN\Framework\Entity
 * @author TiBeN
 */
class EntityValidationResult
{
    /**
     * @var bool
     */
    public $result;

    /**
     * @var array
     */
    public $validationResults;

    public function __construct()
    {
        // Start of user code EntityValidationResult.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code EntityValidationResult.destructor
        // End of user code
    }

    /**
     * @return bool
     */
    public function getResult()
    {
        // Start of user code Getter EntityValidationResult.getResult
        // End of user code
        return $this->result;
    }

    /**
     * @param bool $result
     */
    public function setResult($result)
    {
        // Start of user code Setter EntityValidationResult.setResult
        // End of user code
        $this->result = $result;
    }

    /**
     * @return array
     */
    public function getValidationResults()
    {
        // Start of user code Getter EntityValidationResult.getValidationResults
        // End of user code
        return $this->validationResults;
    }

    /**
     * @param array $validationResults
     */
    public function setValidationResults(array $validationResults)
    {
        // Start of user code Setter EntityValidationResult.setValidationResults
        // End of user code
        $this->validationResults = $validationResults;
    }

    // Start of user code EntityValidationResult.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
