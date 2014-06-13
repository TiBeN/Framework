<?php

namespace TiBeN\Framework\DataSource;

use TiBeN\Framework\Datatype\Converter;
use TiBeN\Framework\Datatype\AssociativeArray;

/**
 * Convert a PHP type to it's datasource equivalent.
 * TypeConverters can be used during entity mapping operations 
 * that occured when read or write operations are executed 
 * agains't the DataSource. 
 * 
 *  
 *
 * @package TiBeN\Framework\DataSource
 * @author TiBeN
 */ 
interface TypeConverter extends Converter
{
	/**
	 * @param T $itemToConvert
	 * @return U $convertedItem
	 */
	public function convert($itemToConvert);

	/**
	 * @param U $itemToReverse
	 * @return T $reversedItem
	 */
	public function reverse($itemToReverse);

	/**
	 * @return string $dataSourceType
	 */
	public function getDataSourceType();

	/**
	 * @return string $type
	 */
	public function getType();

	/**
	 * @param AssociativeArray $parameters
	 */
	public function setParameters(AssociativeArray $parameters);

}
