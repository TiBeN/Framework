<?php

namespace TiBeN\Framework\Tests\DataSource\MysqlDataSource\TypeConverter;

use TiBeN\Framework\DataSource\MysqlDataSource\TypeConverter\DecimalConverter;

// Start of user code DecimalConverter.useStatements
// Place your use statements here.
// End of user code

/**
 * Test cases for class DecimalConverter
 * 
 * Start of user code DecimalConverterTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @author TiBeN
 */
class DecimalConverterTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code DecimalConverterTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code DecimalConverterTest.setUp
		// Place additional setUp code here.  
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code DecimalConverterTest.tearDown
		// Place additional tearDown code here.  
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
        $converter = new DecimalConverter();
        $this->assertEquals('mysql', $converter->getDataSourceType());
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
        $converter = new DecimalConverter();
        $this->assertSame(45.32, $converter->reverse('45.32'));
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
     * Test method convert from interface TypeConverter
     * Start of user code TypeConverter.testconvertAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testConvert()
    {
        // Start of user code Converter.testconvert
        $converter = new DecimalConverter();
        $this->assertSame('45.32', $converter->convert(45.32));
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
        $converter = new DecimalConverter();
        $this->assertEquals('decimal', $converter->getType());
    	// End of user code
    }

    // Start of user code DecimalConverterTest.methods
	// Place additional tests methods here.  
	// End of user code
}
