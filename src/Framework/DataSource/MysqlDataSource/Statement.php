<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;
 
/**
 * Represent a Mysql Statement. Implement this interface when 
 * you want to create new kinds of Mysql Statement. 
 * @package MysqlDataSource
 * @author TiBeN
 */ 
interface Statement
{
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

	/**
	 * @return AssociativeArray $statementParameters
	 */
	public function getStatementParameters();

}
