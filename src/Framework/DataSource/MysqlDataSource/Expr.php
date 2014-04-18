<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\Datatype\GenericCollection;

// Start of user code Expr.useStatements
// Place your use statements here.
// End of user code

/**
 * 
 *
 * @package MysqlDataSource
 * @author TiBeN
 */
class Expr
{
    /**
     * @var string
     */
    const OPERATOR_LIKE = 'LIKE';

    /**
     * @var string
     */
    const LOGICAL_SEPARATOR_OR = 'OR';

    /**
     * @var string
     */
    public $exprString;

    /**
     * @var string
     */
    const OPERATOR_NOT_EQUALS = '!=';

    /**
     * @var string
     */
    const OPERATOR_LESS_THAN = '<';

    /**
     * @var AssociativeArray
     */
    public $exprParameters;

    /**
     * @var string
     */
    const OPERATOR_NOT_LIKE = 'NOT LIKE';

    /**
     * @var string
     */
    const LOGICAL_SEPARATOR_AND = 'AND';

    /**
     * @var string
     */
    const OPERATOR_GREATER_THAN = '>';

    /**
     * @var string
     */
    const OPERATOR_LESS_THAN_OR_EQUALS = '<=';

    /**
     * @var bool
     */
    public $isResultOfConcatenation = false;

    /**
     * @var string
     */
    const OPERATOR_EQUALS = '=';

    /**
     * @var string
     */
    const OPERATOR_GREATER_THAN_OR_EQUALS = '>=';

    public function __construct()
    {
        // Start of user code Expr.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code Expr.destructor
        // End of user code
    }

    /**
     * @return string
     */
    public function getExprString()
    {
        // Start of user code Getter Expr.getExprString
        // End of user code
        return $this->exprString;
    }

    /**
     * @param string $exprString
     */
    public function setExprString($exprString)
    {
        // Start of user code Setter Expr.setExprString
        // End of user code
        $this->exprString = $exprString;
    }

    /**
     * @return AssociativeArray
     */
    public function getExprParameters()
    {
        // Start of user code Getter Expr.getExprParameters
        // End of user code
        return $this->exprParameters;
    }

    /**
     * @param AssociativeArray $exprParameters
     */
    public function setExprParameters(AssociativeArray $exprParameters)
    {
        // Start of user code Setter Expr.setExprParameters
        // End of user code
        $this->exprParameters = $exprParameters;
    }

    /**
     * @return bool
     */
    public function getIsResultOfConcatenation()
    {
        // Start of user code Getter Expr.getIsResultOfConcatenation
        // End of user code
        return $this->isResultOfConcatenation;
    }

    /**
     * @param bool $isResultOfConcatenation
     */
    public function setIsResultOfConcatenation($isResultOfConcatenation)
    {
        // Start of user code Setter Expr.setIsResultOfConcatenation
        // End of user code
        $this->isResultOfConcatenation = $isResultOfConcatenation;
    }

    /**
     * @return string $exprString
     */
    public function toString()
    {
        // Start of user code Expr.toString
        // TODO should be implemented.
        // End of user code
    
        return $exprString;
    }

    /**
     * @param string $exprString
     * @param AssociativeArray $exprParameters
     * @return Expr $expr
     */
    public static function fromString($exprString, AssociativeArray $exprParameters)
    {
        // Start of user code Expr.fromString
        // TODO should be implemented.
        // End of user code
    
        return $expr;
    }

    /**
     * @param GenericCollection $exprCollection
     * @param string $logicalSeparator
     * @return Expr $expr
     */
    public static function concat(GenericCollection $exprCollection, $logicalSeparator)
    {
        // Start of user code Expr.concat
        // TODO should be implemented.
        // End of user code
    
        return $expr;
    }

    // Start of user code Expr.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
