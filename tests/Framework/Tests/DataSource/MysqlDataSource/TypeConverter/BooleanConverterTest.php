<?php

namespace TiBeN\Framework\Tests\DataSource\MysqlDataSource\TypeConverter;

use TiBeN\Framework\DataSource\MysqlDataSource\TypeConverter\BooleanConverter;

// Start of user code BooleanConverter.useStatements
// End of user code

/**
 * Test cases for class BooleanConverter
 * 
 * Start of user code BooleanConverterTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\DataSource\MysqlDataSource\TypeConverter
 * @author TiBeN
 */
class BooleanConverterTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code BooleanConverterTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code BooleanConverterTest.setUp
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code BooleanConverterTest.tearDown
		// Place additional tearDown code here.  
		// End of user code
    }
    
    

    /**
     * Test method setParameters from interface TypeConverter
     * Start of user code TypeConverter.testsetParametersAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testSetParameters()
    {
        // Start of user code TypeConverter.testsetParameters
        // Nothing to test here
    	// End of user code
    }
    
    /**
     * Test method getType from interface TypeConverter
     * Start of user code TypeConverter.testgetTypeAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testGetType()
    {
        // Start of user code TypeConverter.testgetType
        $converter = new BooleanConverter();
        $this->assertEquals('boolean', $converter->getType());
    	// End of user code
    }
    
    /**
     * Test method getDataSourceType from interface TypeConverter
     * Start of user code TypeConverter.testgetDataSourceTypeAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testGetDataSourceType()
    {
        // Start of user code TypeConverter.testgetDataSourceType
        $converter = new BooleanConverter();
        $this->assertEquals('mysql', $converter->getDataSourceType());
    	// End of user code
    }
    
    /**
     * Test method convert from interface TypeConverter
     * Start of user code TypeConverter.testconvertAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testConvert()
    {
        // Start of user code Converter.testconvert
        $converter = new BooleanConverter();
        $this->assertSame('1', $converter->convert(true));
        $this->assertSame('0', $converter->convert(false));
    	// End of user code
    }
    
    /**
     * Test method reverse from interface TypeConverter
     * Start of user code TypeConverter.testreverseAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testReverse()
    {
        // Start of user code Converter.testreverse
        $converter = new BooleanConverter();
        $this->assertSame(true, $converter->reverse('1'));
        $this->assertSame(false, $converter->reverse('0'));
    	// End of user code
    }

    // Start of user code BooleanConverterTest.methods
	// Place additional tests methods here.  
	// End of user code
}
