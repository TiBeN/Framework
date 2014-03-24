<?php

namespace TiBeN\Framework\Validation;
 
/**
 *  
 * @package Validation
 * @author TiBeN
 */ 
interface Validator
{
	/**
	 * @param ValidationRule $validationRule
	 */
	public function setValidationRule(ValidationRule $validationRule);

	/**
	 * @return ValidationResult $result
	 */
	public function validate();

}
