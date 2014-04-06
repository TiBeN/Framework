<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

/**
 * 
 *
 * @package MysqlDataSource
 * @author TiBeN
 */
class StatementExecutionResult
{
    /**
     * @var int
     */
    public $errorCode;

    /**
     * @var int
     */
    public $lastInsertId;

    /**
     * @var int
     */
    public $numberOfAffectedRows;

    /**
     * @var string
     */
    public $errorMessage;

    /**
     * @var RowCollection
     */
    public $rowCollection;

    /**
     * @var bool
     */
    public $success;

    public function __construct()
    {
        // Start of user code StatementExecutionResult.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code StatementExecutionResult.destructor
        // End of user code
    }

    /**
     * @return int
     */
    public function getErrorCode()
    {
        // Start of user code Getter StatementExecutionResult.getErrorCode
        // End of user code
        return $this->errorCode;
    }

    /**
     * @param int $errorCode
     */
    public function setErrorCode($errorCode)
    {
        // Start of user code Setter StatementExecutionResult.setErrorCode
        // End of user code
        $this->errorCode = $errorCode;
    }

    /**
     * @return int
     */
    public function getLastInsertId()
    {
        // Start of user code Getter StatementExecutionResult.getLastInsertId
        // End of user code
        return $this->lastInsertId;
    }

    /**
     * @param int $lastInsertId
     */
    public function setLastInsertId($lastInsertId)
    {
        // Start of user code Setter StatementExecutionResult.setLastInsertId
        // End of user code
        $this->lastInsertId = $lastInsertId;
    }

    /**
     * @return int
     */
    public function getNumberOfAffectedRows()
    {
        // Start of user code Getter StatementExecutionResult.getNumberOfAffectedRows
        // End of user code
        return $this->numberOfAffectedRows;
    }

    /**
     * @param int $numberOfAffectedRows
     */
    public function setNumberOfAffectedRows($numberOfAffectedRows)
    {
        // Start of user code Setter StatementExecutionResult.setNumberOfAffectedRows
        // End of user code
        $this->numberOfAffectedRows = $numberOfAffectedRows;
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        // Start of user code Getter StatementExecutionResult.getErrorMessage
        // End of user code
        return $this->errorMessage;
    }

    /**
     * @param string $errorMessage
     */
    public function setErrorMessage($errorMessage)
    {
        // Start of user code Setter StatementExecutionResult.setErrorMessage
        // End of user code
        $this->errorMessage = $errorMessage;
    }

    /**
     * @return RowCollection
     */
    public function getRowCollection()
    {
        // Start of user code Getter StatementExecutionResult.getRowCollection
        // End of user code
        return $this->rowCollection;
    }

    /**
     * @param RowCollection $rowCollection
     */
    public function setRowCollection(RowCollection $rowCollection)
    {
        // Start of user code Setter StatementExecutionResult.setRowCollection
        // End of user code
        $this->rowCollection = $rowCollection;
    }

    /**
     * @return bool
     */
    public function getSuccess()
    {
        // Start of user code Getter StatementExecutionResult.getSuccess
        // End of user code
        return $this->success;
    }

    /**
     * @param bool $success
     */
    public function setSuccess($success)
    {
        // Start of user code Setter StatementExecutionResult.setSuccess
        // End of user code
        $this->success = $success;
    }

    // Start of user code StatementExecutionResult.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
