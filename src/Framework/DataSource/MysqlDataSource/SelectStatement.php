<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Datatype\AssociativeArray;

/**
 * 
 *
 * @package MysqlDataSource
 * @author TiBeN
 */
class SelectStatement implements Statement
{
    /**
     * @var string
     */
    public $tableReferences;

    /**
     * @var OrderByStatement
     */
    public $orderByStatement;

    /**
     * @var SelectExpr
     */
    public $selectExpr;

    /**
     * @var WhereConditions
     */
    public $whereConditions;

    /**
     * @var LimitStatement
     */
    public $limitStatement;

    public function __construct()
    {
        // Start of user code SelectStatement.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code SelectStatement.destructor
        // End of user code
    }

    /**
     * @return string
     */
    public function getTableReferences()
    {
        // Start of user code Getter SelectStatement.getTableReferences
        // End of user code
        return $this->tableReferences;
    }

    /**
     * @param string $tableReferences
     */
    public function setTableReferences($tableReferences)
    {
        // Start of user code Setter SelectStatement.setTableReferences
        // End of user code
        $this->tableReferences = $tableReferences;
    }

    /**
     * @return OrderByStatement
     */
    public function getOrderByStatement()
    {
        // Start of user code Getter SelectStatement.getOrderByStatement
        // End of user code
        return $this->orderByStatement;
    }

    /**
     * @param OrderByStatement $orderByStatement
     */
    public function setOrderByStatement(OrderByStatement $orderByStatement)
    {
        // Start of user code Setter SelectStatement.setOrderByStatement
        // End of user code
        $this->orderByStatement = $orderByStatement;
    }

    /**
     * @return SelectExpr
     */
    public function getSelectExpr()
    {
        // Start of user code Getter SelectStatement.getSelectExpr
        // End of user code
        return $this->selectExpr;
    }

    /**
     * @param SelectExpr $selectExpr
     */
    public function setSelectExpr(SelectExpr $selectExpr)
    {
        // Start of user code Setter SelectStatement.setSelectExpr
        // End of user code
        $this->selectExpr = $selectExpr;
    }

    /**
     * @return WhereConditions
     */
    public function getWhereConditions()
    {
        // Start of user code Getter SelectStatement.getWhereConditions
        // End of user code
        return $this->whereConditions;
    }

    /**
     * @param WhereConditions $whereConditions
     */
    public function setWhereConditions(WhereConditions $whereConditions)
    {
        // Start of user code Setter SelectStatement.setWhereConditions
        // End of user code
        $this->whereConditions = $whereConditions;
    }

    /**
     * @return LimitStatement
     */
    public function getLimitStatement()
    {
        // Start of user code Getter SelectStatement.getLimitStatement
        // End of user code
        return $this->limitStatement;
    }

    /**
     * @param LimitStatement $limitStatement
     */
    public function setLimitStatement(LimitStatement $limitStatement)
    {
        // Start of user code Setter SelectStatement.setLimitStatement
        // End of user code
        $this->limitStatement = $limitStatement;
    }

    // Statement Realization

    /**
     * Tell wether the statement is ready or not to be executed
     *
     * @return bool $status
     */
    public function isReadyToBeExecuted()
    {
        // Start of user code Statement.isReadyToBeExecuted
        // TODO should be implemented.
        // End of user code
    
        return $status;
    }

    /**
     * Return the statement in String format
     *
     * @return string $statement
     */
    public function toString()
    {
        // Start of user code Statement.toString
        // TODO should be implemented.
        // End of user code
    
        return $statement;
    }

    /**
     * @return AssociativeArray $statementParameters
     */
    public function getStatementParameters()
    {
        // Start of user code Statement.getStatementParameters
        // TODO should be implemented.
        // End of user code
    
        return $statementParameters;
    }

    // Start of user code SelectStatement.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
