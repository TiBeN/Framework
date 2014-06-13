<?php

namespace TiBeN\Framework\Tests\DataSource\MysqlDataSource;

use TiBeN\Framework\DataSource\MysqlDataSource\MysqlEntityAttributeMapper;

// Start of user code MysqlEntityAttributeMapper.useStatements
use TiBeN\Framework\Tests\Fixtures\DataSource\MysqlDataSource\MysqlDataSourceTestSetupTearDown;
use TiBeN\Framework\Tests\Fixtures\Entity\SomeEntity;
use TiBeN\Framework\Entity\EntityMappingsRegistry;

// End of user code

/**
 * Test cases for class MysqlEntityAttributeMapper
 * 
 * Start of user code MysqlEntityAttributeMapperTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\DataSource\MysqlDataSource
 * @author TiBeN
 */
class MysqlEntityAttributeMapperTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code MysqlEntityAttributeMapperTest.attributes
    // Place additional tests attributes here.  
    // End of user code

    public function setUp()
    {
        // Start of user code MysqlEntityAttributeMapperTest.setUp
        MysqlDataSourceTestSetupTearDown::declareSomeEntityMapping();
        MysqlDataSourceTestSetupTearDown::declareBuiltInTypeConverters();
        // End of user code
    }

    public function tearDown()
    {
        // Start of user code MysqlEntityAttributeMapperTest.tearDown
        // Place additional tearDown code here.  
        // End of user code
    }
    
    /**
     * Test method setIdentifier from class MysqlEntityAttributeMapper
     *
     * Start of user code MysqlEntityAttributeMapperTest.testsetIdentifierAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testSetIdentifier()
    {
        // Start of user code MysqlEntityAttributeMapperTest.testsetIdentifier
        $entity = new SomeEntity();
        $mapper = new MysqlEntityAttributeMapper();
        $mapper->setEntity($entity);
        $mapper->setEntityMapping(
            EntityMappingsRegistry::getEntityMapping(
                'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
            )
        );
        $mapper->setIdentifier(1337);
        $this->assertEquals(1337, $entity->getId());        
        // End of user code
    }
    
    /**
     * Test method setAttributeValue from class MysqlEntityAttributeMapper
     *
     * Start of user code MysqlEntityAttributeMapperTest.testsetAttributeValueAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testSetAttributeValue()
    {
        // Start of user code MysqlEntityAttributeMapperTest.testsetAttributeValue
        $entity = new SomeEntity();
        $mapper = new MysqlEntityAttributeMapper();
        $mapper->setEntity($entity);
        $mapper->setEntityMapping(
            EntityMappingsRegistry::getEntityMapping(
                'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
            )
        );
        $mapper->setAttributeValue('idTable', '1337');
        $this->assertSame(1337, $entity->getId());
        
        $mapper->setAttributeValue('a', 'foo');
        $this->assertSame('foo', $entity->getAttributeA());
        // End of user code
    }
    
    /**
     * Test method getColumnName from class MysqlEntityAttributeMapper
     *
     * Start of user code MysqlEntityAttributeMapperTest.testgetColumnNameAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testGetColumnName()
    {
        // Start of user code MysqlEntityAttributeMapperTest.testgetColumnName
        $mapper = new MysqlEntityAttributeMapper();
        $mapper->setEntityMapping(
            EntityMappingsRegistry::getEntityMapping(
                'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
            )
        );      
        $this->assertEquals('idTable', $mapper->getColumnName('id'));
        $this->assertEquals('a', $mapper->getColumnName('attributeA'));     
        // End of user code
    }
    
    /**
     * Test method getColumnValue from class MysqlEntityAttributeMapper
     *
     * Start of user code MysqlEntityAttributeMapperTest.testgetColumnValueAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testGetColumnValue()
    {
        // Start of user code MysqlEntityAttributeMapperTest.testgetColumnValue
        $entity = new SomeEntity();
        $entity->setId(1337);
        $entity->setAttributeA('foo');
        $mapper = new MysqlEntityAttributeMapper();
        $mapper->setEntity($entity);
        $mapper->setEntityMapping(
            EntityMappingsRegistry::getEntityMapping(
                'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
            )
        );      
        $this->assertSame('foo', $mapper->getColumnValue('attributeA'));
        $this->assertSame('1337', $mapper->getColumnValue('id'));
        // End of user code
    }
    
    /**
     * Test method getIdentifierValue from class MysqlEntityAttributeMapper
     *
     * Start of user code MysqlEntityAttributeMapperTest.testgetIdentifierValueAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testGetIdentifierValue()
    {
        // Start of user code MysqlEntityAttributeMapperTest.testgetIdentifierValue
        $entity = new SomeEntity();
        $mapper = new MysqlEntityAttributeMapper();
        $mapper->setEntityMapping(
            EntityMappingsRegistry::getEntityMapping(
                'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
            )
        );
        $mapper->setEntity($entity);
        $this->assertNull($mapper->getIdentifierValue());
        
        $entity->setId(1337);
        $this->assertSame(1337, $mapper->getIdentifierValue());
        // End of user code
    }
    
    /**
     * Test method getIdentifierAttributeName from class MysqlEntityAttributeMapper
     *
     * Start of user code MysqlEntityAttributeMapperTest.testgetIdentifierAttributeNameAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testGetIdentifierAttributeName()
    {
        // Start of user code MysqlEntityAttributeMapperTest.testgetIdentifierAttributeName
        $mapper = new MysqlEntityAttributeMapper();
        $mapper->setEntityMapping(
            EntityMappingsRegistry::getEntityMapping(
                'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
            )
        );
        $mapper->setEntity(new SomeEntity());
        $this->assertEquals('id', $mapper->getIdentifierAttributeName());
        // End of user code
    }

    // Start of user code MysqlEntityAttributeMapperTest.methods

    /**
     * @expectedException LogicException
     * @expectedExceptionMessage No entity set
     */
    public function testSetAttributeWithoutSetEntity()
    {
        $mapper = new MysqlEntityAttributeMapper();
        $mapper->setEntityMapping(
            EntityMappingsRegistry::getEntityMapping(
                'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
            )
        );
        $mapper->setAttributeValue('idTable', 1337);        
    }
    
    /**
     * @expectedException LogicException
     * @expectedExceptionMessage No entity set
     */
    public function testSetIdentifierWithoutSetEntity()
    {
        $mapper = new MysqlEntityAttributeMapper();
        $mapper->setEntityMapping(
            EntityMappingsRegistry::getEntityMapping(
                'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
            )
        );
        $mapper->setIdentifier(1337);
    }
    
    /**
     * @expectedException LogicException
     * @expectedExceptionMessage No entity set
     */
    public function testGetIdentifierValueWithoutSetEntity()
    {
        $mapper = new MysqlEntityAttributeMapper();
        $mapper->setEntityMapping(
            EntityMappingsRegistry::getEntityMapping(
                'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
            )
        );
        $mapper->getIdentifierValue();
    }   

    /**
     * @expectedException LogicException
     * @expectedExceptionMessage No entity set
     */
    public function testGetColumnValueWithoutSetEntity()
    {
        $mapper = new MysqlEntityAttributeMapper();
        $mapper->setEntityMapping(
            EntityMappingsRegistry::getEntityMapping(
                'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
            )
        );
        $mapper->getColumnValue('id');
    }   

    /**
     * @expectedException LogicException
     * @expectedExceptionMessage No entity mapping set
     */
    public function testGetColumnNameWithoutSetEntityMapping()
    {
        $mapper = new MysqlEntityAttributeMapper();
        $mapper->setEntity(new SomeEntity()); 
        $mapper->getColumnName('id');
    }   
    
    /**
     * @expectedException LogicException
     * @expectedExceptionMessage No entity mapping set
     */
    public function testSetIdentifierWithoutSetEntityMapping()
    {
        $mapper = new MysqlEntityAttributeMapper();
        $mapper->setEntity(new SomeEntity());
        $mapper->setIdentifier(1337);
    }

    /**
     * @expectedException LogicException
     * @expectedExceptionMessage No entity mapping set
     */
    public function testGetIdentifierValueWithoutSetEntityMapping()
    {
        $mapper = new MysqlEntityAttributeMapper();
        $mapper->setEntity(new SomeEntity());
        $mapper->getIdentifierValue();
    }   
    
    /**
     * @expectedException LogicException
     * @expectedExceptionMessage No entity mapping set
     */
    public function testSetAttributeValueWithoutSetEntityMapping()
    {
        $mapper = new MysqlEntityAttributeMapper();
        $mapper->setEntity(new SomeEntity());
        $mapper->setAttributeValue('a', 'foo');
    }   

    /**
     * @expectedException LogicException
     * @expectedExceptionMessage No entity mapping set
     */
    public function testGetColumnValueWithoutSetEntityMapping()
    {
        $mapper = new MysqlEntityAttributeMapper();
        $mapper->setEntity(new SomeEntity());
        $mapper->getColumnValue('id');
    }
        
    /**
     * @expectedException LogicException
     * @expectedExceptionMessage column 'unknown' is not mapped to any attribute
     */
    public function testsetAttributeValueFromAnUnknowColumnName()
    {
        $entity = new SomeEntity();
        $mapper = new MysqlEntityAttributeMapper();
        $mapper->setEntity($entity);
        $mapper->setEntityMapping(
            EntityMappingsRegistry::getEntityMapping(
                'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
            )
        );
        $mapper->setAttributeValue('unknown', 'foo');
    }   
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Entity has no attribute 'unknown' or is not mapped
     */
    public function testGetColumnNameOfAnUnknowAttribute()
    {
        $mapper = new MysqlEntityAttributeMapper();
        $mapper->setEntityMapping(
            EntityMappingsRegistry::getEntityMapping(
                'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
            )
        );
        $mapper->getColumnName('unknown');
    }   
    

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Entity has no attribute 'unknown' or is not mapped
     */
    public function testGetColumnValueOfAnUnknowAttribute()
    {
        $entity = new SomeEntity();
        $mapper = new MysqlEntityAttributeMapper();
        $mapper->setEntity($entity);
        $mapper->setEntityMapping(
            EntityMappingsRegistry::getEntityMapping(
                'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
            )
        );
        $mapper->getColumnValue('unknown');
    }   
    
    /**
     * @expectedException LogicException
     * @expectedExceptionMessage Entity has no identifier attribute mapped
     */
    public function testSetIdentifierToAnEntityThatHasNoIdentifierMapping()
    {
        $entity = new SomeEntity();
        $mapper = new MysqlEntityAttributeMapper();
        $mapper->setEntity($entity);
        $entityMapping = EntityMappingsRegistry::getEntityMapping(
            'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
        );
        $entityMapping->getAttributeMappings()->remove('id');
        $mapper->setEntityMapping($entityMapping);
        $mapper->setIdentifier(1337);
    }   
    
    /**
     * @expectedException LogicException
     * @expectedExceptionMessage Entity has no identifier attribute mapped
     */
    public function testGetIdentifierValueToAnEntityThatHasNoIdentifierMapping()
    {
        $entity = new SomeEntity();
        $mapper = new MysqlEntityAttributeMapper();
        $mapper->setEntity($entity);
        $entityMapping = EntityMappingsRegistry::getEntityMapping(
            'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
        );
        $entityMapping->getAttributeMappings()->remove('id');
        $mapper->setEntityMapping($entityMapping);
        $mapper->getIdentifierValue();
    }   
    // End of user code
}
