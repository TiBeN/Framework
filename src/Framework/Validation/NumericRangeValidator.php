<?php

namespace TiBeN\Framework\Validation;

// Start of user code NumericRangeValidator.useStatements
// Place your use statements here.
// End of user code

/**
 * Check whether a number fit in a specified range.
 * ValidationRules:
 *  'min': (optional) The min number 
 *  'max': (optional) The max number 
 * 
 *
 * @package TiBeN\Framework\Validation
 * @author TiBeN
 */
class NumericRangeValidator implements Validator
{
    /**
     * Type of the element T
     * @var String
     */
    protected $TType;

    public function __construct($TType = null)
    {
        $this->TType = $TType;

        // Start of user code NumericRangeValidator.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code NumericRangeValidator.destructor
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
        $name = "numericrange";
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
        $configuration = $validationRule->getConfiguration();
        if (!$configuration->has('min') && !$configuration->has('max')) {
            throw new \InvalidArgumentException(
                'You must specify at least a \'min\' or a \'max\' rule'
            );
        }

        $result = new ValidationResult();
        $result->setValidationResult(true);

        if (($configuration->has('min') && $value < $configuration->get('min'))
            || ($configuration->has('max') && $value > $configuration->get('max'))         ) {
            $result->setValidationResult(false);
            $errorMessagePattern = $validationRule->getErrorMessagePattern();
            if (!empty($errorMessagePattern)) {
                $result->parseAndSetErrorMessage($errorMessagePattern, $value);
            } else {
                if($configuration->has('min') && !$configuration->has('max')) {
                    $result->setErrorMessage(
                        sprintf(
                            'The number must equal %s or higher',
                            $configuration->get('min')
                        ) 
                    );
                } 
                elseif ($configuration->has('max') && !$configuration->has('min')) {
                    $result->setErrorMessage(
                        sprintf(
                            'The number must equal %s or lower',
                            $configuration->get('max')
                        ) 
                    );
                }
                else {
                    $result->setErrorMessage(
                        sprintf(
                            'The number must be between %s and %s',
                            $configuration->get('min'),
                            $configuration->get('max')
                        ) 
                    );
                }
            }
        }
        // End of user code
    
        return $result;
    }

    // Start of user code NumericRangeValidator.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
