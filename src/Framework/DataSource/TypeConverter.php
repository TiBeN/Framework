<?php

namespace TiBeN\Framework\DataSource;

use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\Datatype\Converter;

/**
 *  
 *
 * @package TiBeN\Framework\DataSource
 * @author TiBeN
 */ 
interface TypeConverter extends Converter
{
	/**
	 * @param AssociativeArray $parameters
	 */
	public function setParameters(AssociativeArray $parameters);

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

}
