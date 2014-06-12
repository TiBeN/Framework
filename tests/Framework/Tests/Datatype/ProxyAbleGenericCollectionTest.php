<?php

namespace TiBeN\Framework\Tests\Datatype;

use TiBeN\Framework\Datatype\ProxyAbleGenericCollection;

// Start of user code ProxyAbleGenericCollection.useStatements
use TiBeN\Framework\Tests\Fixtures\Datatype\SomeItem;
use TiBeN\Framework\Tests\Fixtures\Datatype\SomeOtherItem;
use TiBeN\Framework\Tests\Fixtures\Datatype\SomeItemToSomeOtherItemConverter;
use TiBeN\Framework\Datatype\GenericCollection;

// End of user code

/**
 * Test cases for class ProxyAbleGenericCollection
 * 
 * Start of user code ProxyAbleGenericCollectionTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\Datatype
 * @author TiBeN
 */
class ProxyAbleGenericCollectionTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code ProxyAbleGenericCollectionTest.attributes
    // Place additional tests attributes here.  
    // End of user code

    public function setUp()
    {
        // Start of user code ProxyAbleGenericCollectionTest.setUp
        // Place additional setUp code here.  
        // End of user code
    }

    public function tearDown()
    {
        // Start of user code ProxyAbleGenericCollectionTest.tearDown
        // Place additional tearDown code here.  
        // End of user code
    }
    
    

    /**
     * Test method defineAsSource from interface ProxyCollection
     * Start of user code ProxyCollection.testdefineAsSourceAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testDefineAsSource()
    {
        // Start of user code ProxyCollection.testdefineAsSource
        $collection = new GenericCollection();
        $someItem = new SomeItem();
        $someItem->someData = 'some_value';
        $collection->add($someItem);
        $proxyCollection = new ProxyAbleGenericCollection();
        $proxyCollection->defineAsProxyOf($collection, null);
        
        $proxyCollection->defineAsSource();     
        $this->assertFalse($proxyCollection->actAsAProxy());
        $this->assertCount(1, $proxyCollection);
        $this->assertEquals($someItem, $proxyCollection->get(0));
        // End of user code
    }
    
    /**
     * Test method actAsAProxy from interface ProxyCollection
     * Start of user code ProxyCollection.testactAsAProxyAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testActAsAProxy()
    {
        // Start of user code ProxyCollection.testactAsAProxy
        // This method is implicitly tested by 
        // "testDefineAsProxyOf" and "testDefineAsNative" 
        // End of user code
    }
    
    /**
     * Test method defineAsProxyOf from interface ProxyCollection
     * Start of user code ProxyCollection.testdefineAsProxyOfAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testDefineAsProxyOf()
    {
        // Start of user code ProxyCollection.testdefineAsProxyOf
        $collection = new GenericCollection();
        $someItem = new SomeItem();
        $someItem->someData = 'some_value';     
        $collection->add($someItem);
        $proxyCollection = new ProxyAbleGenericCollection();
        $proxyCollection->defineAsProxyOf($collection, null);
        $this->assertTrue($proxyCollection->actAsAProxy());
        $this->assertCount(1, $proxyCollection);
        $this->assertEquals($someItem, $proxyCollection->get(0));
        unset($collection);
        unset($proxyCollection);
        
        // Test Proxy conversion
        $collection = new GenericCollection(
            'TiBeN\\Framework\\Tests\\Fixtures\\Datatype\\SomeItem'
        );      
        $someItem = new SomeItem();
        $someItem->someData = 'hello_world';
        $someItem->tempCelsius = 0;     
        $collection->add($someItem);        

        $proxyCollection = new ProxyAbleGenericCollection(
            'TiBeN\\Framework\\Tests\\Fixtures\\Datatype\\SomeOtherItem'
        );      
        $proxyCollection->defineAsProxyOf(
            $collection, 
            new SomeItemToSomeOtherItemConverter()
        );

        $someConvertedItem = new SomeOtherItem();
        $someConvertedItem->someData = 'hello_world';
        $someConvertedItem->tempFarenheit = 32;

        $this->assertEquals($someConvertedItem, $proxyCollection->get(0));
        // End of user code
    }

    // Start of user code ProxyAbleGenericCollectionTest.methods

    /**
     * Test method remove from interface Collection 
     */
    public function testRemove() 
    {
        $collection = new ProxyAbleGenericCollection();
        $collection->add(new SomeItem());
        $this->assertInstanceOf(
            'TiBeN\\Framework\\Tests\\Fixtures\\Datatype\\SomeItem', 
            $collection->remove(0)
        );
        $this->assertCount(0, $collection);
        unset($collection);
        
        // Same test as a proxy collection
        $collection = new GenericCollection();
        $collection->add(new SomeItem());
        $proxyCollection = new ProxyAbleGenericCollection();
        $proxyCollection->defineAsProxyOf($collection);     
        $this->assertInstanceOf(
            'TiBeN\\Framework\\Tests\\Fixtures\\Datatype\\SomeItem', 
            $proxyCollection->remove(0)
        );
        $this->assertCount(0, $proxyCollection);        
        $this->assertCount(0, $collection);
        unset($collection);
        unset($proxyCollection);
        
        // test that returned item is converted
        $collection = new GenericCollection(
            'TiBeN\\Framework\\Tests\\Fixtures\\Datatype\\SomeItem'
        );      
        $item = new SomeItem();
        $item->tempCelsius = 0;
        
        $collection->add($item);        
        
        $proxyCollection = new ProxyAbleGenericCollection(
            'TiBeN\\Framework\\Tests\\Fixtures\\Datatype\\SomeOtherItem'
        );
        $proxyCollection->defineAsProxyOf(
            $collection, 
            new SomeItemToSomeOtherItemConverter()
        );
        
        $expectedItem = new SomeOtherItem();
        $expectedItem->tempFarenheit = 32;      
        $this->assertEquals($expectedItem, $proxyCollection->remove(0));    
    } 
    
    /**
     * Test method count from interface Countable
     */
    public function testCount()
    {
        $collection = new ProxyAbleGenericCollection();
        $this->assertCount(0, $collection);
        $collection->add(new SomeItem());
        $collection->add(new SomeItem());
        $collection->add(new SomeItem());
        $this->assertCount(3, $collection);
    
        // Same test as a proxy collection
        $proxyCollection = new ProxyAbleGenericCollection();
        $proxyCollection->defineAsProxyOf($collection);
        $this->assertCount(3, $proxyCollection);
    }
    
    /**
     * Test method isReadOnly from interface Collection
     */
    public function testIsReadOnly()
    {
        $collection = new GenericCollection();
        $collection->setAsReadOnly(true);
        $this->assertTrue($collection->isReadOnly());
    
        // Same test using proxy collection
        $proxyCollection = new ProxyAbleGenericCollection();
        $proxyCollection->defineAsProxyOf($collection);
        $this->assertTrue($collection->isReadOnly());
    }
    
    /**
     * Test method next from interface Iterator
     */
    public function testNext()
    {
        $collection = new ProxyAbleGenericCollection();
    
        $collection->add(new SomeItem());
        $collection->add(new SomeItem());
        $collection->set(1337, new SomeItem());
            
        $collection->next();
        $this->assertEquals(1, $collection->key());
        $collection->next();
        $this->assertEquals(1337, $collection->key());
    
        $collection->rewind();
    
        // Same test as a proxy collection
        $proxyCollection = new ProxyAbleGenericCollection();
        $proxyCollection->defineAsProxyOf($collection);
    
        $proxyCollection->next();
        $this->assertEquals(1, $proxyCollection->key());
        $proxyCollection->next();
        $this->assertEquals(1337, $proxyCollection->key());
    }   
        
    /**
     * Test method isEmpty from interface Collection
     */
    public function testIsEmpty()
    {
        $collection = new ProxyAbleGenericCollection();
        $this->assertTrue($collection->isEmpty());
    
        $collection->add(new SomeItem());
        $this->assertFalse($collection->isEmpty());
        unset($collection);
    
        // Same test as a proxy collection
        $collection = new GenericCollection();
        $proxyCollection = new ProxyAbleGenericCollection();
        $proxyCollection->defineAsProxyOf($collection);
    
        $this->assertTrue($proxyCollection->isEmpty());
    
        $proxyCollection->add(new SomeItem());
        $this->assertFalse($proxyCollection->isEmpty());
        unset($collection);
    }
        
    /**
     * Test method hasKey from interface Collection
     */
    public function testHasKey()
    {
        $collection = new ProxyAbleGenericCollection();
    
        $collection->add(new SomeItem());
        $collection->set(1337, new SomeItem());
    
        $this->assertTrue($collection->hasKey(0));
        $this->assertTrue($collection->hasKey(1337));
        $this->assertFalse($collection->hasKey(1));
    
        // Same test using proxy collection
        $proxyCollection = new ProxyAbleGenericCollection();
        $proxyCollection->defineAsProxyOf($collection);
        $this->assertTrue($proxyCollection->hasKey(0));
        $this->assertTrue($proxyCollection->hasKey(1337));
        $this->assertFalse($proxyCollection->hasKey(1));
    }
    
    /**
     * Test method setAsReadOnly from interface Collection
     */
    public function testSetAsReadOnly()
    {
        $collection = new ProxyAbleGenericCollection();
        $item = new SomeItem();
        $collection->add($item);
        $collection->setAsReadOnly(true);
        $this->assertTrue($collection->isReadOnly());
    
        $collection->setAsReadOnly(false);
        $this->assertFalse($collection->isReadOnly());
    
        $collection->remove(0);
         
        $this->assertCount(0, $collection);
         
        // Same test as a proxy collection
        $collection = new GenericCollection();
         
        $proxyCollection = new ProxyAbleGenericCollection();
        $proxyCollection->defineAsProxyOf($collection);
        $proxyCollection->setAsReadOnly(true);
         
        $this->assertTrue($proxyCollection->isReadOnly());
        $this->assertTrue($collection->isReadOnly());
    }

    /**
     * Test method rewind from interface Iterator
     */
    public function testRewind()
    {

        $collection = new ProxyAbleGenericCollection();
    
        $collection->add(new SomeItem());
        $collection->add(new SomeItem());
        $collection->add(new SomeItem());
            
        $collection->next();
        $collection->next();
        $collection->rewind();
        $this->assertEquals(0, $collection->key());
    
        // Same test using proxy collection
        $proxyCollection = new ProxyAbleGenericCollection();
        $proxyCollection->defineAsProxyOf($collection);
    
        $proxyCollection->next();
        $proxyCollection->next();
        $proxyCollection->rewind();
        $this->assertEquals(0, $proxyCollection->key());
        $this->assertEquals(0, $collection->key());
    }

    /**
     * Test method current from interface Iterator
     */
    public function testCurrent()
    {
        
        $collection = new ProxyAbleGenericCollection();
    
        $firstItem = new SomeItem('first_item');
        $secondItem = new SomeItem('second_item');
        $thirdItem = new SomeItem('third_item');
    
        $collection->add($firstItem);
        $collection->add($secondItem);
        $collection->add($thirdItem);
            
        $this->assertEquals($firstItem, $collection->current());
        $collection->next();
        $this->assertEquals($secondItem, $collection->current());
        $collection->next();
        $this->assertEquals($thirdItem, $collection->current());
    
        $collection->rewind();
    
        // Same test using proxy collection
        $proxyCollection = new ProxyAbleGenericCollection();
        $proxyCollection->defineAsProxyOf($collection);
    
        $this->assertEquals($firstItem, $proxyCollection->current());
        $proxyCollection->next();
        $this->assertEquals($secondItem, $proxyCollection->current());
    
        // Test to confirm that call next on primitive collection have effect on proxy
        $collection->next();
        $this->assertEquals($thirdItem, $proxyCollection->current());
    }

    /**
     * Test method set from interface Collection
     */
    public function testSet()
    {
        // Test setting to already set slot
        $collection = new ProxyAbleGenericCollection();
         
        $itemToReplace = new SomeItem();
        $itemToReplace->someData = 'item_to_replace';
        $replacedItem = new SomeItem();
        $replacedItem->someData = 'replaced_item';
        $collection->add($itemToReplace);
        $collection->set(0, $replacedItem);
        $this->assertEquals($replacedItem, $collection->get(0));
        unset($collection);
         
        // Test setting to an empty slot
        $collection = new ProxyAbleGenericCollection();
        $itemToSet = new SomeItem();
        $itemToSet->someData = 'item_to_set';
        $collection->set(1337, $itemToSet);
        $this->assertEquals($itemToSet, $collection->get(1337));
        unset($collection);
         
        // Same test using proxy collection
        $collection = new GenericCollection();
        $proxyCollection = new ProxyAbleGenericCollection();
        $proxyCollection->defineAsProxyOf($collection);
    
        $itemToSet = new SomeItem();
        $itemToSet->someData = 'item_to_set';
        $proxyCollection->set(1337, $itemToSet);
        $this->assertEquals($itemToSet, $proxyCollection->get(1337));
        $this->assertEquals($itemToSet, $collection->get(1337));
    }
    
    /**
     * Test method key from interface Iterator
     */
    public function testKey()
    {
        $collection = new ProxyAbleGenericCollection();
        $collection->set(5, new SomeItem());
        $collection->set(10, new SomeItem());
        $collection->set(1337, new SomeItem());
        $this->assertEquals(5, $collection->key());
        $collection->next();
        $collection->next();
        $this->assertEquals(1337, $collection->key());
        $collection->rewind();
        $this->assertEquals(5, $collection->key());
    
        // Same test using proxy collection
        $proxyCollection = new ProxyAbleGenericCollection();
        $proxyCollection->defineAsProxyOf($collection);
        $collection->next();
        $this->assertEquals(10, $proxyCollection->key());
    }

    /**
     * Test method valid from interface Iterator
     */
    public function testValid()
    {
        $collection = new ProxyAbleGenericCollection();
    
        $collection->add(new SomeItem());
        $collection->add(new SomeItem());
        $collection->set(1337, new SomeItem());
            
        $collection->next();
        $collection->next();
        $this->assertTrue($collection->valid());
    
        $collection->next();
        $this->assertFalse($collection->valid());
    
        $collection->rewind();
    
        // Same test using proxy collection
        $proxyCollection = new ProxyAbleGenericCollection();
        $proxyCollection->defineAsProxyOf($collection);
    
        $proxyCollection->next();
        $proxyCollection->next();
        $this->assertEquals(10, $proxyCollection->valid());
    
        $proxyCollection->next();
        $this->assertFalse($proxyCollection->valid());
    }

    /**
     * Test method clear from interface Collection
     */
    public function testClear()
    {
        $collection = new ProxyAbleGenericCollection();
        $collection->add(new SomeItem());
        $collection->add(new SomeItem());
        $collection->add(new SomeItem());
        $collection->clear();
        $this->assertCount(0, $collection);
    
        unset($collection);
    
        // Same test using proxy collection
        $collection = new GenericCollection();
        $collection->add(new SomeItem());
        $collection->add(new SomeItem());
        $collection->add(new SomeItem());
    
        $proxyCollection = new ProxyAbleGenericCollection();
        $proxyCollection->defineAsProxyOf($collection);
        $proxyCollection->clear();
    
        $this->assertCount(0, $proxyCollection);
        $this->assertCount(0, $collection);
    }           
                    
    /**
     * Test method get from interface Collection
     */
    public function testGet()
    {
        $collection = new ProxyAbleGenericCollection();
        $collection->add(new SomeItem());
        $this->assertInstanceOf(
            'TiBeN\\Framework\\Tests\\Fixtures\\Datatype\\SomeItem', 
            $collection->get(0)
        );
    
        // Same test using proxy collection
        $proxyCollection = new ProxyAbleGenericCollection();
        $proxyCollection->defineAsProxyOf($collection);
        $this->assertInstanceOf(
            'TiBeN\\Framework\\Tests\\Fixtures\\Datatype\\SomeItem', 
            $proxyCollection->get(0)
        );
    
        // Testing proxy conversion is covered by testDefineAsProxy
    }   

    /**
     * Test method add from interface Collection
     */
    public function testAdd()
    {
        $collection = new ProxyAbleGenericCollection();
        $collection->add(new SomeItem);
        $this->assertCount(1, $collection);
        unset($collection);
    
        // Same test using proxy collection
        $collection = new GenericCollection();
    
        $proxyCollection = new ProxyAbleGenericCollection();
        $proxyCollection->defineAsProxyOf($collection);
        $proxyCollection->add(new SomeItem);
        $this->assertCount(1, $proxyCollection);
        $this->assertCount(1, $collection);
        unset($collection);
        unset($proxyCollection);
    
        // Test adding an item to a proxy collection with 
        // converter store the converted item to primitive collection
        $collection = new GenericCollection(
            'TiBeN\\Framework\\Tests\\Fixtures\\Datatype\\SomeItem'
        );
    
        $proxyCollection = new ProxyAbleGenericCollection(
            'TiBeN\\Framework\\Tests\\Fixtures\\Datatype\\SomeOtherItem'
        );
        $proxyCollection->defineAsProxyOf(
            $collection, 
            new SomeItemToSomeOtherItemConverter()
        );
            
        $someOtherItem = new SomeOtherItem();
        $someOtherItem->tempFarenheit = 32;
        $proxyCollection->add($someOtherItem);
    
        $expectedItem = new SomeItem();
        $expectedItem->tempCelsius = 0;
        $this->assertEquals($expectedItem, $collection->get(0));    
    }   

    /**
     * Test define not empty collection as proxy exception
     *
     * @expectedException LogicException
     * @expectedMessage Setting collection as collection proxy is not applicable to collections having items
     */
    public function testDefineNotEmptyCollectionAsProxyException()
    {
        $collection = new GenericCollection();
        $proxyCollection = new ProxyAbleGenericCollection();
        $proxyCollection->add(new SomeItem());
        $proxyCollection->add(new SomeItem());
        $proxyCollection->defineAsProxyOf($collection);
    }
    
    /**
     * Test define collection as proxy with converter of an untyped collection exception
     *
     * @expectedException LogicException
     * @expectedMessage CollectionItemConverter can't be set to an untyped collection
     */
    public function testDefineCollectionAsProxyWithConverterOfAnUntypedCollectionException()
    {
        $collection = new GenericCollection();
        $proxyCollection = new ProxyAbleGenericCollection('SomeOtherItem');
        $proxyCollection->defineAsProxyOf(
            $collection, 
            new SomeItemToSomeOtherItemConverter()
        );
    }
    
    /**
     * Test define untyped collection as proxy with converter exception
     *
     * @expectedException LogicException
     * @expectedMessage CollectionItemConverter can't be set to an untyped collection
     */
    public function testDefineUntypedCollectionAsProxyWithConverterException()
    {
        $collection = new GenericCollection('SomeItem');
        $proxyCollection = new ProxyAbleGenericCollection();
        $proxyCollection->defineAsProxyOf(
            $collection, 
            new SomeItemToSomeOtherItemConverter()
        );
    }
    
    /**
     * Test define collection as proxy with converter that source type doesnt match collection item type exception
     *
     * @expectedException LogicException
     * @expectedMessage CollectionItemConverter source type 'SomeItem' doesn't match source collection type 'SomeOtherItem'
     */
    public function testDefineCollectionAsProxyWithConverterThatSourceTypeDoesntMatchCollectionItemTypeException()
    {
        $collection = new GenericCollection('SomeOtherItem');
        $proxyCollection = new ProxyAbleGenericCollection('SomeOtherItem');
        $proxyCollection->defineAsProxyOf(
            $collection, 
            new SomeItemToSomeOtherItemConverter()
        );
    }
    
    /**
     * Test define collection as proxy with converter that proxy type doesnt match proxy collection item type exception
     *
     * @expectedException LogicException
     * @expectedMessage CollectionItemConverter proxy type 'SomeOtherItem' doesn't match proxy collection type 'SomeItem'
     */
    public function testDefineCollectionAsProxyWithConverterThatProxyTypeDoesntPatchProxyCollectionItemTypeException()
    {
        $collection = new GenericCollection('SomeItem');
        $proxyCollection = new ProxyAbleGenericCollection('SomeItem');
        $proxyCollection->defineAsProxyOf(
            $collection, 
            new SomeItemToSomeOtherItemConverter()
        );
    }
    
    /**
     * Test define collection as proxy without converter where source collection type doesnt match proxy type
     *
     * @expectedException LogicException
     * @expectedMessage Without CollectionItemConverter, the proxy collection type must match source collection type
     */
    public function testDefineCollectionAsProxyWithoutConverterWhereSourceCollectionTypeDoesntMatchProxyType()
    {
        $collection = new GenericCollection('string');
        $proxyCollection = new ProxyAbleGenericCollection('integer');
        $proxyCollection->defineAsProxyOf($collection);
    }   
    
    /**
     * test removing an item that doesn't exist
     *
     * @expectedException InvalidArgumentException
     * @expectedMessage This collection contain no item at key 0
     */
    public function testRemovingAnItemThatDoesntExist()
    {
        $collection = new ProxyAbleGenericCollection();
        $collection->remove(0);
    }
    
    /**
     * test getting an item that doesn't exist
     *
     * @expectedException InvalidArgumentException
     * @expectedMessage This collection contain no item at key 0
     */
    public function testGettingAnItemThatDoesntExist()
    {
        $collection = new ProxyAbleGenericCollection();
        $collection->get(0);
    }
    
    /**
     * test Iterator implementation
     */
    public function testIteratorImplementation()
    {
        $collection = new ProxyAbleGenericCollection();
    
        $controlArray = array(
            array(
                'key' => 0,
                'value' => new SomeItem('first_item')
            ),
            array(
                'key' => 1,
                'value' => new SomeItem('second_item')
            ),
            array(
                'key' => 1337,
                'value' => new SomeItem('third_item')
            ),
        );
    
        foreach($controlArray as $item) {
            $collection->set($item['key'], $item['value']);
        }
    
        $i = 0;
    
        foreach($collection as $key => $item) {
            $this->assertEquals($controlArray[$i]['key'], $key);
            $this->assertEquals($controlArray[$i]['value'], $item);
            $i++;
        }
    
        $collection->rewind();
    
        // Same test using proxy collection
        $proxyCollection = new ProxyAbleGenericCollection();
        $proxyCollection->defineAsProxyOf($collection);
    
        $i = 0;
    
        foreach($proxyCollection as $key => $item) {
            $this->assertEquals($controlArray[$i]['key'], $key);
            $this->assertEquals($controlArray[$i]['value'], $item);
            $i++;
        }
    }
    
    /**
     * Test untyped collections
     */
    public function testUntypedCollections() 
    {
        // Testing adding various objects kinds
        $collection = new ProxyAbleGenericCollection();
        $collection->add(new SomeItem());
        $collection->set(1, new SomeOtherItem());
        $this->assertCount(2, $collection);
    
        // Same test using proxy collection
        $proxyCollection = new ProxyAbleGenericCollection();
        $proxyCollection->defineAsProxyOf($collection);
    
        $proxyCollection->add(new SomeItem());
        $proxyCollection->set(1337, new SomeOtherItem());
    }
    
    /**
     * Test add an Item of different type than collection type exception
     *
     * @expectedException InvalidArgumentException
     * @expectedExceptionArgument The type of the item to add doesn't match the type of the collection
     */
    public function testAddAnItemOfDifferentTypeThanCollectionTypeException()
    {
        $collection = new ProxyAbleGenericCollection('SomeItem');
    
        $unauthorizedItem = new SomeOtherItem();
        $collection->add($unauthorizedItem);
    }
    
    /**
     * Test set an Item of different type than collection type exception
     *
     * @expectedException InvalidArgumentException
     * @expectedExceptionArgument The type of the item to set doesn't match the type of the collection
     */
    public function testSetAnItemOfDifferentTypeThanCollectionTypeException()
    {
        $collection = new ProxyAbleGenericCollection('SomeItem');
        $unauthorizedItem = new SomeOtherItem();
        $collection->set(1, $unauthorizedItem);
    }
    
    /**
     * Test define an already native collection as native
     *
     * @expectedException LogicException
     * @expectedExceptionArgument A non proxy collection can't be set as native
     */
    public function testDefineAnAlreadySourceCollectionAsNative()
    {
        $collection = new ProxyAbleGenericCollection();
        $collection->defineAsSource();
    }
    
    /**
     * Test adding an item to a read only collection
     *
     * @expectedException LogicException
     * @expectedExceptionArgument Adding an item to a read only collection is not allowed
     */
    public function testAddingAnItemToAReadOnlyCollection()
    {
        $collection = new ProxyAbleGenericCollection();
        $collection->setAsReadOnly(true);
        $collection->add(new SomeItem());
    }
    
    /**
     * Test setting an item to a read only collection
     *
     * @expectedException LogicException
     * @expectedExceptionArgument Setting an item to a read only collection is not allowed
     */
    public function testSettingAnItemToAReadOnlyCollection()
    {
        $collection = new ProxyAbleGenericCollection();
        $collection->setAsReadOnly(true);
        $collection->set(0, new SomeItem());
    }
    
    /**
     * Test removing an item to a read only collection
     *
     * @expectedException LogicException
     * @expectedExceptionArgument Removing an item to a read only collection is not allowed
     */
    public function testRemovingAnItemToAReadOnlyCollection()
    {
        $collection = new ProxyAbleGenericCollection();
        $collection->add(new SomeItem());
        $collection->setAsReadOnly(true);
        $collection->remove(0);
    } 
    // End of user code
}
