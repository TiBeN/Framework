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
	 * @return ValidationResult $result
	 */
	public function validate();

	/**
	 * @param ValidationRule $validationRule
	 */
	public function setValidationRule(ValidationRule $validationRule);

}
