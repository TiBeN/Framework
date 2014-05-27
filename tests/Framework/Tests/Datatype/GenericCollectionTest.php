<?php

namespace TiBeN\Framework\Tests\Datatype;

use TiBeN\Framework\Datatype\GenericCollection;

// Start of user code GenericCollection.useStatements
use TiBeN\Framework\Tests\Fixtures\Datatype\SomeItem;
use TiBeN\Framework\Tests\Fixtures\Datatype\SomeOtherItem;

// End of user code

/**
 * Test cases for class GenericCollection
 * 
 * Start of user code GenericCollectionTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\Datatype
 * @author TiBeN
 */
class GenericCollectionTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code GenericCollectionTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code GenericCollectionTest.setUp
		// Place additional setUp code here.  
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code GenericCollectionTest.tearDown
		// Place additional tearDown code here.  
		// End of user code
    }
    
    /**
     * Test static method createFromNativeArray from class GenericCollection
     *
     * Start of user code GenericCollectionTest.testcreateFromNativeArrayAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testCreateFromNativeArray()
    {
        // Start of user code GenericCollectionTest.testcreateFromNativeArray
	    $expectedCollection = new GenericCollection('string');
		$expectedCollection->add('foo');
		$expectedCollection->add('bar');
		$expectedCollection->add('baz');
		$this->assertEquals(
            $expectedCollection, 
            GenericCollection::createFromNativeArray(
                'string', 
                array('foo', 'bar', 'baz')
            )
        );
		
		// Ensure that key are removed with associativeArray
		$this->assertEquals(
            $expectedCollection, 
            GenericCollection::createFromNativeArray(
                'string', 
                array(
                    'foo' => 'foo',
                    'bar' => 'bar',
                    'baz' => 'baz'
                )
            )
        );
		// End of user code
    }

    /**
     * Test method set from interface Collection
     * Start of user code Collection.testsetAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testSet()
    {
        // Start of user code Collection.testset
        
        // Test setting to already set slot
	    $collection = new GenericCollection();
	    
	    $itemToReplace = new SomeItem();
	    $itemToReplace->someData = 'item_to_replace';
	    $replacedItem = new SomeItem();
	    $replacedItem->someData = 'replaced_item';
		$collection->add($itemToReplace);
		$collection->set(0, $replacedItem);
	    $this->assertEquals($replacedItem, $collection->get(0));
	    unset($collection);
	    
	    // Test setting to an empty slot
	    $collection = new GenericCollection();
	    $itemToSet = new SomeItem();
	    $itemToSet->someData = 'item_to_set';	    
	    $collection->set(1337, $itemToSet);
	    $this->assertEquals($itemToSet, $collection->get(1337));
	    unset($collection);
    	// End of user code
    }
    
    /**
     * Test method clear from interface Collection
     * Start of user code Collection.testclearAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testClear()
    {
        // Start of user code Collection.testclear
        $collection = new GenericCollection();
		$collection->add(new SomeItem());
		$collection->add(new SomeItem());
		$collection->add(new SomeItem());
		$collection->clear();
		$this->assertCount(0, $collection);
		
		unset($collection);
    	// End of user code
    }
    
    /**
     * Test method key from interface Collection
     * Start of user code Collection.testkeyAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testKey()
    {
        // Start of user code Iterator.testkey
        $collection = new GenericCollection();
		$collection->set(5, new SomeItem());
		$collection->set(10, new SomeItem());
		$collection->set(1337, new SomeItem());				
		$this->assertEquals(5, $collection->key());
		$collection->next();
		$collection->next();
		$this->assertEquals(1337, $collection->key());
		$collection->rewind();
		$this->assertEquals(5, $collection->key());
    	// End of user code
    }
    
    /**
     * Test method next from interface Collection
     * Start of user code Collection.testnextAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testNext()
    {
        // Start of user code Iterator.testnext
        $collection = new GenericCollection();
		
		$collection->add(new SomeItem());
		$collection->add(new SomeItem());
		$collection->set(1337, new SomeItem());
			
		$collection->next();
		$this->assertEquals(1, $collection->key());
		$collection->next();
		$this->assertEquals(1337, $collection->key());
		
		$collection->rewind();
    	// End of user code
    }
    
    /**
     * Test method hasKey from interface Collection
     * Start of user code Collection.testhasKeyAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testHasKey()
    {
        // Start of user code Collection.testhasKey
        $collection = new GenericCollection();
		
		$collection->add(new SomeItem());		
		$collection->set(1337, new SomeItem());

		$this->assertTrue($collection->hasKey(0));
		$this->assertTrue($collection->hasKey(1337));
		$this->assertFalse($collection->hasKey(1));
    	// End of user code
    }
    
    /**
     * Test method isEmpty from interface Collection
     * Start of user code Collection.testisEmptyAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testIsEmpty()
    {
        // Start of user code Collection.testisEmpty
        $collection = new GenericCollection();
		$this->assertTrue($collection->isEmpty());

		$collection->add(new SomeItem());
		$this->assertFalse($collection->isEmpty());	
		unset($collection);
    	// End of user code
    }
    
    /**
     * Test method valid from interface Collection
     * Start of user code Collection.testvalidAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testValid()
    {
        // Start of user code Iterator.testvalid
        $collection = new GenericCollection();
		
		$collection->add(new SomeItem());
		$collection->add(new SomeItem());
		$collection->set(1337, new SomeItem());
			
		$collection->next();
		$collection->next();
		$this->assertTrue($collection->valid());
		
		$collection->next();
		$this->assertFalse($collection->valid());

		$collection->rewind();
    	// End of user code
    }
    
    /**
     * Test method count from interface Collection
     * Start of user code Collection.testcountAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testCount()
    {
        // Start of user code Countable.testcount
        $collection = new GenericCollection();
		$this->assertCount(0, $collection);
		$collection->add(new SomeItem());
		$collection->add(new SomeItem());
		$collection->add(new SomeItem());		
		$this->assertCount(3, $collection);
    	// End of user code
    }
    
    /**
     * Test method rewind from interface Collection
     * Start of user code Collection.testrewindAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testRewind()
    {
        // Start of user code Iterator.testrewind
        $collection = new GenericCollection();
		
		$collection->add(new SomeItem());
		$collection->add(new SomeItem());
		$collection->add(new SomeItem());
			
		$collection->next();		
		$collection->next();
		$collection->rewind();
		$this->assertEquals(0, $collection->key());
    	// End of user code
    }
    
    /**
     * Test method get from interface Collection
     * Start of user code Collection.testgetAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testGet()
    {
        // Start of user code Collection.testget
        $collection = new GenericCollection();
		$collection->add(new SomeItem());
		$this->assertInstanceOf(
            'TiBeN\\Framework\\Tests\\Fixtures\\Datatype\\SomeItem',
            $collection->get(0)
        );
    	// End of user code
    }
    
    /**
     * Test method setAsReadOnly from interface Collection
     * Start of user code Collection.testsetAsReadOnlyAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testSetAsReadOnly()
    {
        // Start of user code Collection.testsetAsReadOnly
        $collection = new GenericCollection();
	    $item = new SomeItem();
	    $collection->add($item);	    
	    $collection->setAsReadOnly(true);	
	    $this->assertTrue($collection->isReadOnly());

	    $collection->setAsReadOnly(false);
	    $this->assertFalse($collection->isReadOnly());

	    $collection->remove(0);
	    
	    $this->assertCount(0, $collection);
    	// End of user code
    }
    
    /**
     * Test method remove from interface Collection
     * Start of user code Collection.testremoveAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testRemove()
    {
        // Start of user code Collection.testremove
        $collection = new GenericCollection();
		$collection->add(new SomeItem());
		$this->assertInstanceOf(
            'TiBeN\\Framework\\Tests\\Fixtures\\Datatype\\SomeItem', 
            $collection->remove(0)
        );
		$this->assertCount(0, $collection);
		unset($collection);
    	// End of user code
    }
    
    /**
     * Test method isReadOnly from interface Collection
     * Start of user code Collection.testisReadOnlyAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testIsReadOnly()
    {
        // Start of user code Collection.testisReadOnly
        $collection = new GenericCollection();
		$collection->setAsReadOnly(true);
		$this->assertTrue($collection->isReadOnly());
    	// End of user code
    }
    
    /**
     * Test method current from interface Collection
     * Start of user code Collection.testcurrentAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testCurrent()
    {
        // Start of user code Iterator.testcurrent
        $collection = new GenericCollection();
		
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
    	// End of user code
    }
    
    /**
     * Test method add from interface Collection
     * Start of user code Collection.testaddAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testAdd()
    {
        // Start of user code Collection.testadd
        $collection = new GenericCollection();		
		$collection->add(new SomeItem);
		$this->assertCount(1, $collection);
		unset($collection);
    	// End of user code
    }

    // Start of user code GenericCollectionTest.methods

	/**
	 * test removing an item that doesn't exist  
     *
	 * @expectedException InvalidArgumentException
	 * @expectedMessage This collection contain no item at key 0
	 */
	public function testRemovingAnItemThatDoesntExist()
	{
		$collection = new GenericCollection();
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
		$collection = new GenericCollection();
		$collection->get(0);
	}	
	
	/**
	 * test Iterator implementation
	 */
	public function testIteratorImplementation() 
	{	
		$collection = new GenericCollection();
				
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
	}
	
	/**
	 * Test untyped collections	  
	 */
	public function testUntypedCollections() 
    {
		// Testing adding various objects kinds
		$collection = new GenericCollection();
		$collection->add(new SomeItem());
		$collection->set(1, new SomeOtherItem());
		$this->assertCount(2, $collection);		
	}
	
	/**
	 * Test add an Item of different type than collection type exception
     *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionArgument The type of the item to add doesn't match the type of the collection
	 */
	public function testAddAnItemOfDifferentTypeThanCollectionTypeException()
	{		
		$collection = new GenericCollection('SomeItem');		
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
		$collection = new GenericCollection('SomeItem');		
		$unauthorizedItem = new SomeOtherItem();
		$collection->set(1, $unauthorizedItem);	
	}	
	
	/**
	 * Test adding an item to a read only collection
     *
	 * @expectedException LogicException
	 * @expectedExceptionArgument Adding an item to a read only collection is not allowed
	 */
	public function testAddingAnItemToAReadOnlyCollection()
	{
		$collection = new GenericCollection();				
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
		$collection = new GenericCollection();
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
		$collection = new GenericCollection();
		$collection->add(new SomeItem());
		$collection->setAsReadOnly(true);
		$collection->remove(0);
	}
    // End of user code
}
