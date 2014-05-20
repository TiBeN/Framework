<?php

namespace TiBeN\Framework\Tests\Entity;

use TiBeN\Framework\Entity\AttributeMapping;

// Start of user code AttributeMapping.useStatements
use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\Tests\Fixtures\DataSource\FooDataSource\FooAttributeMappingConfiguration;
use TiBeN\Framework\Validation\ValidationRule;

// End of user code

/**
 * Test cases for class AttributeMapping
 * 
 * Start of user code AttributeMappingTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\Entity
 * @author TiBeN
 */
class AttributeMappingTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code AttributeMappingTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code AttributeMappingTest.setUp
		// Place additional setUp code here.  
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code AttributeMappingTest.tearDown
		// Place additional tearDown code here.  
		// End of user code
    }
    
    /**
     * Test static method create from class AttributeMapping
     *
     * Start of user code AttributeMappingTest.testcreateAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testCreate()
    {
        // Start of user code AttributeMappingTest.testcreate
	    $expectedAm = new AttributeMapping();
	    $expectedAm->setName('test');
	    $expectedAm->setIsIdentifier(false);
	    $expectedAm->setType(AssociativeArray::createFromNativeArray(null, array(
	    	'name' => 'string'
	    )));
	    $expectedAm->setDataSourceAttributeMappingConfiguration(
            new FooAttributeMappingConfiguration()
        );
        $validationRule = new ValidationRule();
        $validationRule->setValidatorName('notempty');
	    $expectedAm->setValidationRules(array($validationRule));

	    $this->assertEquals(
            $expectedAm, 
            AttributeMapping::create(
                AssociativeArray::createFromNativeArray(
                    null, 
                    array(
                        'name' => 'test',     
                        'type' => AssociativeArray::createFromNativeArray(
                            null, 
                            array('name' => 'string')
                        ),
                        'dataSourceAttributeMappingConfiguration' 
                            => new FooAttributeMappingConfiguration()
                        ,
                        'validationRules' => array($validationRule)
                    )
                )
            )
        );        
		// End of user code
    }

    // Start of user code AttributeMappingTest.methods

	/**
	 * Test create an AttributeMapping without name
     *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage No name set
	 */
	public function testCreateAnAttributeMappingWithoutName()
	{
	    AttributeMapping::create(
            AssociativeArray::createFromNativeArray(
                null, 
                array(    	    
                    'type' => AssociativeArray::createFromNativeArray(
                        null, 
                        array('name' => 'string')
                    ),	    
                    'dataSourceAttributeMappingConfiguration' 
                        => new FooAttributeMappingConfiguration()
                )
            )
        );
	}   
	
	/**
	 * Test create an AttributeMapping without type
     *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage No type set
	 */
	public function testCreateAnAttributeMappingWithoutType()
	{
	    AttributeMapping::create(
            AssociativeArray::createFromNativeArray(
                null, 
                array(
                   'name' => 'test',
                   'dataSourceAttributeMappingConfiguration' 
                       => new FooAttributeMappingConfiguration()
                )
            )
        );
	}	
	
	/**
	 * Test create an AttributeMapping without type name
     * 
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage No type name set
	 */
	public function testCreateAnAttributeMappingWithoutTypeName()
	{
	    AttributeMapping::create(
            AssociativeArray::createFromNativeArray(
                null, 
                array(
                    'name' => 'test',
                    'type' => AssociativeArray::createFromNativeArray(
                        null, 
                        array()
                    ),    	    
                    'dataSourceAttributeMappingConfiguration' 
                        => new FooAttributeMappingConfiguration()
                )
            )
        );
	}	
	 
	/**
	 * Test create an AttributeMapping without DataSourceAttributeMappingConfiguration
     * 
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage No datasource attribute mapping configuration set
	 */
	public function testCreateAnAttributeMappingWithoutDataSourceAttributeMappingConfiguration()
	{
	    AttributeMapping::create(
            AssociativeArray::createFromNativeArray(
                null, 
                array(
                   'name' => 'test',
                   'type' => AssociativeArray::createFromNativeArray(
                       null, 
                       array('name' => 'string')
                   ),	       
                )
            )
        );
	}	
	// End of user code
}
