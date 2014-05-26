<?php

namespace TiBeN\Framework\Tests\Validation;

use TiBeN\Framework\Validation\ValidatorsRegistry;

// Start of user code ValidatorsRegistry.useStatements
use TiBeN\Framework\Validation\NotEmptyValidator;

// End of user code

/**
 * Test cases for class ValidatorsRegistry
 * 
 * Start of user code ValidatorsRegistryTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\Validation
 * @author TiBeN
 */
class ValidatorsRegistryTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code ValidatorsRegistryTest.attributes
    // Place additional tests attributes here.
    // End of user code

    public function setUp()
    {
        // Start of user code ValidatorsRegistryTest.setUp
        // Place additional setUp code here.
        // End of user code
    }

    public function tearDown()
    {
        // Start of user code ValidatorsRegistryTest.tearDown
        // Place additional tearDown code here.
        // End of user code
    }
    
    /**
     * Test static method clearValidator from class ValidatorsRegistry
     *
     * Start of user code ValidatorsRegistryTest.testclearValidatorAnnotations
     * PHPUnit user annotations can be placed here
     * End of user code
     */
    public function testClearValidator()
    {
        // Start of user code ValidatorsRegistryTest.testclearValidator
	    // Nothing to test here. Tested below by exceptions.
        // End of user code
    }
    
    /**
     * Test static method hasValidator from class ValidatorsRegistry
     *
     * Start of user code ValidatorsRegistryTest.testhasValidatorAnnotations
     * PHPUnit user annotations can be placed here
     * End of user code
     */
    public function testHasValidator()
    {
        // Start of user code ValidatorsRegistryTest.testhasValidator
        $validator = new NotEmptyValidator();
        ValidatorsRegistry::registerValidator($validator);
        $this->assertTrue(ValidatorsRegistry::hasValidator('notempty'));
        $this->assertFalse(ValidatorsRegistry::hasValidator('foo'));
        // End of user code
    }
    
    /**
     * Test static method getValidator from class ValidatorsRegistry
     *
     * Start of user code ValidatorsRegistryTest.testgetValidatorAnnotations
     * PHPUnit user annotations can be placed here
     * End of user code
     */
    public function testGetValidator()
    {
        // Start of user code ValidatorsRegistryTest.testgetValidator
        $validator = new NotEmptyValidator();
        ValidatorsRegistry::registerValidator($validator);
        $this->assertEquals(
            $validator, 
            ValidatorsRegistry::getValidator('notempty')
        );
        // End of user code
    }
    
    /**
     * Test static method registerValidator from class ValidatorsRegistry
     *
     * Start of user code ValidatorsRegistryTest.testregisterValidatorAnnotations
     * PHPUnit user annotations can be placed here
     * End of user code
     */
    public function testRegisterValidator()
    {
        // Start of user code ValidatorsRegistryTest.testregisterValidator
	    // Method implicitly tested by testGetValidator
        // End of user code
    }

    // Start of user code ValidatorsRegistryTest.methods
    
	/**
	 * Test getting a non existant Validator
     *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionArgument There isnt 'foo' Validator registered
	 */
	public function testGettingNonExistantValidator()
	{
	    ValidatorsRegistry::getValidator('foo');
	}
	
	/**
	 * Test getting a clear Validator
     *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionArgument There isnt 'foo' Validator registered
	 */
	public function testGettingClearValidator()
	{
        $validator = new NotEmptyValidator();
        ValidatorsRegistry::registerValidator($validator);
	    ValidatorsRegistry::clearValidator('notempty');
	    ValidatorsRegistry::getValidator('notempty');
	}	
	
	/**
	 * Test clear a non existant Validator
     *
	 * @expectedException InvalidArgumentException
	 * @expectedExceptionArgument No entity mapping for entity "test"
	 */
	public function testClearNonExistantValidator()
	{
	    ValidatorsRegistry::clearValidator('foo');
	}
    // End of user code
}
