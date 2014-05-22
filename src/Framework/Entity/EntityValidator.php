<?php

namespace TiBeN\Framework\Entity;

use TiBeN\Framework\Validation\ValidatorsRegistry;

// Start of user code EntityValidator.useStatements
// Place your use statements here.
// End of user code

/**
 * 
 *
 * @package TiBeN\Framework\Entity
 * @author TiBeN
 */
class EntityValidator
{
    public function __construct()
    {
        // Start of user code EntityValidator.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code EntityValidator.destructor
        // End of user code
    }

    /**
     * @param EntityMapping $entityMapping
     * @param Entity $entity
     * @return EntityValidationResult $entityValidationResult
     */
    public function validate(EntityMapping $entityMapping, Entity $entity)
    {
        // Start of user code EntityValidator.validate
        $entityValidationResult = new EntityValidationResult();
        $entityValidationResult->setResult(true);
        foreach($entityMapping->getAttributeMappings() 
            as $attributeName => $attributeMapping
        ) {
            if(!empty($attributeMapping->getValidationRules())) {
                foreach($attributeMapping->getValidationRules() as $validationRule) {
                    $validator = ValidatorsRegistry::getValidator(
                        $validationRule->getValidatorName()
                    );
                    $entityAttributeGetterMethodName = 'get' . ucfirst($attributeName);
                    if(!method_exists($entity, $entityAttributeGetterMethodName)) {
                        throw new \LogicException(
                            sprintf(
                                'No getter method found for the declared attribute'
                                    . '\'%s\' in entity \'%s\''
                                ,
                                $attributeName,
                                get_class($entity) 
                            )
                        );
                    }
                    $validationResult = $validator->validate(
                        $validationRule, 
                        $entity->$entityAttributeGetterMethodName()
                    );
                    if(!$validationResult->getValidationResult()) {
                        $entityValidationResult->setResult(false);
                        $validationResults = $entityValidationResult
                            ->getValidationResults()
                        ;
                        array_push($validationResults, $validationResult);
                        $entityValidationResult->setValidationResults(
                            $validationResults
                        );
                    }
                }
            }
        }
        // End of user code
    
        return $entityValidationResult;
    }

    // Start of user code EntityValidator.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
