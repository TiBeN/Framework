<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Datatype\AssociativeArray;

/**
 *  
 *
 * @package TiBeN\Framework\DataSource\MysqlDataSource
 * @author TiBeN
 */ 
interface Statement
{
	/**
	 * Check whether all statement chunks are set 
	 * in order to generate a complete statement string to 
	 * be executed.
	 *
	 * @return bool $status
	 */
	public function isReadyToBeExecuted();

	/**
	 * Return an associative array of parameters of the corresponding
	 * named placeholder in the statement. 
	 * 
	 *
	 * @return AssociativeArray $statementParameters
	 */
	public function getStatementParameters();

	/**
	 * Generate the statement as a string.
	 *
	 * @return string $statement
	 */
	public function toString();

}
