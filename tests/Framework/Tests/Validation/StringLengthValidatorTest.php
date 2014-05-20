<?php

namespace TiBeN\Framework\Tests\Validation;

use TiBeN\Framework\Validation\StringLengthValidator;

// Start of user code StringLengthValidator.useStatements
use TiBeN\Framework\Validation\ValidationRule;

// End of user code

/**
 * Test cases for class StringLengthValidator
 * 
 * Start of user code StringLengthValidatorTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\Validation
 * @author TiBeN
 */
class StringLengthValidatorTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code StringLengthValidatorTest.attributes
    // Place additional tests attributes here.
    // End of user code

    public function setUp()
    {
        // Start of user code StringLengthValidatorTest.setUp
        // Place additional setUp code here.
        // End of user code
    }

    public function tearDown()
    {
        // Start of user code StringLengthValidatorTest.tearDown
        // Place additional tearDown code here.
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
        $stringLengthValidator = new StringLengthValidator();
        
        $validationRule = new ValidationRule();
        $validationRule->getConfiguration()->set('min', 5);

        $validationResult = $stringLengthValidator->validate($validationRule, 'hello!');
        $this->assertTrue($validationResult->getValidationResult());  
        
        $validationResult = $stringLengthValidator->validate($validationRule, 'hell');
        $this->assertFalse($validationResult->getValidationResult());  
        $this->assertEquals(
            'The string must contain 5 characters min',        
            $validationResult->getErrorMessage()
        );

        $validationRule = new ValidationRule();
        $validationRule->getConfiguration()->set('max', 5);

        $validationResult = $stringLengthValidator->validate($validationRule, 'hello');
        $this->assertTrue($validationResult->getValidationResult());  
        
        $validationResult = $stringLengthValidator->validate($validationRule, 'hello!');
        $this->assertFalse($validationResult->getValidationResult());  
        $this->assertEquals(
            'The string must contain 5 characters max',        
            $validationResult->getErrorMessage()
        );

        $validationRule = new ValidationRule();
        $validationRule->getConfiguration()->set('min', 3);
        $validationRule->getConfiguration()->set('max', 5);
        
        $validationResult = $stringLengthValidator->validate($validationRule, 'hello');
        $this->assertTrue($validationResult->getValidationResult());  
        
        $validationResult = $stringLengthValidator->validate($validationRule, 'hello!');
        $this->assertFalse($validationResult->getValidationResult());  
        $this->assertEquals(
            'The string must contain between 3 and 5 characters',
            $validationResult->getErrorMessage()
        );

        /* Test custom message */ 
        $validationRule = new ValidationRule();
        $validationRule->getConfiguration()->set('min', 3);
        $validationRule->setErrorMessagePattern('"{value}" contain less than 3 chars');
        
        $validationResult = $stringLengthValidator->validate($validationRule, 'he');
        $this->assertFalse($validationResult->getValidationResult());  
        $this->assertEquals(
            '"he" contain less than 3 chars',        
            $validationResult->getErrorMessage()
        );
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
        $stringLengthValidator = new StringLengthValidator();
        $this->assertEquals('stringlength', $stringLengthValidator->getName());
        // End of user code
    }

    // Start of user code StringLengthValidatorTest.methods

    /**
     * Test an empty validation rule
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage You must specify at least a 'min' or a 'max' rule
     */
    public function testAnEmptyValidationRule()
    {
        $stringLengthValidator = new StringLengthValidator();
        $stringLengthValidator->validate(new ValidationRule(), 'foobar');
    }
    // End of user code
}
