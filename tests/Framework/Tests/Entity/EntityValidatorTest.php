<?php

namespace TiBeN\Framework\Tests\Entity;

use TiBeN\Framework\Entity\EntityValidator;

// Start of user code EntityValidator.useStatements
use TiBeN\Framework\Tests\Fixtures\DataSource\MysqlDataSource\MysqlDataSourceTestSetupTearDown;
use TiBeN\Framework\Tests\Fixtures\Entity\SomeEntity;
use TiBeN\Framework\Entity\EntityValidationResult;
use TiBeN\Framework\Validation\ValidationResult;
use TiBeN\Framework\Entity\EntityMappingsRegistry;

// End of user code

/**
 * Test cases for class EntityValidator
 * 
 * Start of user code EntityValidatorTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\Entity
 * @author TiBeN
 */
class EntityValidatorTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code EntityValidatorTest.attributes
    // Place additional tests attributes here.  
    // End of user code

    public function setUp()
    {
        // Start of user code EntityValidatorTest.setUp
        MysqlDataSourceTestSetupTearDown::declareSomeEntityMapping();
        MysqlDataSourceTestSetupTearDown::declareBuiltInValidators();
        // End of user code
    }

    public function tearDown()
    {
        // Start of user code EntityValidatorTest.tearDown
        // Place additional tearDown code here.  
        // End of user code
    }
    
    /**
     * Test method validate from class EntityValidator
     *
     * Start of user code EntityValidatorTest.testvalidateAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testValidate()
    {
        // Start of user code EntityValidatorTest.testvalidate
        
        $someEntity = new SomeEntity();
               
        // Test a fail validation 
        $expectedEntityValidationResults = new EntityValidationResult();
        $expectedEntityValidationResults->setResult(false);

        $attributeAValidationResult = new ValidationResult();
        $attributeAValidationResult->setValidationResult(false);
        $attributeAValidationResult->setErrorMessage('AttributeA is not set');
        
        $attributeBValidationResult = new ValidationResult();
        $attributeBValidationResult->setValidationResult(false);
        $attributeBValidationResult->setErrorMessage('AttributeB is too short (3 chars min)');

        $expectedEntityValidationResults->setValidationResults(
            array($attributeAValidationResult, $attributeBValidationResult)
        );

        $this->assertEquals(
            $expectedEntityValidationResults,
            EntityValidator::validate(
                EntityMappingsRegistry::getEntityMapping(
                    'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
                ),
                $someEntity
            )
        );
           
        // Test a good validation 
        $someEntity->setAttributeA('foo');
        $someEntity->setAttributeB('bar');

        $expectedEntityValidationResults = new EntityValidationResult();
        $expectedEntityValidationResults->setResult(true);

        $this->assertEquals(
            $expectedEntityValidationResults,
            EntityValidator::validate(
                EntityMappingsRegistry::getEntityMapping(
                    'TiBeN\\Framework\\Tests\\Fixtures\\Entity\\SomeEntity'
                ),
                $someEntity
            )
        );
        // End of user code
    }

    // Start of user code EntityValidatorTest.methods
    // End of user code
}
