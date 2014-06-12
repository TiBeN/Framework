<?php

namespace TiBeN\Framework\Validation;

// Start of user code StringLengthValidator.useStatements
// Place your use statements here.
// End of user code

/**
 * Check whether the number of characters of a string match min/max size.
 * ValidationRules:
 * 	'min': (optional) The min number of characters allowed
 * 	'max': (optional) The max number of characters allowed 
 * 
 *
 * @package TiBeN\Framework\Validation
 * @author TiBeN
 */
class StringLengthValidator implements Validator
{
    /**
     * Type of the element T
     * @var String
     */
    protected $TType;

    public function __construct($TType = null)
    {
        $this->TType = $TType;

        // Start of user code StringLengthValidator.constructor
        $this->TType = 'string';
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

        if (($configuration->has('min') && strlen($value) < $configuration->get('min'))
            || ($configuration->has('max') && strlen($value) > $configuration->get('max'))         ) {
            $result->setValidationResult(false);
            $errorMessagePattern = $validationRule->getErrorMessagePattern();
            if (!empty($errorMessagePattern)) {
                $result->parseAndSetErrorMessage($errorMessagePattern, $value);
            } else {
                if($configuration->has('min') && !$configuration->has('max')) {
                    $result->setErrorMessage(
                        sprintf(
                            'The string must contain %s characters min',
                            $configuration->get('min')
                        ) 
                    );
                } 
                elseif ($configuration->has('max') && !$configuration->has('min')) {
                    $result->setErrorMessage(
                        sprintf(
                            'The string must contain %s characters max',
                            $configuration->get('max')
                        ) 
                    );
                }
                else {
                    $result->setErrorMessage(
                        sprintf(
                            'The string must contain between %s and %s characters',
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

    /**
     * Return the name of the validator.
     *
     * @return string $name
     */
    public function getName()
    {
        // Start of user code Validator.getName
        $name = 'stringlength';
        // End of user code
    
        return $name;
    }

    // Start of user code StringLengthValidator.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
