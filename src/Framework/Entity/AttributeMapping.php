<?php

namespace TiBeN\Framework\Entity;

use TiBeN\Framework\Datatype\AssociativeArray;
use TiBeN\Framework\Validation\ValidationRule;

/**
 * 
 *
 * @package Entity
 * @author TiBeN
 */
class AttributeMapping
{
    /**
     * @var bool
     */
    public $isIdentifier;

    /**
     * @var string
     */
    public $name;

    /**
     * @var array
     */
    public $validationRules;

    /**
     * @var DataSourceAttributeMappingConfiguration
     */
    public $dataSourceAttributeMappingConfiguration;

    /**
     * @var AssociativeArray
     */
    public $type;

    public function __construct()
    {
        // Start of user code AttributeMapping.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code AttributeMapping.destructor
        // End of user code
    }

    /**
     * @return bool
     */
    public function getIsIdentifier()
    {
        // Start of user code Getter AttributeMapping.getIsIdentifier
        // End of user code
        return $this->isIdentifier;
    }

    /**
     * @param bool $isIdentifier
     */
    public function setIsIdentifier($isIdentifier)
    {
        // Start of user code Setter AttributeMapping.setIsIdentifier
        // End of user code
        $this->isIdentifier = $isIdentifier;
    }

    /**
     * @return string
     */
    public function getName()
    {
        // Start of user code Getter AttributeMapping.getName
        // End of user code
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        // Start of user code Setter AttributeMapping.setName
        // End of user code
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getValidationRules()
    {
        // Start of user code Getter AttributeMapping.getValidationRules
        // End of user code
        return $this->validationRules;
    }

    /**
     * @param array $validationRules
     */
    public function setValidationRules(array $validationRules)
    {
        // Start of user code Setter AttributeMapping.setValidationRules
        // End of user code
        $this->validationRules = $validationRules;
    }

    /**
     * @return DataSourceAttributeMappingConfiguration
     */
    public function getDataSourceAttributeMappingConfiguration()
    {
        // Start of user code Getter AttributeMapping.getDataSourceAttributeMappingConfiguration
        // End of user code
        return $this->dataSourceAttributeMappingConfiguration;
    }

    /**
     * @param DataSourceAttributeMappingConfiguration $dataSourceAttributeMappingConfiguration
     */
    public function setDataSourceAttributeMappingConfiguration(DataSourceAttributeMappingConfiguration $dataSourceAttributeMappingConfiguration)
    {
        // Start of user code Setter AttributeMapping.setDataSourceAttributeMappingConfiguration
        // End of user code
        $this->dataSourceAttributeMappingConfiguration = $dataSourceAttributeMappingConfiguration;
    }

    /**
     * @return AssociativeArray
     */
    public function getType()
    {
        // Start of user code Getter AttributeMapping.getType
        // End of user code
        return $this->type;
    }

    /**
     * @param AssociativeArray $type
     */
    public function setType(AssociativeArray $type)
    {
        // Start of user code Setter AttributeMapping.setType
        // End of user code
        $this->type = $type;
    }

    /**
     * @param AssociativeArray $config
     * @return AttributeMapping $attributeMapping
     */
    public static function create(AssociativeArray $config)
    {
        // Start of user code AttributeMapping.create
        // TODO should be implemented.
        // End of user code
    
        return $attributeMapping;
    }

    // Start of user code AttributeMapping.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
