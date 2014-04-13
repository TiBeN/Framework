<?php

namespace TiBeN\Framework\Entity;

// Start of user code OrderCriteria.useStatements
// Place your use statements here.
// End of user code

/**
 * 
 *
 * @package Entity
 * @author TiBeN
 */
class OrderCriteria
{
    /**
     * @var string
     */
    const DIRECTION_DESC = 'desc';

    /**
     * @var string
     */
    public $direction;

    /**
     * @var string
     */
    public $attribute;

    /**
     * @var string
     */
    const DIRECTION_ASC = 'asc';

    public function __construct()
    {
        // Start of user code OrderCriteria.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code OrderCriteria.destructor
        // End of user code
    }

    /**
     * @return string
     */
    public function getDirection()
    {
        // Start of user code Getter OrderCriteria.getDirection
        // End of user code
        return $this->direction;
    }

    /**
     * @param string $direction
     */
    public function setDirection($direction)
    {
        // Start of user code Setter OrderCriteria.setDirection
        // End of user code
        $this->direction = $direction;
    }

    /**
     * @return string
     */
    public function getAttribute()
    {
        // Start of user code Getter OrderCriteria.getAttribute
        // End of user code
        return $this->attribute;
    }

    /**
     * @param string $attribute
     */
    public function setAttribute($attribute)
    {
        // Start of user code Setter OrderCriteria.setAttribute
        // End of user code
        $this->attribute = $attribute;
    }

    /**
     * @param string $attribute
     * @return OrderCriteria $orderCriteria
     */
    public static function desc($attribute)
    {
        // Start of user code OrderCriteria.desc
        // TODO should be implemented.
        // End of user code
    
        return $orderCriteria;
    }

    /**
     * @param string $attribute
     * @return OrderCriteria $orderCriteria
     */
    public static function asc($attribute)
    {
        // Start of user code OrderCriteria.asc
        // TODO should be implemented.
        // End of user code
    
        return $orderCriteria;
    }

    // Start of user code OrderCriteria.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
