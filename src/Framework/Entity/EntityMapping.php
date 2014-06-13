<?php

namespace TiBeN\Framework\Entity;

use TiBeN\Framework\DataSource\DataSourcesRegistry;
use TiBeN\Framework\Validation\ValidationRule;
use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code EntityMapping.useStatements
// Place your use statements here.
// End of user code

/**
 * Holds mapping informations between an entity 
 * and its datasource representation.
 * 
 *  
 *
 * @package TiBeN\Framework\Entity
 * @author TiBeN
 */
class EntityMapping
{
    /**
     * @var AssociativeArray
     */
    public $attributeMappings;

    /**
     * @var string
     */
    public $entityName;

    /**
     * @var string
     */
    public $dataSourceName;

    /**
     * @var DataSourceEntityMappingConfiguration
     */
    public $dataSourceEntityConfiguration;

    public function __construct()
    {
        // Start of user code EntityMapping.constructor
        $this->attributeMappings = new AssociativeArray();
        // End of user code
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
     * Factory methods that ease the instantiation 
     * process of an EntityMapping using associative arrays.
     *
     * @param AssociativeArray $config
     * @return EntityMapping $entityMapping
     */
    public static function create(AssociativeArray $config)
    {
        // Start of user code EntityMapping.create
        if(!$config->has('entity')) {
            throw new \InvalidArgumentException('No Entity specified');
        }
        $entityName = $config->get('entity');
        if(!class_exists($entityName)) {
            throw new \InvalidArgumentException(
                sprintf('The Entity "%s" doesn\'t exist', $entityName)
            );
        }        
        
        if(!$config->has('datasource')) {
            throw new \InvalidArgumentException('No DataSource specified');
        }
        
        $dataSource = $config->get('datasource');
        
        if(!isset($dataSource['name'])) {
            throw new \InvalidArgumentException('No DataSource specified');
        }
        
        if(!DataSourcesRegistry::hasDataSource($dataSource['name'])) {
            throw new \InvalidArgumentException(
                sprintf('The DataSource "%s" doesn\'t exist', $dataSource['name'])
            );
        }
        
        if(!$config->has('attributes')) {
            throw new \InvalidArgumentException('At least one attribute must be set');
        }        
                                
        $entityMapping = new self;
        $entityMapping->setEntityName($entityName);
        $entityMapping->setDataSourceName($dataSource['name']);

        $dataSourceClassName = get_class(
            DataSourcesRegistry::getDataSource($dataSource['name'])
        );
        
        $dataSourceEntityMappingConfigurationClassName 
            = $dataSourceClassName::getEntityMappingConfigurationClassName()
        ;                     
        
        $entityMapping->setDataSourceEntityConfiguration(            
            $dataSourceEntityMappingConfigurationClassName::create(
                AssociativeArray::createFromNativeArray(null, $dataSource)
            )
        );
        
        $dataSourceAttributeMappingConfigurationClassName
            = $dataSourceClassName::getAttributeMappingConfigurationClassName()
        ;        
        
        foreach($config->get('attributes') as $attributeName => $attributeConf) {
            
            if(!isset($attributeConf['type'])) {
                throw new \InvalidArgumentException(
                    sprintf('No type set for attribute \'%s\'', $attributeName)
                );
            }
            
            if(isset($attributeConf['isIdentifier'])) {
                $isIdentifier = $attributeConf['isIdentifier'];
                unset($attributeConf['isIdentifier']);
            }
            else {
                $isIdentifier = false;
            }
            
            $attributeType = $attributeConf['type'];
            unset($attributeConf['type']);

            $attributeValidationRules = array();
            if (isset($attributeConf['validationRules'])) {
                foreach ($attributeConf['validationRules'] as $validationRuleConf) {
                    array_push(
                        $attributeValidationRules, 
                        ValidationRule::create(
                            AssociativeArray::createFromNativeArray(
                                null, 
                                $validationRuleConf
                            )
                        )
                    );
                }
                unset($attributeConf['validationRules']);
            } 
            
            $attributeMapping = AttributeMapping::create(
                AssociativeArray::createFromNativeArray(
                    null, 
                    array(
                        'name' => $attributeName,
                        'type' => AssociativeArray::createFromNativeArray(
                            null, 
                            $attributeType
                        ),    
                        'isIdentifier' => $isIdentifier,    
                        'dataSourceAttributeMappingConfiguration' 
                            => $dataSourceAttributeMappingConfigurationClassName::create(
                                AssociativeArray::createFromNativeArray(
                                    null, 
                                    $attributeConf
                                )
                            )                  
                        ,
                        'validationRules' => $attributeValidationRules
                    )
                )
            );
            
            $entityMapping
                ->getAttributeMappings()
                ->set($attributeName, $attributeMapping)
            ;
        }
        // End of user code
    
        return $entityMapping;
    }

    /**
     * Determine the attribute which acts as an identifer of
     * the entity and return its attributemapping. 
     *
     * @return AttributeMapping $attributeMapping
     */
    public function getIdentifierAttributeMapping()
    {
        // Start of user code EntityMapping.getIdentifierAttributeMapping
        foreach ($this->getAttributeMappings()->toNativeArray()
            as $attributeName => $attributeMapping
        ) {
            if($attributeMapping->getIsIdentifier()) {
                $attributeIdentifier = $attributeMapping;
                break;
            }
        }
        if (!isset($attributeIdentifier)) {
            throw new \LogicException('The EntityMapping has no attribute set as identifier');
        }
        $attributeMapping = $attributeIdentifier;
        // End of user code
    
        return $attributeMapping;
    }

    // Start of user code EntityMapping.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
