<?php

namespace TiBeN\Framework\Datatype;

// Start of user code AssociativeArray.useStatements
// Place your use statements here.
// End of user code

/**
 * Implementation of data container with methods to access data 
 *
 * @package Datatype
 * @author TiBeN
 */
class AssociativeArray implements \Iterator, \Countable
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

    public function __construct($TType = null)
    {
        $this->TType = $TType;

        // Start of user code AssociativeArray.constructor
        $this->items = array();
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code AssociativeArray.destructor
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
        // Start of user code Getter AssociativeArray.getItems
        // End of user code
        return $this->items;
    }

    /**
     * @param array $items
     */
    protected function setItems(array $items)
    {
        // Start of user code Setter AssociativeArray.setItems
        // End of user code
        $this->items = $items;
    }

    /**
     * Factory method to create an Associative from a language native array
     *
     * @param string $type
     * @param array $nativeArray
     * @return AssociativeArray $associativeArray
     */
    public static function createFromNativeArray($type, array $nativeArray)
    {
        // Start of user code AssociativeArray.createFromNativeArray
        $className = get_called_class();
        $associativeArray = new $className($type);
        foreach ($nativeArray as $key => $value) {
            self::typeHint($type, $value);
            $associativeArray->set($key, $value);
        }
        // End of user code
    
        return $associativeArray;
    }

    /**
     * Determine if a value is stored
     *
     * @param string $key
     * @return bool $result
     */
    public function has($key)
    {
        // Start of user code AssociativeArray.has
        $result = (isset($this->items) && isset($this->items[$key]));
        // End of user code
    
        return $result;
    }

    /**
     * Associate a value to a key and store it 
     *
     * @param string $key
     * @param T $value
     */
    public function set($key, $value)
    {
        $this->typeHint($this->TType, $value);
        // Start of user code AssociativeArray.set
        if (!isset($this->items)) {
            $this->items = array();
        }
        $this->items[$key] = $value;
        // End of user code
    }

    /**
     * Determine if the DataContainer is empty or not
     *
     * @return string $boolean
     */
    public function isEmpty()
    {
        // Start of user code AssociativeArray.isEmpty
        $boolean = (!isset($this->items) || empty($this->items));
        // End of user code
    
        return $boolean;
    }

    /**
     * Access to a value
     *
     * @param string $key
     * @return string $value
     */
    public function get($key)
    {
        // Start of user code AssociativeArray.get
        if (!isset($this->items[$key])) {
            throw new \InvalidArgumentException(
                sprintf('Key "%s" not found in container', $key)
            );
        }
        $value = $this->items[$key];
        // End of user code
    
        return $value;
    }

    /**
     * Merge the AssociativeArray with another
     *
     * @param AssociativeArray $associativeArray
     */
    public function merge(AssociativeArray $associativeArray)
    {
        // Start of user code AssociativeArray.merge
        !isset($this->items) && $this->items = array();
        $this->items = array_merge($this->items, $associativeArray->toNativeArray());
        // End of user code
    }

    /**
     * Search for an item and return an AssociativeArrayFindResult
     *
     * @param string $item
     * @return AssociativeArrayFindResult $result
     */
    public function find($item)
    {
        // Start of user code AssociativeArray.find
        $result = new AssociativeArrayFindResult();
        $result->setResult(false);
        
        if (isset($this->items)) {
            $search = array_search($item, $this->items);
            if ($search) {
                $result->setResult(true);
                $result->setKey($search);
            }
        }
        // End of user code
    
        return $result;
    }

    /**
     * Convert to a language native array
     *
     * @return array $nativeArray
     */
    public function toNativeArray()
    {
        // Start of user code AssociativeArray.toNativeArray
        $nativeArray = isset($this->items)
            ? $this->items
            : array()
        ;
        // End of user code
    
        return $nativeArray;
    }

    /**
     * Remove a value
     *
     * @param string $key
     */
    public function remove($key)
    {
        // Start of user code AssociativeArray.remove
        if (!isset($this->items) || !isset($this->items[$key])) {
            throw new InvalidArgumentException(
                sprintf('Key "%s" not found in container', $key)
            );
        }
        unset($this->items[$key]);
        // End of user code
    }

    // Iterator Realization

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

    // Countable Realization

    /**
     * Count elements of an object
     *
     * @return int $numberOfItems
     */
    public function count()
    {
        // Start of user code Countable.count
        $numberOfItems = (isset($this->items) && !empty($this->items))
            ? count($this->items)
            : 0
        ;
        // End of user code
    
        return $numberOfItems;
    }

    // Start of user code AssociativeArray.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
