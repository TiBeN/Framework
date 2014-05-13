<?php

namespace TiBeN\Framework\Tests\Validation;

use TiBeN\Framework\Validation\ValidationResult;

// Start of user code ValidationResult.useStatements
// Place your use statements here.
// End of user code

/**
 * Test cases for class ValidationResult
 * 
 * Start of user code ValidationResultTest.testAnnotations
 * PHPUnit user annotations can be placed here
 * End of user code
 *
 * @package TiBeN\Framework\Tests\Validation
 * @author TiBeN
 */
class ValidationResultTest extends \PHPUnit_Framework_TestCase
{
    // Start of user code ValidationResultTest.attributes
    // Place additional tests attributes here.
    // End of user code

    public function setUp()
    {
        // Start of user code ValidationResultTest.setUp
        // Place additional setUp code here.
        // End of user code
    }

    public function tearDown()
    {
        // Start of user code ValidationResultTest.tearDown
        // Place additional tearDown code here.
        // End of user code
    }
    
    /**
     * Test method parseAndSetErrorMessage from class ValidationResult
     *
     * Start of user code ValidationResultTest.testparseAndSetErrorMessageAnnotations
     * PHPUnit user annotations can be placed here
     * End of user code
     */
    public function testParseAndSetErrorMessage()
    {
        // Start of user code ValidationResultTest.testparseAndSetErrorMessage
        $validationResult = new ValidationResult();
        $validationResult->parseAndSetErrorMessage(
            'foo!! something went wrong while validate "{value}"',
            'bar'        
        );
        $this->assertEquals(
            'foo!! something went wrong while validate "bar"',
            $validationResult->getErrorMessage()
        );            
        // End of user code
    }

    // Start of user code ValidationResultTest.methods
    // Place additional tests methods here.
    // End of user code
}
