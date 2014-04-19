<?php

namespace TiBeN\Framework\Tests\Entity;

use TiBeN\Framework\Entity\EntityMapping;

// Start of user code EntityMapping.useStatements
use TiBeN\Framework\Tests\Fixtures\DataSource\FooDataSource\FooDataSource;
use TiBeN\Framework\Tests\Fixtures\DataSource\FooDataSource\FooEntityMappingConfiguration;
use TiBeN\Framework\Tests\Fixtures\DataSource\FooDataSource\FooAttributeMappingConfiguration;
use TiBeN\Framework\Tests\Fixtures\Entity\SomeEntity;
use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\DataSource\DataSourcesRegistry;
use TiBeN\Framework\Entity\AttributeMapping;

// End of user code

/**
 * Test cases for class EntityMapping
 * 
 * Start of user code EntityMappingTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @author TiBeN
 */
class EntityMappingTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code EntityMappingTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code EntityMappingTest.setUp
		$fooDataSource = new FooDataSource();
		$fooDataSource->setName('fooSource');
		$fooDataSource->setSourceFolder('fooFolder');		
		DataSourcesRegistry::registerDataSource($fooDataSource);
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code EntityMappingTest.tearDown
		// Place additional tearDown code here.  
		// End of user code
    }
    
    /**
     * Test static method create from class EntityMapping
     *
     * Start of user code EntityMappingTest.testcreateAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testCreate()
    {
        // Start of user code EntityMappingTest.testcreate
        $expectedEm = new EntityMapping();
        $expectedEm->setEntityName(
            'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity');
        $expectedEm->setDataSourceName('fooSource');

        $dsEntityConf = new FooEntityMappingConfiguration();
        $dsEntityConf->setFile('fooFile');
        $expectedEm->setDataSourceEntityConfiguration($dsEntityConf);
        
        $someAttribute = new AttributeMapping();
        $someAttribute->setName('someAttribute');
        $someAttribute->setType(AssociativeArray::createFromNativeArray(null, array(
        	'name' => 'string'                
        )));
        
        $dsAttributeConf = new FooAttributeMappingConfiguration();
        $dsAttributeConf->setField('fooField');
        $someAttribute->setDataSourceAttributeMappingConfiguration($dsAttributeConf);
        
        $expectedEm->getAttributeMappings()->set('someAttribute', $someAttribute);
        
        $factorisedEntityMapping = EntityMapping::create(
            AssociativeArray::createFromNativeArray(
                null, 
                array(
                    'entity' => 'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity',
                    'datasource' => array(
                        'name' => 'fooSource',
                        'file' => 'fooFile'
                    ),
                    'attributes' => array(
                        'someAttribute' => array(
                            'field' => 'fooField',
                            'type' => array('name' => 'string')    
                        )
                    )                                       	
                )
            )
        );       
        
        $this->assertEquals($expectedEm, $factorisedEntityMapping);
		// End of user code
    }

    // Start of user code EntityMappingTest.methods
    
	/**
	 * Test setting ommit entity
     *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage No Entity specified
	 */
	public function testOmmitEntity()
	{
	    $factorisedEntityMapping = EntityMapping::create(
            AssociativeArray::createFromNativeArray(
                null, 
                array(            
                    'datasource' => array(
                        'name' => 'fooSource',
                        'file' => 'fooFile'
                    ),	            
                    'attributes' => array(
                        'someAttribute' => array(
                            'field' => 'fooField',
                            'type' => array(
                                'name' => 'string'                                                    
                            )
                        )
                    )
                )
            )
        );
	}	
	
	/**
	 * Test setting an unknown entity class name
     *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage The Entity "UnknownEntity" doesn't exist
	 */	
	public function testSettingAnUnknownEntityClassName() 
	{
	    $factorisedEntityMapping = EntityMapping::create(
            AssociativeArray::createFromNativeArray(
                null, 
                array(
                    'entity' => 'UnknownEntity',
                    'datasource' => array(
                        'name' => 'fooSource',
                        'file' => 'fooFile'
                    ),
                    'attributes' => array(
                        'someAttribute' => array(
                            'field' => 'fooField',
                            'type' => array(
                                'name' => 'string'                                                    
                            )                        
                        )
                    )
                )
            )
        );	    
	}

	/**
	 * Test setting ommit datasource
     *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage No DataSource specified
	 */
	public function testOmmitDataSource()
	{
	    $factorisedEntityMapping = EntityMapping::create(
            AssociativeArray::createFromNativeArray(
                null, 
                array(
                    'entity' => 'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity',
                    'attributes' => array(
                        'someAttribute' => array(
                            'field' => 'fooField',
                            'type' => array(
                                'name' => 'string'
                            )                        
                        )
                    )
                )
            )
        );
	}

	/**
	 * Test setting ommit datasource name
     *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage No DataSource specified
	 */
	public function testOmmitDataSourceName()
	{
	    $factorisedEntityMapping = EntityMapping::create(
            AssociativeArray::createFromNativeArray(
                null, 
                array(
                    'entity' => 'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity',
                    'datasource' => array(                
                        'file' => 'fooFile'
                    ),	            
                    'attributes' => array(
                        'someAttribute' => array(
                            'field' => 'fooField',
                            'type' => array(
                                'name' => 'string'
                            )                        
                        )
                    )
                )
            )
        );
	}
	
	/**
	 * Test setting an unknown datasource name
     *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage The DataSource "bar" doesn't exist
	 */
	public function testSettingAnUnknownDataSourceName()
	{
	    $factorisedEntityMapping = EntityMapping::create(
            AssociativeArray::createFromNativeArray(
                null, 
                array(
                    'entity' => 'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity',
                    'datasource' => array(
                        'file' => 'fooFile',
                        'name' => 'bar'                    
                    ),
                    'attributes' => array(
                        'someAttribute' => array(
                            'field' => 'fooField',
                            'type' => array(
                                'name' => 'string'
                            )                        
                        )
                    )
                )
            )
        );
	}

	/**
	 * Test ommit attributes
     *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage At least one attribute must be set
	 */
	public function testOmmitAttributes()
	{
	    $factorisedEntityMapping = EntityMapping::create(
            AssociativeArray::createFromNativeArray(
                null, 
                array(
                    'entity' => 'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity',
                    'datasource' => array(
                        'file' => 'fooFile',
                        'name' => 'fooSource'
                    ),
                )
            )
        );
	}		
	
	/**
	 * Test ommit attribute type
     *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage No type set for attribute 'someAttribute'
	 */
	public function testOmmitAttributeType()
	{
	    $factorisedEntityMapping = EntityMapping::create(
            AssociativeArray::createFromNativeArray(
                null, 
                array(
                    'entity' => 'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity',
                    'datasource' => array(
                        'file' => 'fooFile',
                        'name' => 'fooSource'
                    ),
                    'attributes' => array(
                        'someAttribute' => array(
                            'field' => 'fooField'                    
                        )
                    )	            
                )
            )
        );
	}	
	// End of user code
}
