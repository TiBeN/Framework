<?php

namespace TiBeN\Framework\Tests\Datatype;

use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code AssociativeArray.useStatements
use TiBeN\Framework\Datatype\AssociativeArrayFindResult;
use TiBeN\Framework\Tests\Fixtures\Datatype\SomeItem;

// End of user code

/**
 * Test cases for class AssociativeArray
 * 
 * Start of user code AssociativeArrayTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @author TiBeN
 */
class AssociativeArrayTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code AssociativeArrayTest.attributes
    // Place additional tests attributes here.
    // End of user code

    public function setUp()
    {
        // Start of user code AssociativeArrayTest.setUp
        // Place additional setUp code here.
        // End of user code
    }

    public function tearDown()
    {
        // Start of user code AssociativeArrayTest.tearDown
        // Place additional tearDown code here.
        // End of user code
    }
    
    /**
     * Test method find from class AssociativeArray
     *
     * Start of user code AssociativeArrayTest.testfindAnnotations
     * PHPUnit users annotations can be placed here
     * End of user code
     */
    public function testFind()
    {
        // Start of user code AssociativeArrayTest.testfind
        $associativeArray = new AssociativeArray('string');
        $associativeArray->set('foo', 'bar');
        $associativeArray->set('foo2', 'bar');
        $associativeArray->set('foo3', 'bar');

        $expectedResult = new AssociativeArrayFindResult();
        $expectedResult->setKey('foo');
        $expectedResult->setResult(true);
        
        $this->assertEquals($expectedResult, $associativeArray->find('bar'));
        
        $expectedResult = new AssociativeArrayFindResult();         
        $expectedResult->setResult(false);
        
        $this->assertEquals($expectedResult, $associativeArray->find('unknown'));
        // End of user code
    }
    
    /**
     * Test method merge from class AssociativeArray
     *
     * Start of user code AssociativeArrayTest.testmergeAnnotations
     * PHPUnit users annotations can be placed here
     * End of user code
     */
    public function testMerge()
    {
        // Start of user code AssociativeArrayTest.testmerge
        
        // Case 1 : AssociativeArrays to merge have not common keys
        $associativeArray = new AssociativeArray('string');
        $associativeArray->set('foo1', 'bar1');
        
        $associativeArrayToMerge = new AssociativeArray('string');
        $associativeArrayToMerge->set('foo2', 'bar2');
        
        $expectedAssociativeArray = new AssociativeArray('string');
        $expectedAssociativeArray->set('foo1', 'bar1');
        $expectedAssociativeArray->set('foo2', 'bar2');
        
        $associativeArray->merge($associativeArrayToMerge);
        
        $this->assertEquals($expectedAssociativeArray, $associativeArray);
        
        // Case 2 : AssociativeArrays have common keys
        $associativeArray = new AssociativeArray('string');
        $associativeArray->set('foo', 'bar1');
        
        $associativeArrayToMerge = new AssociativeArray('string');
        $associativeArrayToMerge->set('foo', 'bar2');
        
        $expectedAssociativeArray = new AssociativeArray('string');
        $expectedAssociativeArray->set('foo', 'bar2');
        
        $associativeArray->merge($associativeArrayToMerge);
        
        $this->assertEquals($expectedAssociativeArray, $associativeArray);
        // End of user code
    }
    
    /**
     * Test method toNativeArray from class AssociativeArray
     *
     * Start of user code AssociativeArrayTest.testtoNativeArrayAnnotations
     * PHPUnit users annotations can be placed here
     * End of user code
     */
    public function testToNativeArray()
    {
        // Start of user code AssociativeArrayTest.testtoNativeArray
        $associativeArray = new AssociativeArray('string');
        $associativeArray->set('foo', 'bar');
        $associativeArray->set('foo2', 'bar');
        $associativeArray->set('foo3', 'bar');
            
        $expectedArray = array(
            'foo' => 'bar',
            'foo2' => 'bar',
            'foo3' => 'bar'
        );
        
        $this->assertEquals($expectedArray, $associativeArray->toNativeArray());
        // End of user code
    }
    
    /**
     * Test static method createFromNativeArray from class AssociativeArray
     *
     * Start of user code AssociativeArrayTest.testcreateFromNativeArrayAnnotations
     * PHPUnit users annotations can be placed here
     * End of user code
     */
    public function testCreateFromNativeArray()
    {
        // Start of user code AssociativeArrayTest.testcreateFromNativeArray
        $expectedAssociativeArray = new AssociativeArray('string');
        $expectedAssociativeArray->set('foo', 'bar');
        $expectedAssociativeArray->set('foo2', 'bar');
        $expectedAssociativeArray->set('foo3', 'bar');
            
        $this->assertEquals(
            $expectedAssociativeArray, 
            AssociativeArray::createFromNativeArray('string', array(
                'foo' => 'bar',
                'foo2' => 'bar',
                'foo3' => 'bar'
            ))
        );
        // End of user code
    }
    
    /**
     * Test method isEmpty from class AssociativeArray
     *
     * Start of user code AssociativeArrayTest.testisEmptyAnnotations
     * PHPUnit users annotations can be placed here
     * End of user code
     */
    public function testIsEmpty()
    {
        // Start of user code AssociativeArrayTest.testisEmpty
        $associativeArray = new AssociativeArray('string');
        $this->assertEquals(true, $associativeArray->isEmpty());
        $associativeArray->set('foo', 'bar');
        $this->assertEquals(false, $associativeArray->isEmpty());
        // End of user code
    }
    
    /**
     * Test method has from class AssociativeArray
     *
     * Start of user code AssociativeArrayTest.testhasAnnotations
     * PHPUnit users annotations can be placed here
     * End of user code
     */
    public function testHas()
    {
        // Start of user code AssociativeArrayTest.testhas
        $associativeArray = new AssociativeArray('string');
        $associativeArray->set('foo', 'bar');
        $this->assertEquals(true, $associativeArray->has('foo'));
        $this->assertEquals(false, $associativeArray->has('unknown'));
        // End of user code
    }
    
    /**
     * Test method get from class AssociativeArray
     *
     * Start of user code AssociativeArrayTest.testgetAnnotations
     * PHPUnit users annotations can be placed here
     * End of user code
     */
    public function testGet()
    {
        // Start of user code AssociativeArrayTest.testget
        // Test method covered by testSet
        // End of user code
    }
    
    /**
     * Test method set from class AssociativeArray
     *
     * Start of user code AssociativeArrayTest.testsetAnnotations
     * PHPUnit users annotations can be placed here
     * End of user code
     */
    public function testSet()
    {
        // Start of user code AssociativeArrayTest.testset
        $associativeArray = new AssociativeArray('string');
        $associativeArray->set('foo', 'bar');
        $this->assertEquals('bar', $associativeArray->get('foo'));
        $associativeArray->set('foo', 'another-data');
        $this->assertEquals('another-data', $associativeArray->get('foo'));
        // End of user code
    }
    
    /**
     * Test method remove from class AssociativeArray
     *
     * Start of user code AssociativeArrayTest.testremoveAnnotations
     * @expectedException InvalidArgumentException
     * @expextedExceptionMessage Key "foo" not found in container 
     * End of user code
     */
    public function testRemove()
    {
        // Start of user code AssociativeArrayTest.testremove
        $associativeArray = new AssociativeArray('string');
        $associativeArray->set('foo', 'bar');
        $associativeArray->remove('foo');
        $associativeArray->get('foo');
        // End of user code
    }

    /**
     * Test method count from interface Countable
     * Start of user code Countable.testcountAnnotations
     * PHPUnit users annotations can be placed here
     * End of user code
     */
    public function testCount()
    {
        // Start of user code Countable.testcount
        $associativeArray = new AssociativeArray('string');    
		$this->assertEquals(0, $associativeArray->count());
		$associativeArray->set('foo', 'bar');
		$associativeArray->set('foo2', 'bar');
		$associativeArray->set('foo3', 'bar');
		$this->assertEquals(3, $associativeArray->count());
		$associativeArray->set('foo3', 'another-data');
		$this->assertEquals(3, $associativeArray->count());
        // End of user code
    }

    /**
     * Test method rewind from interface Iterator
     * Start of user code Iterator.testrewindAnnotations
     * PHPUnit users annotations can be placed here
     * End of user code
     */
    public function testRewind()
    {
        // Start of user code Iterator.testrewind
        $associativeArray = new AssociativeArray();
		$associativeArray->set('foo', new SomeItem());
		$associativeArray->set('bar', new SomeItem());
		$associativeArray->set('baz', new SomeItem());
		$associativeArray->next();		
		$associativeArray->next();
		$associativeArray->rewind();
		$this->assertEquals('foo', $associativeArray->key());
        // End of user code
    }
    
    /**
     * Test method key from interface Iterator
     * Start of user code Iterator.testkeyAnnotations
     * PHPUnit users annotations can be placed here
     * End of user code
     */
    public function testKey()
    {
        // Start of user code Iterator.testkey
        $associativeArray = new AssociativeArray();
		$associativeArray->set('foo', new SomeItem());
		$associativeArray->set('bar', new SomeItem());
		$associativeArray->set('baz', new SomeItem());				
		$this->assertEquals('foo', $associativeArray->key());
		$associativeArray->next();
		$associativeArray->next();
		$this->assertEquals('baz', $associativeArray->key());
		$associativeArray->rewind();
		$this->assertEquals('foo', $associativeArray->key());
        // End of user code
    }
    
    /**
     * Test method next from interface Iterator
     * Start of user code Iterator.testnextAnnotations
     * PHPUnit users annotations can be placed here
     * End of user code
     */
    public function testNext()
    {
        // Start of user code Iterator.testnext
        $associativeArray = new AssociativeArray();
		$associativeArray->set('foo', new SomeItem());
		$associativeArray->set('bar', new SomeItem());
		$associativeArray->set('baz', new SomeItem());
		$associativeArray->next();
		$this->assertEquals('bar', $associativeArray->key());
		$associativeArray->next();
		$this->assertEquals('baz', $associativeArray->key());
		$associativeArray->rewind();
        // End of user code
    }
    
    /**
     * Test method current from interface Iterator
     * Start of user code Iterator.testcurrentAnnotations
     * PHPUnit users annotations can be placed here
     * End of user code
     */
    public function testCurrent()
    {
        // Start of user code Iterator.testcurrent
        $associativeArray = new AssociativeArray();
		$firstItem = new SomeItem('first_item');
		$secondItem = new SomeItem('second_item');
		$thirdItem = new SomeItem('third_item');
		$associativeArray->set('foo', $firstItem);
		$associativeArray->set('bar', $secondItem);
		$associativeArray->set('baz', $thirdItem);
		$this->assertEquals($firstItem, $associativeArray->current());
		$associativeArray->next();
		$this->assertEquals($secondItem, $associativeArray->current());
		$associativeArray->next();
		$this->assertEquals($thirdItem, $associativeArray->current());
		$associativeArray->rewind();
        // End of user code
    }
    
    /**
     * Test method valid from interface Iterator
     * Start of user code Iterator.testvalidAnnotations
     * PHPUnit users annotations can be placed here
     * End of user code
     */
    public function testValid()
    {
        // Start of user code Iterator.testvalid
        $associativeArray = new AssociativeArray();
		$associativeArray->set('foo', new SomeItem());
		$associativeArray->set('bar', new SomeItem());
		$associativeArray->set('baz', new SomeItem());
		$associativeArray->next();
		$associativeArray->next();
		$this->assertTrue($associativeArray->valid());
		$associativeArray->next();
		$this->assertFalse($associativeArray->valid());
		$associativeArray->rewind();
        // End of user code
    }

    // Start of user code AssociativeArrayTest.methods
    // Place additional tests methods here.
    // End of user code
}
