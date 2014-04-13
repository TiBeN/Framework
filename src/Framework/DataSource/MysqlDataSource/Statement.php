<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Datatype\AssociativeArray;

/**
 * Represent a Mysql Statement. Implement this interface when 
 * you want to create new kinds of Mysql Statement. 
 * @package MysqlDataSource
 * @author TiBeN
 */ 
interface Statement
{
	/**
	 * @return AssociativeArray $statementParameters
	 */
	public function getStatementParameters();

	/**
	 * Tell wether the statement is ready or not to be executed
	 *
	 * @return bool $status
	 */
	public function isReadyToBeExecuted();

	/**
	 * Return the statement in String format
	 *
	 * @return string $statement
	 */
	public function toString();

}
