<?php

namespace TiBeN\Framework\Datatype;

/**
 * 
 *
 * @package Datatype
 * @author TiBeN
 */
class GenericCollection implements Collection
{
    /**
     * Type of the element T
     * @var String
     */
    protected $TType;

    /**
     * @var int
     */
    protected $iteratorPosition;

    /**
     * @var bool
     */
    protected $isReadOnly;

    /**
     * @var array
     */
    protected $items;

    public function __construct($TType = null)
    {
        $this->TType = $TType;

        // Start of user code GenericCollection.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code GenericCollection.destructor
        // End of user code
    }
    
    /**
     * T type getter
     * @var String
     */
    public function getTType()
    {
        return $this->TType;
    }

    /**
     * Emulate Templates (generics) in PHP. Check if the type of the object match
     * type specified in constructor.
     * If no type (null) if specified in the constructor, then type is not checked.
     *
     * @param string $type
     * @param <$type> $variable
     * @return boolean 
     */
    private static function typeHint($type, $variable)
    {
        if ($type == null || $variable == null) {
            return;
        }

        if (is_object($variable)) {
            $hint = is_a($variable, $type);
            $varType = get_class($variable);
        } else {
            $varType = gettype($variable);
            $hint = $varType == $type;
        }

        if (!$hint) {
            throw new \InvalidArgumentException(
                sprintf('expects parameter to be %s, %s given', $type, $varType)
            );
        }
    }

    /**
     * @return int
     */
    protected function getIteratorPosition()
    {
        // Start of user code Getter GenericCollection.getIteratorPosition
        // End of user code
        return $this->iteratorPosition;
    }

    /**
     * @param int $iteratorPosition
     */
    protected function setIteratorPosition($iteratorPosition)
    {
        // Start of user code Setter GenericCollection.setIteratorPosition
        // End of user code
        $this->iteratorPosition = $iteratorPosition;
    }

    /**
     * @return bool
     */
    protected function getIsReadOnly()
    {
        // Start of user code Getter GenericCollection.getIsReadOnly
        // End of user code
        return $this->isReadOnly;
    }

    /**
     * @param bool $isReadOnly
     */
    protected function setIsReadOnly($isReadOnly)
    {
        // Start of user code Setter GenericCollection.setIsReadOnly
        // End of user code
        $this->isReadOnly = $isReadOnly;
    }

    /**
     * @return array
     */
    protected function getItems()
    {
        // Start of user code Getter GenericCollection.getItems
        // End of user code
        return $this->items;
    }

    /**
     * @param array $items
     */
    protected function setItems(array $items)
    {
        // Start of user code Setter GenericCollection.setItems
        // End of user code
        $this->items = $items;
    }

    /**
     * @param string $type
     * @param array $nativeArray
     * @return GenericCollection $genericCollection
     */
    public static function createFromNativeArray($type = NULL, array $nativeArray)
    {
        // Start of user code GenericCollection.createFromNativeArray
        // TODO should be implemented.
        // End of user code
    
        return $genericCollection;
    }

    // Collection Realization

    /**
     * Rewinds back to the first element of the Iterator. 
     */
    public function rewind()
    {
        // Start of user code Iterator.rewind
        // TODO should be implemented.
        // End of user code
    }

    /**
     * Insert of replace an item at the provided key slot.
     *
     * @param int $key
     * @param T $itemToSet
     */
    public function set($key, $itemToSet)
    {
        $this->typeHint($this->TType, $itemToSet);
        // Start of user code Collection.set
        // TODO should be implemented.
        // End of user code
    }

    /**
     * Count elements of an object
     *
     * @return int $numberOfItems
     */
    public function count()
    {
        // Start of user code Countable.count
        // TODO should be implemented.
        // End of user code
    
        return $numberOfItems;
    }

    /**
     * Tell whether the collection is empty or not.
     *
     * @return bool $boolean
     */
    public function isEmpty()
    {
        // Start of user code Collection.isEmpty
        // TODO should be implemented.
        // End of user code
    
        return $boolean;
    }

    /**
     * Moves the current position to the next element. 
     */
    public function next()
    {
        // Start of user code Iterator.next
        // TODO should be implemented.
        // End of user code
    }

    /**
     * @return bool $boolean
     */
    public function valid()
    {
        // Start of user code Iterator.valid
        // TODO should be implemented.
        // End of user code
    
        return $boolean;
    }

    /**
     * Check if the current position is valid. 
     *
     * @return T $currentItem
     */
    public function current()
    {
        // Start of user code Iterator.current
        // TODO should be implemented.
        // End of user code
    
        return $currentItem;
    }

    /**
     * Tell whether the collection is read only or not.
     *
     * @return bool $boolean
     */
    public function isReadOnly()
    {
        // Start of user code Collection.isReadOnly
        // TODO should be implemented.
        // End of user code
    
        return $boolean;
    }

    /**
     * Tell wheter an item is stored in the provided key slot.
     *
     * @param int $key
     * @return bool $boolean
     */
    public function hasKey($key)
    {
        // Start of user code Collection.hasKey
        // TODO should be implemented.
        // End of user code
    
        return $boolean;
    }

    /**
     * Reset the collection by deleting all item it contain.
     */
    public function clear()
    {
        // Start of user code Collection.clear
        // TODO should be implemented.
        // End of user code
    }

    /**
     * Define the collection as read only. All writing method then throws exceptions. 
     *
     * @param bool $boolean
     */
    public function setAsReadOnly($boolean)
    {
        // Start of user code Collection.setAsReadOnly
        // TODO should be implemented.
        // End of user code
    }

    /**
     * Adding a new item to the end of the collection.
     *
     * @param T $itemToAdd
     */
    public function add($itemToAdd)
    {
        $this->typeHint($this->TType, $itemToAdd);
        // Start of user code Collection.add
        // TODO should be implemented.
        // End of user code
    }

    /**
     * Returns the key of the current element. 
     *
     * @return int $key
     */
    public function key()
    {
        // Start of user code Iterator.key
        // TODO should be implemented.
        // End of user code
    
        return $key;
    }

    /**
     * Remove an item from the collection by providing its key. 
     * The removed item is returned back.
     *
     * @param int $key
     * @return T $removedItem
     */
    public function remove($key)
    {
        // Start of user code Collection.remove
        // TODO should be implemented.
        // End of user code
    
        return $removedItem;
    }

    /**
     * Return the object stored in the provided key slot.
     *
     * @param int $key
     * @return T $item
     */
    public function get($key)
    {
        // Start of user code Collection.get
        // TODO should be implemented.
        // End of user code
    
        return $item;
    }

    // Start of user code GenericCollection.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
