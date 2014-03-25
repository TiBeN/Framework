<?php

namespace TiBeN\Framework\Entity;

/**
 * 
 *
 * @package Entity
 * @author TiBeN
 */
class EntityMapping
{
    /**
     * @var string
     */
    public $dataSourceName;

    /**
     * @var AssociativeArray
     */
    public $attributeMappings;

    /**
     * @var string
     */
    public $entityName;

    /**
     * @var DataSourceEntityMappingConfiguration
     */
    public $dataSourceEntityConfiguration;

    public function __construct()
    {
        // Start of user code EntityMapping.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code EntityMapping.destructor
        // End of user code
    }

    /**
     * @return string
     */
    public function getDataSourceName()
    {
        // Start of user code Getter EntityMapping.getDataSourceName
        // End of user code
        return $this->dataSourceName;
    }

    /**
     * @param string $dataSourceName
     */
    public function setDataSourceName($dataSourceName)
    {
        // Start of user code Setter EntityMapping.setDataSourceName
        // End of user code
        $this->dataSourceName = $dataSourceName;
    }

    /**
     * @return AssociativeArray
     */
    public function getAttributeMappings()
    {
        // Start of user code Getter EntityMapping.getAttributeMappings
        // End of user code
        return $this->attributeMappings;
    }

    /**
     * @param AssociativeArray $attributeMappings
     */
    public function setAttributeMappings(AssociativeArray $attributeMappings)
    {
        // Start of user code Setter EntityMapping.setAttributeMappings
        // End of user code
        $this->attributeMappings = $attributeMappings;
    }

    /**
     * @return string
     */
    public function getEntityName()
    {
        // Start of user code Getter EntityMapping.getEntityName
        // End of user code
        return $this->entityName;
    }

    /**
     * @param string $entityName
     */
    public function setEntityName($entityName)
    {
        // Start of user code Setter EntityMapping.setEntityName
        // End of user code
        $this->entityName = $entityName;
    }

    /**
     * @return DataSourceEntityMappingConfiguration
     */
    public function getDataSourceEntityConfiguration()
    {
        // Start of user code Getter EntityMapping.getDataSourceEntityConfiguration
        // End of user code
        return $this->dataSourceEntityConfiguration;
    }

    /**
     * @param DataSourceEntityMappingConfiguration $dataSourceEntityConfiguration
     */
    public function setDataSourceEntityConfiguration(DataSourceEntityMappingConfiguration $dataSourceEntityConfiguration)
    {
        // Start of user code Setter EntityMapping.setDataSourceEntityConfiguration
        // End of user code
        $this->dataSourceEntityConfiguration = $dataSourceEntityConfiguration;
    }

    /**
     * @param AssociativeArray $config
     * @return EntityMapping $entityMapping
     */
    public static function create(AssociativeArray $config)
    {
        // Start of user code EntityMapping.create
        // TODO should be implemented.
        // End of user code
    
        return $entityMapping;
    }

    // Start of user code EntityMapping.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
