<?php

namespace TiBeN\Framework\Entity;

// Start of user code OrderCriteria.useStatements
// Place your use statements here.
// End of user code

/**
 * Determine a entity sorting condition of an 
 * entity collection.
 *
 * @package TiBeN\Framework\Entity
 * @author TiBeN
 */
class OrderCriteria
{
    /**
     * @var string
     */
    public $direction;

    /**
     * @var string
     */
    const DIRECTION_ASC = 'asc';

    /**
     * @var string
     */
    const DIRECTION_DESC = 'desc';

    /**
     * @var string
     */
    public $attribute;

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
     * Factory method that create an OrderCriteria 
     * having a DESC direction.
     *
     * @param string $attribute
     * @return OrderCriteria $orderCriteria
     */
    public static function desc($attribute)
    {
        // Start of user code OrderCriteria.desc
        $orderCriteria = new self();
        $orderCriteria->setAttribute($attribute);
        $orderCriteria->setDirection(self::DIRECTION_DESC);
        // End of user code
    
        return $orderCriteria;
    }

    /**
     * Factory method that create an OrderCriteria 
     * having a ASC direction.
     *
     * @param string $attribute
     * @return OrderCriteria $orderCriteria
     */
    public static function asc($attribute)
    {
        // Start of user code OrderCriteria.asc
        $orderCriteria = new self();
        $orderCriteria->setAttribute($attribute);
        $orderCriteria->setDirection(self::DIRECTION_ASC);
        // End of user code
    
        return $orderCriteria;
    }

    // Start of user code OrderCriteria.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
