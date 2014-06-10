<?php
    
namespace TiBeN\Framework\Tests\DataSource\MysqlDataSource;

use TiBeN\Framework\DataSource\MysqlDataSource\PdoRowCollection;
use TiBeN\Framework\DataSource\MysqlDataSource\PdoRowContainer;
use TiBeN\Framework\Tests\Fixtures\DataSource\MysqlDataSource\MysqlDataSourceTestSetupTearDown;
use TiBeN\Framework\Tests\Fixtures\Datatype\SomeItem;

/** 
 * Test cases for class PdoRowCollection
 *
 * @author TiBeN
 */ 
class PdoRowCollectionTest extends \PHPUnit_Framework_TestCase
{   

    public function setUp() 
    {           
        try {
            MysqlDataSourceTestSetupTearDown::setUp();
        }
        catch(Exception $e) {
            $this->markTestSkipped($e->getMessage());
        }       
        
        $pdo = MysqlDataSourceTestSetupTearDown::getPdoConnection($GLOBALS['db_name']);     
        $pdo->exec('CREATE TABLE test_pdo_row_collection (c CHAR(20) CHARACTER SET utf8 COLLATE utf8_bin, i INT);');    
        $pdo->exec('INSERT INTO test_pdo_row_collection (c,i) VALUES (\'youpi\', 1)');
        $pdo->exec('INSERT INTO test_pdo_row_collection (c,i) VALUES (\'prout\', 2)');
        $pdo->exec('INSERT INTO test_pdo_row_collection (c,i) VALUES (\'tralala\', 3)');
    }   

    public function tearDown() 
    {           
        MysqlDataSourceTestSetupTearDown::tearDown();
    }

    
    /**
     * Test method count from interface Countable 
     * Start of user code Countable.testcountAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     * 
     * @runInSeparateProcess
     */
    public function testCount() 
    {       
        $pdo = MysqlDataSourceTestSetupTearDown::getPdoConnection($GLOBALS['db_name']);
        $pdoStatement = $pdo->query('SELECT * FROM test_pdo_row_collection');       
        $pdoRowCollection = new PdoRowCollection($pdoStatement);        
        $this->assertCount(3, $pdoRowCollection);       
    }
    
    /**
     * Test method add from interface Collection 
     * @expectedException LogicException
     * @expectedExceptionMessage Adding an item to a read only collection is not allowed
     */
    public function testAdd() 
    {
        $pdo = MysqlDataSourceTestSetupTearDown::getPdoConnection($GLOBALS['db_name']);
        $pdoStatement = $pdo->query('SELECT * FROM test_pdo_row_collection');       
        $pdoRowCollection = new PdoRowCollection($pdoStatement);
        $pdoRowCollection->add(new SomeItem());
    }
    
    /**
     * Test method remove from interface Collection 
     * @expectedException LogicException
     * @expectedExceptionArgument Removing an item to a read only collection is not allowed
     */
    public function testRemove() 
    {
        $pdo = MysqlDataSourceTestSetupTearDown::getPdoConnection($GLOBALS['db_name']);
        $pdoStatement = $pdo->query('SELECT * FROM test_pdo_row_collection');       
        $pdoRowCollection = new PdoRowCollection($pdoStatement);
        $pdoRowCollection->remove(0);
    }
    
    /**
     * Test method isReadOnly from interface Collection
     */
    public function testIsReadOnly() 
    {
        $pdo = MysqlDataSourceTestSetupTearDown::getPdoConnection($GLOBALS['db_name']);
        $pdoStatement = $pdo->query('SELECT * FROM test_pdo_row_collection');       
        $pdoRowCollection = new PdoRowCollection($pdoStatement);
        $this->assertTrue($pdoRowCollection->isReadOnly());
    }
    
    /**
     * Test method next from interface Iterator
     */
    public function testNext() 
    {
        $pdo = MysqlDataSourceTestSetupTearDown::getPdoConnection($GLOBALS['db_name']);
        $pdoStatement = $pdo->query('SELECT * FROM test_pdo_row_collection');
        $pdoRowCollection = new PdoRowCollection($pdoStatement);
        $pdoRowCollection->next();
        
        $pdoRow = new PdoRowContainer();
        $pdoRow->set('c', 'prout');
        $pdoRow->set('i', '2');     
        
        $this->assertEquals($pdoRow, $pdoRowCollection->current());             
    }
    
    /**
     * Test method isEmpty from interface Collection
     */
    public function testIsEmpty() 
    {
        $pdo = MysqlDataSourceTestSetupTearDown::getPdoConnection($GLOBALS['db_name']);
        $pdoStatement = $pdo->query('SELECT * FROM test_pdo_row_collection WHERE c = \'inexistant value\'');
                
        $pdoRowCollection = new PdoRowCollection($pdoStatement);
        $this->assertTrue($pdoRowCollection->isEmpty());
        
        $pdoStatement = $pdo->query('SELECT * FROM test_pdo_row_collection');
        $pdoRowCollection = new PdoRowCollection($pdoStatement);

        $this->assertFalse($pdoRowCollection->isEmpty());
    }
    
    /**
     * Test method setAsReadOnly from interface Collection
     * @expectedException LogicException
     * @expectedExceptionArgument A PdoRowCollection is Read only so changing read/write is not allowed.  
     */
    public function testSetAsReadOnly() 
    {
        $pdo = MysqlDataSourceTestSetupTearDown::getPdoConnection($GLOBALS['db_name']);
        $pdoStatement = $pdo->query('SELECT * FROM test_pdo_row_collection');       
        $pdoRowCollection = new PdoRowCollection($pdoStatement);
        $pdoRowCollection->setAsReadOnly(true);
    }
    
    /**
     * Test method rewind from interface Iterator 
     */
    public function testRewind() 
    {
        $pdo = MysqlDataSourceTestSetupTearDown::getPdoConnection($GLOBALS['db_name']);
        $pdoStatement = $pdo->query('SELECT * FROM test_pdo_row_collection');
        $pdoRowCollection = new PdoRowCollection($pdoStatement);
        $pdoRowCollection->next();
        $pdoRowCollection->rewind();
        
        $pdoRow = new PdoRowContainer();
        $pdoRow->set('c', 'youpi');
        $pdoRow->set('i', '1');     
        
        $this->assertEquals($pdoRow, $pdoRowCollection->current());     
    }
    
    /**
     * Test method current from interface Iterator 
     */
    public function testCurrent() 
    {
        $pdo = MysqlDataSourceTestSetupTearDown::getPdoConnection($GLOBALS['db_name']);
        $pdoStatement = $pdo->query('SELECT * FROM test_pdo_row_collection');
        $pdoRowCollection = new PdoRowCollection($pdoStatement);

        $pdoRow = new PdoRowContainer();
        $pdoRow->set('c', 'youpi');
        $pdoRow->set('i', '1');     
        
        $this->assertEquals($pdoRow, $pdoRowCollection->current());
        
        /* Make sure calling "current" two times does not change internal iterator position */
        $this->assertEquals($pdoRow, $pdoRowCollection->current());
        
    }
    
    /**
     * Test method hasKey from interface Collection
     */
    public function testHasKey() 
    {
        $pdo = MysqlDataSourceTestSetupTearDown::getPdoConnection($GLOBALS['db_name']);
        $pdoStatement = $pdo->query('SELECT * FROM test_pdo_row_collection');
        $pdoRowCollection = new PdoRowCollection($pdoStatement);
        
        $this->assertTrue($pdoRowCollection->hasKey(0));
        $this->assertTrue($pdoRowCollection->hasKey(1));
        $this->assertTrue($pdoRowCollection->hasKey(2));
        $this->assertFalse($pdoRowCollection->hasKey(3));
                        
    }
    
    /**
     * Test method set from interface Collection
     * @expectedException LogicException
     * @expectedExceptionMessage Setting an item to a read only collection is not allowed
     */
    public function testSet() 
    {       
        $pdo = MysqlDataSourceTestSetupTearDown::getPdoConnection($GLOBALS['db_name']);
        $pdoStatement = $pdo->query('SELECT * FROM test_pdo_row_collection');       
        $pdoRowCollection = new PdoRowCollection($pdoStatement);
        $pdoRowCollection->set(0, new SomeItem());          
    }
    
    /**
     * Test method key from interface Iterator 
     */
    public function testKey() 
    {
        $pdo = MysqlDataSourceTestSetupTearDown::getPdoConnection($GLOBALS['db_name']);
        $pdoStatement = $pdo->query('SELECT * FROM test_pdo_row_collection');
        $pdoRowCollection = new PdoRowCollection($pdoStatement);

        $this->assertEquals(0, $pdoRowCollection->key());
        $pdoRowCollection->next();
        $pdoRowCollection->next();
        $this->assertEquals(2, $pdoRowCollection->key());
        
    }
    
    /**
     * Test method valid from interface Iterator
     */
    public function testValid() 
    {
        $pdo = MysqlDataSourceTestSetupTearDown::getPdoConnection($GLOBALS['db_name']);
        $pdoStatement = $pdo->query('SELECT * FROM test_pdo_row_collection');
        $pdoRowCollection = new PdoRowCollection($pdoStatement);
        $this->assertTrue($pdoRowCollection->valid());
        $pdoRowCollection->next();
        $pdoRowCollection->next();
        $this->assertTrue($pdoRowCollection->valid());
        $pdoRowCollection->next();
        $this->assertFalse($pdoRowCollection->valid());
    }
    
    /**
     * Test method clear from interface Collection
     * @expectedException LogicException
     * @expectedExceptionMessage Clearing a read only collection is not allowed
     */
    public function testClear() 
    {
        $pdo = MysqlDataSourceTestSetupTearDown::getPdoConnection($GLOBALS['db_name']);
        $pdoStatement = $pdo->query('SELECT * FROM test_pdo_row_collection');
        $pdoRowCollection = new PdoRowCollection($pdoStatement);
        $pdoRowCollection->clear();
    }
    
    /**
     * Test method get from interface Collection 
     */
    public function testGet() 
    {
        $pdo = MysqlDataSourceTestSetupTearDown::getPdoConnection($GLOBALS['db_name']);
        $pdoStatement = $pdo->query('SELECT * FROM test_pdo_row_collection');
        $pdoRowCollection = new PdoRowCollection($pdoStatement);
        
        $pdoRow = new PdoRowContainer();        
        $pdoRow->set('c', 'tralala');
        $pdoRow->set('i', '3');     
        
        $this->assertEquals($pdoRow, $pdoRowCollection->get(2));
        
    }

    /**
     * test Iterator implementation
     */
    public function testIteratorImplementation() 
    {   
        $pdo = MysqlDataSourceTestSetupTearDown::getPdoConnection($GLOBALS['db_name']);
        $pdoStatement = $pdo->query('SELECT * FROM test_pdo_row_collection');
        $pdoRowCollection = new PdoRowCollection($pdoStatement);
        
        $pdoRow1 = new PdoRowContainer();
        $pdoRow1->set('c', 'youpi');
        $pdoRow1->set('i', '1');    
        
        $pdoRow2 = new PdoRowContainer();
        $pdoRow2->set('c', 'prout');
        $pdoRow2->set('i', '2');    
        
        $pdoRow3 = new PdoRowContainer();
        $pdoRow3->set('c', 'tralala');
        $pdoRow3->set('i', '3');    
        
        $expectedRows = array($pdoRow1, $pdoRow2, $pdoRow3);        
        
        foreach($pdoRowCollection as $key => $row) {
            $this->assertEquals($expectedRows[$key], $row); 
        }
        
        /* Playing with internal iterator */
        foreach($pdoRowCollection as $key => $row) {
            $this->assertEquals($expectedRows[$key], $row);
        }       
        
    }   

    /**
     * test getting an item that doesn't exist
     * @expectedException InvalidArgumentException
     * @expectedMessage This collection contain no item at key 10
     */
    public function testGettingAnItemThatDoesntExist()
    {
        $pdo = MysqlDataSourceTestSetupTearDown::getPdoConnection($GLOBALS['db_name']);
        $pdoStatement = $pdo->query('SELECT * FROM test_pdo_row_collection');
        $pdoRowCollection = new PdoRowCollection($pdoStatement);        
        $pdoRowCollection->get(10);
    }   
}
