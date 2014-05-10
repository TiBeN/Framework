<?php

namespace TiBeN\Framework\DataSource;

use TiBeN\Framework\Datatype\Converter;
use TiBeN\Framework\Datatype\AssociativeArray;

/**
 *  
 *
 * @package DataSource
 * @author TiBeN
 */ 
interface TypeConverter extends Converter
{
	/**
	 * @return string $dataSourceType
	 */
	public function getDataSourceType();

	/**
	 * @param U $itemToReverse
	 * @return T $reversedItem
	 */
	public function reverse($itemToReverse);

	/**
	 * @param T $itemToConvert
	 * @return U $convertedItem
	 */
	public function convert($itemToConvert);

	/**
	 * @return string $type
	 */
	public function getType();

	/**
	 * @param AssociativeArray $parameters
	 */
	public function setParameters(AssociativeArray $parameters);

}
