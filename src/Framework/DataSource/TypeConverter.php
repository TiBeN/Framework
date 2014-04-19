<?php

namespace TiBeN\Framework\DataSource;

use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\Datatype\Converter;

/**
 *  
 *
 * @package DataSource
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
	 * @return string $dataSourceType
	 */
	public function getDataSourceType();

	/**
	 * @param AssociativeArray $parameters
	 */
	public function setParameters(AssociativeArray $parameters);

	/**
	 * @return string $type
	 */
	public function getType();

	/**
	 * @param U $itemToReverse
	 * @return T $reversedItem
	 */
	public function reverse($itemToReverse);

}
