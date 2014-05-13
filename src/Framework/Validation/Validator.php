<?php

namespace TiBeN\Framework\Validation;

/**
 *  
 *
 * @package TiBeN\Framework\Validation
 * @author TiBeN
 */ 
interface Validator
{
	/**
	 * @return string $name
	 */
	public function getName();

	/**
	 * @param ValidationRule $validationRule
	 * @param T $value
	 * @return ValidationResult $result
	 */
	public function validate(ValidationRule $validationRule, $value);

}
