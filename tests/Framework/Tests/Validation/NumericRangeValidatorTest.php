<?php

namespace TiBeN\Framework\Tests\Validation;

use TiBeN\Framework\Validation\NumericRangeValidator;

// Start of user code NumericRangeValidator.useStatements
use TiBeN\Framework\Validation\ValidationRule;

// End of user code

/**
 * Test cases for class NumericRangeValidator
 * 
 * Start of user code NumericRangeValidatorTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\Validation
 * @author TiBeN
 */
class NumericRangeValidatorTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code NumericRangeValidatorTest.attributes
    // Place additional tests attributes here.
    // End of user code

    public function setUp()
    {
        // Start of user code NumericRangeValidatorTest.setUp
        // Place additional setUp code here.
        // End of user code
    }

    public function tearDown()
    {
        // Start of user code NumericRangeValidatorTest.tearDown
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
        $numericRangeValidator = new NumericRangeValidator();
        $this->assertEquals('numericrange', $numericRangeValidator->getName());
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
        $numericRangeValidator = new NumericRangeValidator();

        $validationRule = new ValidationRule();
        $validationRule->getConfiguration()->set('min', 5);

        $validationResult = $numericRangeValidator->validate($validationRule, 5);
        $this->assertTrue($validationResult->getValidationResult());

        $validationResult = $numericRangeValidator->validate($validationRule, 5.1);
        $this->assertTrue($validationResult->getValidationResult());

        $validationResult = $numericRangeValidator->validate($validationRule, 4.999);
        $this->assertFalse($validationResult->getValidationResult());
        $this->assertEquals(
            'The number must equal 5 or higher',        
            $validationResult->getErrorMessage()
        );
 
        $validationRule = new ValidationRule();
        $validationRule->getConfiguration()->set('max', 5);

        $validationResult = $numericRangeValidator->validate($validationRule, 5);
        $this->assertTrue($validationResult->getValidationResult());

        $validationResult = $numericRangeValidator->validate($validationRule, 4.999);
        $this->assertTrue($validationResult->getValidationResult());

        $validationResult = $numericRangeValidator->validate($validationRule, 5.1);
        $this->assertFalse($validationResult->getValidationResult());
        $this->assertEquals(
            'The number must equal 5 or lower',        
            $validationResult->getErrorMessage()
        );
        
        $validationRule = new ValidationRule();
        $validationRule->getConfiguration()->set('min', 5);
        $validationRule->getConfiguration()->set('max', 7);
        $validationResult = $numericRangeValidator->validate($validationRule, 6);
        $this->assertTrue($validationResult->getValidationResult());

        $validationResult = $numericRangeValidator->validate($validationRule, 4.999);
        $this->assertFalse($validationResult->getValidationResult());
        $this->assertEquals(
            'The number must be between 5 and 7',        
            $validationResult->getErrorMessage()
        );

        $validationRule->setErrorMessagePattern('"{value}" is out of range!');
        $validationResult = $numericRangeValidator->validate($validationRule, 4.999);
        $this->assertFalse($validationResult->getValidationResult());
        $this->assertEquals(
            '"4.999" is out of range!',        
            $validationResult->getErrorMessage()
        );
        // End of user code
    }

    // Start of user code NumericRangeValidatorTest.methods

    /**
     * Test an empty validation rule
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage You must specify at least a 'min' or a 'max' rule
     */
    public function testAnEmptyValidationRule()
    {
        $stringLengthValidator = new NumericRangeValidator();
        $stringLengthValidator->validate(new ValidationRule(), 1337);
    }
    // End of user code
}
