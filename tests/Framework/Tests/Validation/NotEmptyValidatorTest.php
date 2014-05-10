<?php

namespace TiBeN\Framework\Tests\Validation;

use TiBeN\Framework\Validation\NotEmptyValidator;

// Start of user code NotEmptyValidator.useStatements
use TiBeN\Framework\Validation\ValidationRule;
// End of user code

/**
 * Test cases for class NotEmptyValidator
 * 
 * Start of user code NotEmptyValidatorTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @author TiBeN
 */
class NotEmptyValidatorTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code NotEmptyValidatorTest.attributes
	// Place additional tests attributes here.  
	// End of user code

    public function setUp()
    {
        // Start of user code NotEmptyValidatorTest.setUp
		// Place additional setUp code here.  
		// End of user code
    }

    public function tearDown()
    {
        // Start of user code NotEmptyValidatorTest.tearDown
		// Place additional tearDown code here.  
		// End of user code
    }
    
    

    /**
     * Test method getName from interface Validator
     * Start of user code Validator.testgetNameAnnotations
     * PHPUnit users annotations can be placed here
     * End of user code
     */
    public function testGetName()
    {
        // Start of user code Validator.testgetName
        $notEmptyValidator = new NotEmptyValidator();
        $this->assertEquals('notempty', $notEmptyValidator->getName());
        // End of user code
    }
    
    /**
     * Test method validate from interface Validator
     * Start of user code Validator.testvalidateAnnotations 
     * PHPUnit users annotations can be placed here  
     * End of user code
     */
    public function testValidate()
    {
        // Start of user code Validator.testvalidate
        $notEmptyValidator = new NotEmptyValidator();
        $validationResult = $notEmptyValidator->validate(
            new ValidationRule(),
            'foo'
        );         
        $this->assertTrue($validationResult->getValidationResult());
        $this->assertNull($validationResult->getErrorMessage());

        $validationResult = $notEmptyValidator->validate(
            new ValidationRule(),
            null
        );
        $this->assertFalse($validationResult->getValidationResult());
        $this->assertEquals(
            'The value is empty',
            $validationResult->getErrorMessage()
        );            

        $validationRule = new ValidationRule();
        $validationRule->setErrorMessagePattern('Hello, an error has been thrown!');

        $validationResult = $notEmptyValidator->validate(
            $validationRule,
            null
        );
        $this->assertFalse($validationResult->getValidationResult());
        $this->assertEquals(
            'Hello, an error has been thrown!',
            $validationResult->getErrorMessage()
        );
    	// End of user code
    }

    // Start of user code NotEmptyValidatorTest.methods
	// Place additional tests methods here.  
	// End of user code
}
