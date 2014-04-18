<?php

namespace TiBeN\Framework\Datatype;

/**
 * Interface for collection classes adding the ability for a collection to be a proxy of another collection object.
 * By defining an converter object that implement the CollectionItemConverter interface, the objects handled by the initial collection can automatically 
 * be converted (or cast) to another type when manipulated through the proxy collection object in both directions (in and out).  
 *
 * @package Datatype
 * @author TiBeN
 */ 
interface ProxyCollection
{
	/**
	 * Determine whether the collection act as a proxy of another collection or not.
	 *
	 * @return bool $boolean
	 */
	public function actAsAProxy();

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
	public function defineAsProxyOf(Collection $collection, Converter $converter = NULL);

	/**
	 * Detach the proxy collection from the initial collection and dump all items contained in the initial collection.
	 * If the proxy collection is configured with a CollectionItemConverter, all items will converted during the dump.
	 * If the initial collection has a stream or lazy fetching behavior this operation can 
	 * issue some performance drawbacks because it browse all the collection during the dump.
	 */
	public function defineAsSource();

}
