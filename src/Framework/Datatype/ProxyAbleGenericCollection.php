<?php

namespace TiBeN\Framework\Datatype;

// Start of user code ProxyAbleGenericCollection.useStatements
// Place your use statements here.
// End of user code

/**
 * Generic implementation of Collection interface.
 *
 * @package Datatype
 * @author TiBeN
 */
class ProxyAbleGenericCollection extends GenericCollection implements ProxyCollection
{
    /**
     * Type of the element T
     * @var String
     */
    protected $TType;

    /**
     * @var bool
     */
    private $actAsAProxy;

    /**
     * @var Collection
     */
    protected $collection;

    /**
     * @var Converter
     */
    protected $converter;

    // Start of user code ProxyAbleGenericCollection.surchargedConstructorsDestructors
    // Surcharge Constructors and Destructors here
    // End of user code
    
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
     * @return bool
     */
    private function getActAsAProxy()
    {
        // Start of user code Getter ProxyAbleGenericCollection.getActAsAProxy
        // End of user code
        return $this->actAsAProxy;
    }

    /**
     * @param bool $actAsAProxy
     */
    private function setActAsAProxy($actAsAProxy)
    {
        // Start of user code Setter ProxyAbleGenericCollection.setActAsAProxy
        // End of user code
        $this->actAsAProxy = $actAsAProxy;
    }

    /**
     * @return Collection
     */
    protected function getCollection()
    {
        // Start of user code Getter ProxyAbleGenericCollection.getCollection
        // End of user code
        return $this->collection;
    }

    /**
     * @param Collection $collection
     */
    protected function setCollection(Collection $collection)
    {
        // Start of user code Setter ProxyAbleGenericCollection.setCollection
        // End of user code
        $this->collection = $collection;
    }

    /**
     * @return Converter
     */
    protected function getConverter()
    {
        // Start of user code Getter ProxyAbleGenericCollection.getConverter
        // End of user code
        return $this->converter;
    }

    /**
     * @param Converter $converter
     */
    protected function setConverter(Converter $converter)
    {
        // Start of user code Setter ProxyAbleGenericCollection.setConverter
        // End of user code
        $this->converter = $converter;
    }

    // ProxyCollection Realization

    /**
     * Detach the proxy collection from the initial collection and dump all items contained in the initial collection.
     * If the proxy collection is configured with a CollectionItemConverter, all items will converted during the dump.
     * If the initial collection has a stream or lazy fetching behavior this operation can 
     * issue some performance drawbacks because it browse all the collection during the dump.
     */
    public function defineAsSource()
    {
        // Start of user code ProxyCollection.defineAsSource
		if(!$this->actAsAProxy) {
			throw new \LogicException(
                'A non proxy collection can\'t be set as native'
            );
		}
		
		/* Dump data using internal iterator. */
		foreach($this as $key => $item) {
			$this->items[$key] = $item;
		}
		
		$this->actAsAProxy = false;
		$this->collection = null; 
        // End of user code
    }

    /**
     * Define this collection to act as a proxy of another collection. 
     * By specifying a CollectionItemConverter object, The stored objects 
     * of the initial collection are converted in both direction when manipulated by the proxy collection. 
     * This means that when an item is added to a proxy collection, the item will be converted 
     * using the converter then stored in the initial collection. Using getters methods, the requested object is converted before returned.
     * The collection that will act as proxy must be empty otherwise it will throw an exception. 
     *
     * @param Collection $collection
     * @param Converter $converter
     */
    public function defineAsProxyOf(Collection $collection, Converter $converter = NULL)
    {
        // Start of user code ProxyCollection.defineAsProxyOf
		if(!$this->isEmpty()) {
			throw new \LogicException(
				'Setting collection as collection proxy is not applicable to collections having items'
			);
		}
		$collectionItemType = $collection->getTType();
		if(!is_null($converter) && is_null($collectionItemType)) {
			throw new \LogicException(
				'CollectionItemConverter can\'t be set to an untyped collection'
			);
		}
		if(!is_null($converter) && is_null($this->TType)) {
		    throw new \LogicException(
		        'CollectionItemConverter can\'t be set to an untyped proxy collection'
		    );
		}		
		if(!is_null($converter) 
			&& !is_null($collectionItemType) 
			&& $converter->getTType() != $collectionItemType
		) {
			throw new \LogicException(
				sprintf(
					'CollectionItemConverter source type \'%s\' doesn\'t match source collection type \'%s\'',
					$converter->getTType(),
					$collectionItemType
				)
			);			
		}
		if(!is_null($converter)
		&& !is_null($this->TType)
		&& $converter->getUType() != $this->TType
		) {
		    throw new \LogicException(
	            sprintf(
                    'CollectionItemConverter proxy type \'%s\' doesn\'t match proxy collection type \'%s\'',
                    $converter->getUType(),
                    $this->TType
	            )
		    );
		}		
		if(
            is_null($converter)	  
            && (
                ( is_null($this->TType) && !is_null($collectionItemType) )  
                || ( !is_null($this->TType) && is_null($collectionItemType) )
                || ($this->TType !== $collectionItemType)        
		    )           
        ) {
		    throw new \LogicException(
	            'Without CollectionItemConverter, the proxy collection type must match source collection type'
		    );		    
		}
		$this->collection = $collection;
		$this->converter = $converter;		
		$this->actAsAProxy = true;
        // End of user code
    }

    /**
     * Determine whether the collection act as a proxy of another collection or not.
     *
     * @return bool $boolean
     */
    public function actAsAProxy()
    {
        // Start of user code ProxyCollection.actAsAProxy
		return $this->actAsAProxy;
        // End of user code
    
        return $boolean;
    }

    // Start of user code ProxyAbleGenericCollection.surchargedMethods
    
    /**
	 * Define the collection as read only. All writing method then throws exceptions. 
     *
	 * @param bool $boolean
	 */
	public function setAsReadOnly($boolean)
	{
		return $this->actAsAProxy
            ? $this->collection->setAsReadOnly($boolean)
            : parent::setAsReadOnly($boolean)
		;		 
	}
	
	/**
	 * Insert of replace an item at the provided key slot.
     *
	 * @param int $key
	 * @param T $itemToSet
	 */
	public function set($key, $itemToSet)
	{	    	
	    if($this->actAsAProxy) {
	        if(isset($this->converter)) {
	            $itemToSet = $this->converter->reverse($itemToSet);
	        }
	        return $this->collection->set($key, $itemToSet);
	    }
	    return parent::set($key, $itemToSet);
	}	

	/**
	 * Returns the key of the current element.
     *
	 * @return int $key
	 */
	public function key()
	{
	    return $this->actAsAProxy
	       ? $this->collection->key()
	       : parent::key()
	    ;	
	}	

	/**
	 * Return the object stored in the provided key slot.
     *
	 * @param int $key
	 * @return T $item
	 */
	public function get($key)
	{
	    if($this->actAsAProxy) {
	        return isset($this->converter)
	           ? $this->converter->convert($this->collection->get($key))
	           : $this->collection->get($key)
	        ;
	    }
	    else {
	       return parent::get($key);    
	    }	
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
	    if($this->actAsAProxy) {
	        return isset($this->converter)
	           ? $this->converter->convert($this->collection->remove($key))
	           : $this->collection->remove($key)
	        ;
	    }
		else {
	       return parent::remove($key);    
	    }	
	}
	
	/**
	 * Rewinds back to the first element of the Iterator.
	 */
	public function rewind()
	{	
	    if($this->actAsAProxy) {
	        $this->collection->rewind();	        
	    }
	    else {
	        parent::rewind();
	    }	    
	}
	/**
	 * Count elements of an object
     *
	 * @return int $numberOfItems
	 */
	public function count()
	{
	    return $this->actAsAProxy
	       ? $this->collection->count()
	       : parent::count()
	    ;	
	}
	
	/**
	 * Reset the collection by deleting all item it contain.
	 */
	public function clear()
	{
	    if($this->actAsAProxy) {
	        $this->collection->clear();
	    }
	    else {
	        parent::clear();
	    }	    
	}

	/**
	 * Adding a new item to the end of the collection.
     *
	 * @param T $itemToAdd
	 */
	public function add($itemToAdd)
	{
	    if($this->actAsAProxy) {	        
	       $itemToAdd = isset($this->converter)
                ? $this->converter->reverse($itemToAdd)
                : $itemToAdd
	       ;
	       return $this->collection->add($itemToAdd);
	    }
	    else {
	        return parent::add($itemToAdd);
	    }	    
	}

	/**
	 * check if the current position is valid.
     *
	 * @return T $currentItem
	 */
	public function current()
	{
	    return $this->actAsAProxy
            ? $this->collection->current()
            : parent::current()
        ;	    
	}
	

	/**
	 * Tell whether the collection is read only or not.
     *
	 * @return bool $boolean
	 */
	public function isReadOnly()
	{
	    return $this->actAsAProxy
	       ? $this->collection->isReadOnly()
	       : parent::isReadOnly()
	    ;	    
	}

	/**
	 * Tell whether the collection is empty or not.
     *
	 * @return bool $boolean
	 */
	public function isEmpty()
	{
	    return $this->actAsAProxy
    	    ? $this->collection->isEmpty()
    	    : parent::isEmpty()
	    ;
	}

	/**
	 * @return bool $boolean
	 */
	public function valid()
	{
	    return $this->actAsAProxy
    	    ? $this->collection->valid()
    	    : parent::valid()
	    ;
	}

	/**
	 * Tell wheter an item is stored in the provided key slot.
     *
	 * @param int $key
	 * @return bool $boolean
	 */
	public function hasKey($key)
	{
	    return $this->actAsAProxy
	       ? $this->collection->hasKey($key)
	       : parent::hasKey($key)
	    ;
	}

	/**
	 * Moves the current position to the next element.
	 */
	public function next()
	{
	    if($this->actAsAProxy) {
	        $this->collection->next();
	    }
	    else {
	       parent::next();    
	    }	    
	}
    // End of user code

    // Start of user code ProxyAbleGenericCollection.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
