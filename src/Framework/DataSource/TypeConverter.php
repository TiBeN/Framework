<?php

namespace TiBeN\Framework\DataSource;

use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\Datatype\Converter;

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
	 * @return string $type
	 */
	public function getType();

	/**
	 * @return string $dataSourceType
	 */
	public function getDataSourceType();

	/**
	 * @param T $itemToConvert
	 * @return U $convertedItem
	 */
	public function convert($itemToConvert);

	/**
	 * @param AssociativeArray $parameters
	 */
	public function setParameters(AssociativeArray $parameters);

	/**
	 * @param U $itemToReverse
	 * @return T $reversedItem
	 */
	public function reverse($itemToReverse);

}
