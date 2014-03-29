<?php

namespace TiBeN\Framework\Entity;

/**
 * 
 *
 * @package Entity
 * @author TiBeN
 */
class LimitCriteria
{
    /**
     * @var int
     */
    public $offset;

    /**
     * @var int
     */
    public $number;

    public function __construct()
    {
        // Start of user code LimitCriteria.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code LimitCriteria.destructor
        // End of user code
    }

    /**
     * @return int
     */
    public function getOffset()
    {
        // Start of user code Getter LimitCriteria.getOffset
        // End of user code
        return $this->offset;
    }

    /**
     * @param int $offset
     */
    public function setOffset($offset)
    {
        // Start of user code Setter LimitCriteria.setOffset
        // End of user code
        $this->offset = $offset;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        // Start of user code Getter LimitCriteria.getNumber
        // End of user code
        return $this->number;
    }

    /**
     * @param int $number
     */
    public function setNumber($number)
    {
        // Start of user code Setter LimitCriteria.setNumber
        // End of user code
        $this->number = $number;
    }

    /**
     * @param int $number
     * @param int $offset
     * @return LimitCriteria $limitCriteria
     */
    public static function to($number, $offset = NULL)
    {
        // Start of user code LimitCriteria.to
        // TODO should be implemented.
        // End of user code
    
        return $limitCriteria;
    }

    // Start of user code LimitCriteria.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
