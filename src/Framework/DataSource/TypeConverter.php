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
	 * @return string $type
	 */
	public function getType();

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

}
