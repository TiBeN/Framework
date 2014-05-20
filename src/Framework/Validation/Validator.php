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
	 * @param ValidationRule $validationRule
	 * @param T $value
	 * @return ValidationResult $result
	 */
	public function validate(ValidationRule $validationRule, $value);

	/**
	 * @return string $name
	 */
	public function getName();

}
