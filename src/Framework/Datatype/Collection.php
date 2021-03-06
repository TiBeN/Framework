<?php

namespace TiBeN\Framework\Datatype;

/**
 * Interface for classes that acts as a collection of object of a certain type.
 * It contains methods to manipulate these items 
 * like retrieving them, setting them, counting them etc. 
 *
 * @package TiBeN\Framework\Datatype
 * @author TiBeN
 */ 
interface Collection extends \Iterator, \Countable
{
	/**
	 * Tell whether the collection is empty or not.
	 *
	 * @return bool $boolean
	 */
	public function isEmpty();

	/**
	 * Returns the key of the current element. 
	 *
	 * @return int $key
	 */
	public function key();

	/**
	 * Count elements of an object
	 *
	 * @return int $numberOfItems
	 */
	public function count();

	/**
	 * Insert of replace an item at the provided key slot.
	 *
	 * @param int $key
	 * @param T $itemToSet
	 */
	public function set($key, $itemToSet);

	/**
	 * Define the collection as read only. All writing method then throws exceptions. 
	 *
	 * @param bool $boolean
	 */
	public function setAsReadOnly($boolean);

	/**
	 * @return bool $boolean
	 */
	public function valid();

	/**
	 * Moves the current position to the next element. 
	 */
	public function next();

	/**
	 * Tell wheter an item is stored in the provided key slot.
	 *
	 * @param int $key
	 * @return bool $boolean
	 */
	public function hasKey($key);

	/**
	 * Remove an item from the collection by providing its key. 
	 * The removed item is returned back.
	 *
	 * @param int $key
	 * @return T $removedItem
	 */
	public function remove($key);

	/**
	 * Check if the current position is valid. 
	 *
	 * @return T $currentItem
	 */
	public function current();

	/**
	 * Return the object stored in the provided key slot.
	 *
	 * @param int $key
	 * @return T $item
	 */
	public function get($key);

	/**
	 * Tell whether the collection is read only or not.
	 *
	 * @return bool $boolean
	 */
	public function isReadOnly();

	/**
	 * Adding a new item to the end of the collection.
	 *
	 * @param T $itemToAdd
	 */
	public function add($itemToAdd);

	/**
	 * Reset the collection by deleting all item it contain.
	 */
	public function clear();

	/**
	 * Rewinds back to the first element of the Iterator. 
	 */
	public function rewind();

}
