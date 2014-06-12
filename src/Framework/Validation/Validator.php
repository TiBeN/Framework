<?php

namespace TiBeN\Framework\Validation;

/**
 * Determine whether a value conforms to some kind
 * of rule.  
 *
 * @package TiBeN\Framework\Validation
 * @author TiBeN
 */ 
interface Validator
{
	/**
	 * Perform the validation of a value.
	 *
	 * @param ValidationRule $validationRule
	 * @param T $value
	 * @return ValidationResult $result
	 */
	public function validate(ValidationRule $validationRule, $value);

	/**
	 * Return the name of the validator.
	 *
	 * @return string $name
	 */
	public function getName();

}
