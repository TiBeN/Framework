<?php

namespace TiBeN\Framework\Tests\DataSource\MysqlDataSource\TypeConverter;

use TiBeN\Framework\DataSource\MysqlDataSource\TypeConverter\DateTimeConverter;

// Start of user code DateTimeConverter.useStatements
// Place your use statements here.
// End of user code

/**
 * Test cases for class DateTimeConverter
 * 
 * Start of user code DateTimeConverterTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @author TiBeN
 */
class DateTimeConverterTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code DateTimeConverterTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code DateTimeConverterTest.setUp
		// Place additional setUp code here.  
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code DateTimeConverterTest.tearDown
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
        $dateTimeConverter = new DateTimeConverter();
        $this->assertEquals('mysql', $dateTimeConverter->getDataSourceType());
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
        $dateTimeConverter = new DateTimeConverter();
        $dateTime = \DateTime::createFromFormat('d/m/Y H:i:s', '23/02/2014 15:39:10');
        $this->assertEquals($dateTime, $dateTimeConverter->reverse('2014-02-23 15:39:10'));
        $this->assertEquals(null, $dateTimeConverter->reverse(null));
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
        $dateTimeConverter = new DateTimeConverter();
        $dateTime = \DateTime::createFromFormat('d/m/Y H:i:s', '23/02/2014 15:39:10');
        $this->assertEquals('2014-02-23 15:39:10', $dateTimeConverter->convert($dateTime));
        $this->assertEquals(null, $dateTimeConverter->reverse(null));
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
        $dateTimeConverter = new DateTimeConverter();
        $this->assertEquals('datetime', $dateTimeConverter->getType());
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

    // Start of user code DateTimeConverterTest.methods
	// Place additional tests methods here.  
	// End of user code
}
