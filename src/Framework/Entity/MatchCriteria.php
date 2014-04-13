<?php

namespace TiBeN\Framework\Entity;

// Start of user code MatchCriteria.useStatements
// Place your use statements here.
// End of user code

/**
 * 
 *
 * @package Entity
 * @author TiBeN
 */
class MatchCriteria
{
    /**
     * @var string
     */
    const OPERATOR_LESS_THAN = '<';

    /**
     * @var string
     */
    const OPERATOR_LIKE = 'like';

    /**
     * @var string
     */
    public $operator;

    /**
     * @var string
     */
    const OPERATOR_GREATER_THAN_OR_EQUALS = '>=';

    /**
     * @var string
     */
    const OPERATOR_NOT_LIKE = '!like';

    /**
     * @var string
     */
    const OPERATOR_GREATER_THAN = '>';

    /**
     * @var string
     */
    public $attribute;

    /**
     * @var string
     */
    const OPERATOR_LESS_THAN_OR_EQUALS = '<=';

    /**
     * @var string
     */
    const OPERATOR_EQUALS = '=';

    /**
     * @var string
     */
    const OPERATOR_NOT_EQUALS = '!=';

    /**
     * @var string
     */
    public $value;

    public function __construct()
    {
        // Start of user code MatchCriteria.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code MatchCriteria.destructor
        // End of user code
    }

    /**
     * @return string
     */
    public function getOperator()
    {
        // Start of user code Getter MatchCriteria.getOperator
        // End of user code
        return $this->operator;
    }

    /**
     * @param string $operator
     */
    public function setOperator($operator)
    {
        // Start of user code Setter MatchCriteria.setOperator
        // End of user code
        $this->operator = $operator;
    }

    /**
     * @return string
     */
    public function getAttribute()
    {
        // Start of user code Getter MatchCriteria.getAttribute
        // End of user code
        return $this->attribute;
    }

    /**
     * @param string $attribute
     */
    public function setAttribute($attribute)
    {
        // Start of user code Setter MatchCriteria.setAttribute
        // End of user code
        $this->attribute = $attribute;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        // Start of user code Getter MatchCriteria.getValue
        // End of user code
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        // Start of user code Setter MatchCriteria.setValue
        // End of user code
        $this->value = $value;
    }

    /**
     * @param string $attribute
     * @param string $value
     * @return MatchCriteria $matchCriteria
     */
    public static function like($attribute, $value)
    {
        // Start of user code MatchCriteria.like
        // TODO should be implemented.
        // End of user code
    
        return $matchCriteria;
    }

    /**
     * @param string $attribute
     * @param string $value
     * @return MatchCriteria $matchCriteria
     */
    public static function notLike($attribute, $value)
    {
        // Start of user code MatchCriteria.notLike
        // TODO should be implemented.
        // End of user code
    
        return $matchCriteria;
    }

    /**
     * @param string $attribute
     * @param string $value
     * @return MatchCriteria $matchCriteria
     */
    public static function greaterThan($attribute, $value)
    {
        // Start of user code MatchCriteria.greaterThan
        // TODO should be implemented.
        // End of user code
    
        return $matchCriteria;
    }

    /**
     * @param string $attribute
     * @param string $value
     * @return MatchCriteria $matchCriteria
     */
    public static function lessThanOrEquals($attribute, $value)
    {
        // Start of user code MatchCriteria.lessThanOrEquals
        // TODO should be implemented.
        // End of user code
    
        return $matchCriteria;
    }

    /**
     * @param string $attribute
     * @param string $value
     * @return MatchCriteria $matchCriteria
     */
    public static function equals($attribute, $value)
    {
        // Start of user code MatchCriteria.equals
        // TODO should be implemented.
        // End of user code
    
        return $matchCriteria;
    }

    /**
     * @param string $attribute
     * @param string $value
     * @return MatchCriteria $matchCriteria
     */
    public static function lessThan($attribute, $value)
    {
        // Start of user code MatchCriteria.lessThan
        // TODO should be implemented.
        // End of user code
    
        return $matchCriteria;
    }

    /**
     * @param string $attribute
     * @param string $value
     * @return MatchCriteria $matchCriteria
     */
    public static function greaterThanOrEquals($attribute, $value)
    {
        // Start of user code MatchCriteria.greaterThanOrEquals
        // TODO should be implemented.
        // End of user code
    
        return $matchCriteria;
    }

    /**
     * @param string $attribute
     * @param string $value
     * @return MatchCriteria $matchCriteria
     */
    public static function notEquals($attribute, $value)
    {
        // Start of user code MatchCriteria.notEquals
        // TODO should be implemented.
        // End of user code
    
        return $matchCriteria;
    }

    // Start of user code MatchCriteria.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
