<?php

namespace TiBeN\Framework\DataSource;
 
/**
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
	 * @return string $type
	 */
	public function getType();

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
	 * @param AssociativeArray $parameters
	 */
	public function setParameters(AssociativeArray $parameters);

}
