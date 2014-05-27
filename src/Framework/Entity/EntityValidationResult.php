<?php

namespace TiBeN\Framework\Entity;

use TiBeN\Framework\Validation\ValidationResult;

// Start of user code EntityValidationResult.useStatements
// Place your use statements here.
// End of user code

/**
 * Holds entity validation results.
 * 
 *
 * @package TiBeN\Framework\Entity
 * @author TiBeN
 */
class EntityValidationResult
{
    /**
     * @var array
     */
    public $validationResults;

    /**
     * @var bool
     */
    public $result;

    public function __construct()
    {
        // Start of user code EntityValidationResult.constructor
        $this->validationResults = array();
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code EntityValidationResult.destructor
        // End of user code
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

    // Start of user code EntityValidationResult.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
