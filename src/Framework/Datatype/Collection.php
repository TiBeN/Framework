<?php

namespace TiBeN\Framework\Datatype;
 
/**
 * Interface for classes that acts as a collection of object of a certain type.
 * It contains methods to manipulate these items like retrieving them, setting them, counting them etc. 
 * @package Datatype
 * @author TiBeN
 */ 
interface Collection extends Countable, Iterator
{
	/**
	 * Rewinds back to the first element of the Iterator. 
	 */
	public function rewind();

	/**
	 * Tell wheter an item is stored in the provided key slot.
	 *
	 * @param int $key
	 * @return bool $boolean
	 */
	public function hasKey($key);

	/**
	 * Tell whether the collection is empty or not.
	 *
	 * @return bool $boolean
	 */
	public function isEmpty();

	/**
	 * Adding a new item to the end of the collection.
	 *
	 * @param T $itemToAdd
	 */
	public function add($itemToAdd);

	/**
	 * Count elements of an object
	 *
	 * @return int $numberOfItems
	 */
	public function count();

	/**
	 * @return bool $boolean
	 */
	public function valid();

	/**
	 * Check if the current position is valid. 
	 *
	 * @return T $currentItem
	 */
	public function current();

	/**
	 * Returns the key of the current element. 
	 *
	 * @return int $key
	 */
	public function key();

	/**
	 * Moves the current position to the next element. 
	 */
	public function next();

	/**
	 * Define the collection as read only. All writing method then throws exceptions. 
	 *
	 * @param bool $boolean
	 */
	public function setAsReadOnly($boolean);

	/**
	 * Remove an item from the collection by providing its key. 
	 * The removed item is returned back.
	 *
	 * @param int $key
	 * @return T $removedItem
	 */
	public function remove($key);

	/**
	 * Tell whether the collection is read only or not.
	 *
	 * @return bool $boolean
	 */
	public function isReadOnly();

	/**
	 * Insert of replace an item at the provided key slot.
	 *
	 * @param int $key
	 * @param T $itemToSet
	 */
	public function set($key, $itemToSet);

	/**
	 * Return the object stored in the provided key slot.
	 *
	 * @param int $key
	 * @return T $item
	 */
	public function get($key);

	/**
	 * Reset the collection by deleting all item it contain.
	 */
	public function clear();

}
