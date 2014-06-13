<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code SelectStatement.useStatements
// Place your use statements here.
// End of user code

/**
 * Represent a Mysql select statement used to 
 * retrieve rows from one table.
 *
 * @package TiBeN\Framework\DataSource\MysqlDataSource
 * @author TiBeN
 */
class SelectStatement implements Statement
{
    /**
     * @var WhereConditions
     */
    public $whereConditions;

    /**
     * @var SelectExpr
     */
    public $selectExpr;

    /**
     * @var LimitStatement
     */
    public $limitStatement;

    /**
     * @var OrderByStatement
     */
    public $orderByStatement;

    /**
     * @var string
     */
    public $tableReferences;

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

    // Statement Realization

    /**
     * Generate the statement as a string.
     *
     * @return string $statement
     */
    public function toString()
    {
        // Start of user code Statement.toString
        if(!$this->isReadyToBeExecuted()) {
            throw new \LogicException('The statement is not ready');
        }       
        
        $statement = sprintf(
            'SELECT %s FROM %s', 
            $this->selectExpr->toString(),
            $this->tableReferences                                      
        );      
        if($this->whereConditions instanceof WhereConditions) {
            $statement .= ' ' . $this->whereConditions->toString();
        }
        if($this->orderByStatement instanceof OrderByStatement) {
            $statement .= ' ' . $this->orderByStatement->toString();
        }
        if($this->limitStatement instanceof LimitStatement) {
            $statement .= ' ' . $this->limitStatement->toString();
        }
        // End of user code
    
        return $statement;
    }

    /**
     * Return an associative array of parameters of the corresponding
     * named placeholder in the statement. 
     * 
     *
     * @return AssociativeArray $statementParameters
     */
    public function getStatementParameters()
    {
        // Start of user code Statement.getStatementParameters
        $statementParameters = !is_null($this->whereConditions)
            ? $this->whereConditions->getStatementParameters()
            : new AssociativeArray()
        ;    
        // End of user code
    
        return $statementParameters;
    }

    /**
     * Check whether all statement chunks are set 
     * in order to generate a complete statement string to 
     * be executed.
     *
     * @return bool $status
     */
    public function isReadyToBeExecuted()
    {
        // Start of user code Statement.isReadyToBeExecuted
        $status = $this->selectExpr instanceof SelectExpr 
            && !is_null($this->tableReferences)
            && !empty($this->tableReferences)
        ;
        // End of user code
    
        return $status;
    }

    // Start of user code SelectStatement.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
