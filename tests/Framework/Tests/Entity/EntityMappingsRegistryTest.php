<?php

namespace TiBeN\Framework\Tests\Entity;

use TiBeN\Framework\Entity\EntityMappingsRegistry;

// Start of user code EntityMappingsRegistry.useStatements
use TiBeN\Framework\Entity\EntityMapping;

// End of user code

/**
 * Test cases for class EntityMappingsRegistry
 * 
 * Start of user code EntityMappingsRegistryTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @author TiBeN
 */
class EntityMappingsRegistryTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code EntityMappingsRegistryTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code EntityMappingsRegistryTest.setUp
		// Place additional setUp code here.  
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code EntityMappingsRegistryTest.tearDown
		// Place additional tearDown code here.  
		// End of user code
    }
    
    /**
     * Test static method registerEntityMapping from class EntityMappingsRegistry
     *
     * Start of user code EntityMappingsRegistryTest.testregisterEntityMappingAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testRegisterEntityMapping()
    {
        // Start of user code EntityMappingsRegistryTest.testregisterEntityMapping
	    // Method implicitly tested by testGetEntityMapping
		// End of user code
    }
    
    /**
     * Test static method getEntityMapping from class EntityMappingsRegistry
     *
     * Start of user code EntityMappingsRegistryTest.testgetEntityMappingAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testGetEntityMapping()
    {
        // Start of user code EntityMappingsRegistryTest.testgetEntityMapping
        $entityMapping = new EntityMapping();
        $entityMapping->setEntityName(
            'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\TestEntity'
        );
        EntityMappingsRegistry::registerEntityMapping($entityMapping);
        $this->assertEquals(
            $entityMapping, 
            EntityMappingsRegistry::getEntityMapping(
                'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\TestEntity'
            )
        );
		// End of user code
    }
    
    /**
     * Test static method clearEntityMapping from class EntityMappingsRegistry
     *
     * Start of user code EntityMappingsRegistryTest.testclearEntityMappingAnnotations 
	 * PHPUnit users annotations can be placed here  
	 * End of user code
     */
    public function testClearEntityMapping()
    {
        // Start of user code EntityMappingsRegistryTest.testclearEntityMapping
	    // Nothing to test here. Tested below by exceptions.
		// End of user code
    }

    // Start of user code EntityMappingsRegistryTest.methods

	/**
	 * Test getting a non existant EntityMapping
     *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionArgument No entity mapping for entity "TestEntity"
	 */
	public function testGettingNonExistantEntityMapping()
	{
	    EntityMappingsRegistry::getEntityMapping('TestEntity');
	}
	
	/**
	 * Test getting a clear EntityMapping
     *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionArgument No entity mapping for entity "TestEntity"
	 */
	public function testGettingClearEntityMapping()
	{
	    $dataSource = new EntityMapping();
	    $dataSource->setEntityName('TestEntity');
	    EntityMappingsRegistry::registerEntityMapping($dataSource);
	    EntityMappingsRegistry::clearEntityMapping('TestEntity');
	    EntityMappingsRegistry::getEntityMapping('TestEntity');
	}	
	
	/**
	 * Test clear a non existant EntityMapping
     *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionArgument No entity mapping for entity "test"
	 */
	public function testClearNonExistantEntityMapping()
	{
	    EntityMappingsRegistry::clearEntityMapping('TestEntity');
	}
	
	/**
	 * Test register a not named EntityMapping
     *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionArgument The entity mapping is not associated to any entity
	 */
	public function testRegisterNotNamedEntityMapping()
	{
	    $entityMapping = new EntityMapping();
	    EntityMappingsRegistry::registerEntityMapping($entityMapping);
	}

	/**
	 * Test register an EntityMapping of an unknow Entity "UnknownEntity"
     *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionArgument The entity "UnknownEntity" is unknown.
	 */
	public function testRegisterAnUnknownEntityMapping()
	{
	    $entityMapping = new EntityMapping();
	    $entityMapping->setEntityName('UnknownEntity');
	    EntityMappingsRegistry::registerEntityMapping($entityMapping);
	}	
	// End of user code
}
