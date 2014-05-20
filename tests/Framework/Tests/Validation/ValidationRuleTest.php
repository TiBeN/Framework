<?php

namespace TiBeN\Framework\Tests\Validation;

use TiBeN\Framework\Validation\ValidationRule;

// Start of user code ValidationRule.useStatements
use TiBeN\Framework\Datatype\AssociativeArray;

// End of user code

/**
 * Test cases for class ValidationRule
 * 
 * Start of user code ValidationRuleTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\Validation
 * @author TiBeN
 */
class ValidationRuleTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code ValidationRuleTest.attributes
    // Place additional tests attributes here.
    // End of user code

    public function setUp()
    {
        // Start of user code ValidationRuleTest.setUp
        // Place additional setUp code here.
        // End of user code
    }

    public function tearDown()
    {
        // Start of user code ValidationRuleTest.tearDown
        // Place additional tearDown code here.
        // End of user code
    }
    
    /**
     * Test static method create from class ValidationRule
     *
     * Start of user code ValidationRuleTest.testcreateAnnotations
     * PHPUnit user annotations can be placed here
     * End of user code
     */
    public function testCreate()
    {
        // Start of user code ValidationRuleTest.testcreate
        $validationRuleConfiguration = AssociativeArray::createFromNativeArray (
            null,
            array(
                'name' => 'stringlength',
                'configuration' => array(
                    'min' => 3
                ),
                'message' => 'AttributeB is too short (3 chars min)'
            )
        );
        
        $expectedValidationRule = new ValidationRule();
        $expectedValidationRule->setValidatorName('stringlength');
        $expectedValidationRule->getConfiguration()->set('min', 3);
        $expectedValidationRule->setErrorMessagePattern(
            'AttributeB is too short (3 chars min)'
        );

        $this->assertEquals(
            $expectedValidationRule, 
            ValidationRule::create($validationRuleConfiguration)
        );
        // End of user code
    }

    // Start of user code ValidationRuleTest.methods
    // End of user code
}
