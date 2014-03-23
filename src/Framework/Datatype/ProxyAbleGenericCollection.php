<?php

namespace TiBeN\Framework\Datatype;


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
     * @var Collection
     */
    protected $collection;

    /**
     * @var Converter
     */
    protected $converter;

    /**
     * @var bool
     */
    private $actAsAProxy;

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
        // TODO should be implemented.
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
        // TODO should be implemented.
        // End of user code
    
        return $boolean;
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
        // TODO should be implemented.
        // End of user code
    }
    // Start of user code ProxyAbleGenericCollection.surchargedMethods
    // Surcharge Methods here
    // End of user code

    // Start of user code ProxyAbleGenericCollection.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
