<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Entity\LimitCriteria;

// Start of user code LimitStatement.useStatements
// Place your use statements here.
// End of user code

/**
 * Represent a limit statement chunk.
 *
 * @package TiBeN\Framework\DataSource\MysqlDataSource
 * @author TiBeN
 */
class LimitStatement
{
    /**
     * @var int
     */
    public $rowCount;

    /**
     * @var int
     */
    public $offset;

    /**
     * @return int
     */
    public function getRowCount()
    {
        // Start of user code Getter LimitStatement.getRowCount
        // End of user code
        return $this->rowCount;
    }

    /**
     * @param int $rowCount
     */
    public function setRowCount($rowCount)
    {
        // Start of user code Setter LimitStatement.setRowCount
        // End of user code
        $this->rowCount = $rowCount;
    }

    /**
     * @return int
     */
    public function getOffset()
    {
        // Start of user code Getter LimitStatement.getOffset
        // End of user code
        return $this->offset;
    }

    /**
     * @param int $offset
     */
    public function setOffset($offset)
    {
        // Start of user code Setter LimitStatement.setOffset
        // End of user code
        $this->offset = $offset;
    }

    /**
     * Factory method that generate a LimitStatement 
     * from a LimitCriteria
     *
     * @param LimitCriteria $limitCriteria
     * @return LimitStatement $limitStatement
     */
    public static function createFromLimitCriteria(LimitCriteria $limitCriteria)
    {
        // Start of user code LimitStatement.createFromLimitCriteria
        $limitStatement = new self();
        $limitStatement->setOffset($limitCriteria->getOffset());
        $limitStatement->setRowCount($limitCriteria->getNumber()); 
        // End of user code
    
        return $limitStatement;
    }

    /**
     * Generate the limit statement as a string.
     *
     * @return string $string
     */
    public function toString()
    {
        // Start of user code LimitStatement.toString
        if(is_null($this->rowCount)) {
            throw new \LogicException('The number of row to limit is not set');            
        }
        
        $string = 'LIMIT ' . (is_null($this->offset)
            ? $this->rowCount
            : ( $this->offset . ',' . $this->rowCount )    
        );
        // End of user code
    
        return $string;
    }

    // Start of user code LimitStatement.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
