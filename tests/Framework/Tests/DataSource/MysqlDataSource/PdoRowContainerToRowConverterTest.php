<?php
	
namespace TiBeN\Framework\Tests\DataSource\MysqlDataSource;

use TiBeN\Framework\DataSource\MysqlDataSource\PdoRowContainerToRowConverter;
use TiBeN\Framework\DataSource\MysqlDataSource\PdoRowContainer;
use TiBeN\Framework\DataSource\MysqlDataSource\Row;
use TiBeN\Framework\Tests\Fixtures\Datatype\SomeItem;
use TiBeN\Framework\Tests\Fixtures\Datatype\SomeOtherItem;

/** 
 * Test cases for class PdoRowCollection
 *
 * @author TiBeN
 */ 
class PdoRowContainerToRowConverterTest extends \PHPUnit_Framework_TestCase
{	
	public function setUp() 
	{}	

	public function tearDown() 
	{}
	
	/**
	 * Test method getSourceType from interface CollectionItemConverter
	 */
	public function testGetSourceType()
	{
		$pdoRowConverter = new PdoRowContainerToRowConverter();
		$this->assertEquals(
            'TiBeN\\Framework\\DataSource\\MysqlDataSource\\PdoRowContainer', 
            $pdoRowConverter->getTType()
        );
	}
	
	/**
	 * Test method getProxyType from interface CollectionItemConverter
	 */
	public function testGetProxyType()
	{
		$pdoRowConverter = new PdoRowContainerToRowConverter();
		$this->assertEquals(
            'TiBeN\\Framework\\DataSource\\MysqlDataSource\\Row', 
            $pdoRowConverter->getUType()
        );
	}
	
	/**
	 * Test method convertFromSourceToProxy from interface CollectionItemConverter
	 */
	public function testConvertFromSourceToProxy()
	{
		$data = array(
			'foo' => 'bar'
		);
		
		$pdoRow = PdoRowContainer::createFromRawPdoRow($data);
		$row = new Row();
		$row->set('foo', 'bar');
		
		$pdoRowConverter = new PdoRowContainerToRowConverter();
		
		$this->assertEquals($row, $pdoRowConverter->convert($pdoRow));
		
	}
	
	/**
	 * Test method convertFromProxyToSource from interface CollectionItemConverter
	 */
	public function testConvertFromProxyToSource()
	{
		$data = array(
			'foo' => 'bar'
		);
		
		$pdoRow = PdoRowContainer::createFromRawPdoRow($data);
		$row = new Row();
		$row->set('foo', 'bar');
		
		$pdoRowConverter = new PdoRowContainerToRowConverter();
		
		$this->assertEquals($pdoRow, $pdoRowConverter->reverse($row));
	}
		
	/**
	 * test convert from source to proxy passing wrong item type
	 * @expectedException InvalidArgumentException
	 * @expectedMessage Wrong type: The object type is not PdoRowContainer.  
	 */
	public function testConvertFromSourceToProxyPassingWrongItemType()
	{
		$pdoRowConverter = new PdoRowContainerToRowConverter();
		$pdoRowConverter->convert(new SomeItem());
	}
	
	/**
	 * test convert from proxy to source passing wrong item type
	 * @expectedException InvalidArgumentException
	 * @expectedMessage Wrong type: The object type is not Row.
	 */
	public function testConvertFromProxyToSourcePassingWrongItemType()
	{
		$pdoRowConverter = new PdoRowContainerToRowConverter();
		$pdoRowConverter->reverse(new SomeOtherItem());
	}	
	
}
