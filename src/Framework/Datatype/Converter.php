<?php

namespace TiBeN\Framework\Datatype;
 
/**
 * Interface for class that aims to convert an object to another in both directions 
 * @package Datatype
 * @author TiBeN
 */ 
interface Converter
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

}
