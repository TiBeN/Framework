<?php

namespace TiBeN\Framework\Datatype;

// Start of user code GenericCollection.useStatements
// Place your use statements here.
// End of user code

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
     * @var array
     */
    protected $items;

    /**
     * @var bool
     */
    protected $isReadOnly;

    /**
     * @var int
     */
    protected $iteratorPosition;

    public function __construct($TType = null)
    {
        $this->TType = $TType;

        // Start of user code GenericCollection.constructor
		$this->items = array();		
		$this->isReadOnly = false;
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
     * @param string $type
     * @param array $nativeArray
     * @return GenericCollection $genericCollection
     */
    public static function createFromNativeArray($type = NULL, array $nativeArray)
    {
        // Start of user code GenericCollection.createFromNativeArray
		$className = get_called_class();
		$genericCollection = new $className($type);
		foreach($nativeArray as $item) {
			$genericCollection->add($item);
		}
        // End of user code
    
        return $genericCollection;
    }

    // Collection Realization

    /**
     * Returns the key of the current element. 
     *
     * @return int $key
     */
    public function key()
    {
        // Start of user code Iterator.key
		$key = key($this->items);
        // End of user code
    
        return $key;
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
		if(!is_int($key)) {
			throw new \InvalidArgumentException(
                'the value of the key passed is not an integer'
            );
		}
		if(!isset($this->items[$key])) {
			throw new \InvalidArgumentException(
                sprintf('This collection contain no item at key %s', $key)
            );
		} 
		$item = $this->items[$key];
        // End of user code
    
        return $item;
    }

    /**
     * Count elements of an object
     *
     * @return int $numberOfItems
     */
    public function count()
    {
        // Start of user code Countable.count
		$numberOfItems = count($this->items);
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
		$boolean = empty($this->items);
        // End of user code
    
        return $boolean;
    }

    /**
     * Moves the current position to the next element. 
     */
    public function next()
    {
        // Start of user code Iterator.next
		next($this->items);
        // End of user code
    }

    /**
     * Rewinds back to the first element of the Iterator. 
     */
    public function rewind()
    {
        // Start of user code Iterator.rewind
		reset($this->items);		 
        // End of user code
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
		if($this->isReadOnly) {
			throw new \LogicException(
                'Removing an item to a read only collection is not allowed'
            );
		}		
		if(!is_int($key)) {
			throw new \InvalidArgumentException(
                'the value of the key passed is not an integer'
            );
		}
		if(empty($this->items[$key])) {
			throw new \InvalidArgumentException(
                sprintf('This collection contain no item at key %s', $key)
            );
		}
		$removedItem = $this->items[$key];
		unset($this->items[$key]);
        // End of user code
    
        return $removedItem;
    }

    /**
     * Tell whether the collection is read only or not.
     *
     * @return bool $boolean
     */
    public function isReadOnly()
    {
        // Start of user code Collection.isReadOnly
		$boolean = $this->isReadOnly;
        // End of user code
    
        return $boolean;
    }

    /**
     * Define the collection as read only. All writing method then throws exceptions. 
     *
     * @param bool $boolean
     */
    public function setAsReadOnly($boolean)
    {
        // Start of user code Collection.setAsReadOnly
		$this->isReadOnly = $boolean; 
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
		if($this->isReadOnly) {
			throw new \LogicException(
                'Adding an item to a read only collection is not allowed'
            );
		}
		if(isset($this->itemType) && get_class($itemToAdd) != $this->itemType) {
			throw new \InvalidArgumentException(
				'The type of the item to add doesn\'t match the type of the collection'
			);
		}
		if(empty($this->items)) {
			$newIndex = 0;
		}
		else {
			end($this->items);
			$newIndex = key($this->items)+1;
			reset($this->items);
		}			
		return $this->set($newIndex, $itemToAdd);
        // End of user code
    }

    /**
     * @return bool $boolean
     */
    public function valid()
    {
        // Start of user code Iterator.valid
		$boolean = current($this->items) !== false;
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
		$currentItem = current($this->items);	
        // End of user code
    
        return $currentItem;
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
		if($this->isReadOnly) {
			throw new \LogicException(
                'Setting an item to a read only collection is not allowed'
            );
		}
		$this->items[$key] = $itemToSet;
        // End of user code
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
		$boolean = isset($this->items[$key]);
        // End of user code
    
        return $boolean;
    }

    /**
     * Reset the collection by deleting all item it contain.
     */
    public function clear()
    {
        // Start of user code Collection.clear
		$this->items = array();
        // End of user code
    }

    // Start of user code GenericCollection.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
