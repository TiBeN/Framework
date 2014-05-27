<?php

namespace TiBeN\Framework\Validation;

// Start of user code NotEmptyValidator.useStatements
// Place your use statements here.
// End of user code

/**
 * Check whether a variable is not null nor empty.
 * 
 *
 * @package TiBeN\Framework\Validation
 * @author TiBeN
 */
class NotEmptyValidator implements Validator
{
    /**
     * Type of the element T
     * @var String
     */
    protected $TType;

    public function __construct($TType = null)
    {
        $this->TType = $TType;

        // Start of user code NotEmptyValidator.constructor
        $this->TType = null;
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code NotEmptyValidator.destructor
        // End of user code
    }
    
    /**
     * T type getter
     * @var String
     */
    public function getTType()
    {
        return $this->TType;
    }

    /**
     * Emulate Templates (generics) in PHP. Check if the type of the object match
     * type specified in constructor.
     * If no type (null) if specified in the constructor, then type is not checked.
     *
     * @param string $type
     * @param <$type> $variable
     * @return boolean 
     */
    private static function typeHint($type, $variable)
    {
        if ($type == null || $variable == null) {
            return;
        }

        if (is_object($variable)) {
            $hint = is_a($variable, $type);
            $varType = get_class($variable);
        } else {
            $varType = gettype($variable);
            $hint = $varType == $type;
        }

        if (!$hint) {
            throw new \InvalidArgumentException(
                sprintf('expects parameter to be %s, %s given', $type, $varType)
            );
        }
    }

    // Validator Realization

    /**
     * Return the name of the validator.
     *
     * @return string $name
     */
    public function getName()
    {
        // Start of user code Validator.getName
        $name = 'notempty';
        // End of user code
    
        return $name;
    }

    /**
     * Perform the validation of a value.
     *
     * @param ValidationRule $validationRule
     * @param T $value
     * @return ValidationResult $result
     */
    public function validate(ValidationRule $validationRule, $value)
    {
        $this->typeHint($this->TType, $value);
        // Start of user code Validator.validate
        $result = new ValidationResult();

        if(empty($value)) {
            $result->setValidationResult(false);
            $errorMessage = !is_null($validationRule->getErrorMessagePattern())
                ? $validationRule->getErrorMessagePattern()
                : 'The value is empty'
            ;   
            $result->parseAndSetErrorMessage($errorMessage, $value);
        } else {
            $result->setValidationResult(true);
        }    
        // End of user code
    
        return $result;
    }

    // Start of user code NotEmptyValidator.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
