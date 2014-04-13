<?php

namespace TiBeN\Framework\DataSource;

use TiBeN\Framework\Datatype\Converter;
use TiBeN\Framework\Datatype\AssociativeArray;

/**
 *  
 * @package DataSource
 * @author TiBeN
 */ 
interface TypeConverter extends Converter
{
	/**
	 * @param U $itemToReverse
	 * @return T $reversedItem
	 */
	public function reverse($itemToReverse);

	/**
	 * @param AssociativeArray $parameters
	 */
	public function setParameters(AssociativeArray $parameters);

	/**
	 * @return string $dataSourceType
	 */
	public function getDataSourceType();

	/**
	 * @return string $type
	 */
	public function getType();

	/**
	 * @param T $itemToConvert
	 * @return U $convertedItem
	 */
	public function convert($itemToConvert);

}
