<?php

namespace TiBeN\Framework\Tests\DataSource\MysqlDataSource;

use TiBeN\Framework\DataSource\MysqlDataSource\RowToEntityConverter;

// Start of user code RowToEntityConverter.useStatements
use TiBeN\Framework\Tests\Fixtures\DataSource\MysqlDataSource\MysqlDataSourceTestSetupTearDown;
use TiBeN\Framework\Tests\Fixtures\Entity\SomeEntity;
use TiBeN\Framework\DataSource\MysqlDataSource\Row;
use TiBeN\Framework\Entity\EntityMappingsRegistry;

// End of user code

/**
 * Test cases for class RowToEntityConverter
 * 
 * Start of user code RowToEntityConverterTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @author TiBeN
 */
class RowToEntityConverterTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code RowToEntityConverterTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code RowToEntityConverterTest.setUp
        MysqlDataSourceTestSetupTearDown::declareBuiltInTypeConverters();
		MysqlDataSourceTestSetupTearDown::declareSomeEntityMapping();
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code RowToEntityConverterTest.tearDown
		// Place additional tearDown code here.  
		// End of user code
    }
    
    

    /**
     * Test method convert from interface Converter
     * Start of user code Converter.testconvertAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testConvert()
    {
        // Start of user code Converter.testconvert
	    $row = new Row();
	    $row->set('idTable', '2');
	    $row->set('a', 'foo');
	    $row->set('b', 'bar');
	    $row->set('c', 'baz');
	    
	    $expectedEntity = new SomeEntity();
	    $expectedEntity->setId(2);
	    $expectedEntity->setAttributeA('foo');
	    $expectedEntity->setAttributeB('bar');
	    $expectedEntity->setAttributeC('baz');
	    
	    $converter = new RowToEntityConverter();
	    $converter->setEntityMapping(EntityMappingsRegistry::getEntityMapping(
            'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
        ));
	    
	    $this->assertEquals($expectedEntity, $converter->convert($row));	    
    	// End of user code
    }
    
    /**
     * Test method reverse from interface Converter
     * Start of user code Converter.testreverseAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testReverse()
    {
        // Start of user code Converter.testreverse
	    $entity = new SomeEntity();
	    $entity->setId(2);
	    $entity->setAttributeA('foo');
	    $entity->setAttributeB('bar');
	    $entity->setAttributeC('baz');
	         
	    $expectedRow = new Row();
	    $expectedRow->set('idTable', '2');
	    $expectedRow->set('a', 'foo');
	    $expectedRow->set('b', 'bar');
	    $expectedRow->set('c', 'baz');
	    	    
	    $converter = new RowToEntityConverter();	    
	    $converter->setEntityMapping(
            EntityMappingsRegistry::getEntityMapping(
                'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
            )
        );
	    $this->assertEquals($expectedRow, $converter->reverse($entity));
    	// End of user code
    }

    // Start of user code RowToEntityConverterTest.methods

	/**
	 * @expectedException LogicException
	 * @expectedExceptionMessage No entityMapping set
	 */
	public function testLaunchConvertWithoutSettingEntityMapping()
	{
        $converter = new RowToEntityConverter();
        $converter->convert(new Row());	       
	}
	
	/**
	 * @expectedException LogicException
	 * @expectedExceptionMessage No entityMapping set
	 */
    public function testLaunchRevertWithoutSettingEntityMapping()
	{
	    $converter = new RowToEntityConverter();
	    $converter->reverse(new SomeEntity());	     
	}
	// End of user code
}
