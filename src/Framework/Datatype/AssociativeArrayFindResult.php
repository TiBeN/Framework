<?php

namespace TiBeN\Framework\Datatype;

// Start of user code AssociativeArrayFindResult.useStatements
// Place your use statements here.
// End of user code

/**
 * Object/value that hold a DataContainer find result operation
 *
 * @package TiBeN\Framework\Datatype
 * @author TiBeN
 */
class AssociativeArrayFindResult
{
    /**
     * @var bool
     */
    public $result;

    /**
     * @var string
     */
    public $key;

    public function __construct()
    {
        // Start of user code AssociativeArrayFindResult.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code AssociativeArrayFindResult.destructor
        // End of user code
    }

    /**
     * @return bool
     */
    public function getResult()
    {
        // Start of user code Getter AssociativeArrayFindResult.getResult
        // End of user code
        return $this->result;
    }

    /**
     * @param bool $result
     */
    public function setResult($result)
    {
        // Start of user code Setter AssociativeArrayFindResult.setResult
        // End of user code
        $this->result = $result;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        // Start of user code Getter AssociativeArrayFindResult.getKey
        // End of user code
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey($key)
    {
        // Start of user code Setter AssociativeArrayFindResult.setKey
        // End of user code
        $this->key = $key;
    }

    // Start of user code AssociativeArrayFindResult.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
