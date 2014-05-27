<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Entity\EntityMapping;
use TiBeN\Framework\Entity\Entity;
use TiBeN\Framework\DataSource\DataSourceTypeConvertersRegistry;

// Start of user code MysqlEntityAttributeMapper.useStatements
// Place your use statements here.
// End of user code

/**
 * Contains entity mapping related services.
 * 
 *
 * @package TiBeN\Framework\DataSource\MysqlDataSource
 * @author TiBeN
 */
class MysqlEntityAttributeMapper
{
    /**
     * @var EntityMapping
     */
    public $entityMapping;

    /**
     * @var Entity
     */
    public $entity;

    public function __construct()
    {
        // Start of user code MysqlEntityAttributeMapper.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code MysqlEntityAttributeMapper.destructor
        // End of user code
    }

    /**
     * @return EntityMapping
     */
    public function getEntityMapping()
    {
        // Start of user code Getter MysqlEntityAttributeMapper.getEntityMapping
        // End of user code
        return $this->entityMapping;
    }

    /**
     * @param EntityMapping $entityMapping
     */
    public function setEntityMapping(EntityMapping $entityMapping)
    {
        // Start of user code Setter MysqlEntityAttributeMapper.setEntityMapping
        // End of user code
        $this->entityMapping = $entityMapping;
    }

    /**
     * @return Entity
     */
    public function getEntity()
    {
        // Start of user code Getter MysqlEntityAttributeMapper.getEntity
        // End of user code
        return $this->entity;
    }

    /**
     * @param Entity $entity
     */
    public function setEntity(Entity $entity)
    {
        // Start of user code Setter MysqlEntityAttributeMapper.setEntity
        // End of user code
        $this->entity = $entity;
    }

    /**
     * Get the mapped mysql column name of 
     * an attribute.
     *
     * @param string $attributeName
     * @return string $columnName
     */
    public function getColumnName($attributeName)
    {
        // Start of user code MysqlEntityAttributeMapper.getColumnName
        if(!isset($this->entityMapping)) {
            throw new \LogicException('No entity mapping set');
        }       

        if(!$this->entityMapping->getAttributeMappings()->has($attributeName)) {
            throw new \InvalidArgumentException(
                sprintf('Entity has no attribute \'%s\' or is not mapped', $attributeName)
            );
        }       
        
        $columnName = $this
            ->entityMapping
            ->getAttributeMappings()
            ->get($attributeName)
            ->getDataSourceAttributeMappingConfiguration()
            ->getColumnName()
        ;         
        // End of user code
    
        return $columnName;
    }

    /**
     * Get the mysql column converted value of an attribute.
     * 
     *
     * @param string $attributeName
     * @return string $columnValue
     */
    public function getColumnValue($attributeName)
    {
        // Start of user code MysqlEntityAttributeMapper.getColumnValue
        if(!isset($this->entity)) {
            throw new \LogicException('No entity set');
        }
        
        if(!isset($this->entityMapping)) {
            throw new \LogicException('No entity mapping set');
        }       
        
        if(!$this->entityMapping->getAttributeMappings()->has($attributeName)) {
            throw new \InvalidArgumentException(
                sprintf('Entity has no attribute \'%s\' or is not mapped', $attributeName)
            );
        }
        $attributeTypeParameters = $this
            ->entityMapping
            ->getAttributeMappings()
            ->get($attributeName)
            ->getType()
        ;
        $converter = DataSourceTypeConvertersRegistry::getTypeConverter(
            $attributeTypeParameters
                ->get('name')
            , 
            'mysql'
        );

        // Define converter parameters from type configuration of the attribute 
        $converterParameters = clone $attributeTypeParameters;
        $converterParameters->remove('name');
        $converter->setParameters($converterParameters);

        $getterName = 'get' . ucfirst($attributeName);
        $columnValue = $converter->convert($this->entity->$getterName());
        // End of user code
    
        return $columnValue;
    }

    /**
     * Get the value of the identifier of an entity.
     *
     * @return int $identifier
     */
    public function getIdentifierValue()
    {
        // Start of user code MysqlEntityAttributeMapper.getIdentifierValue
        $attributeSetterName = 'get'
            . ucfirst($this->getIdentifierAttributeName())
        ;   
        $identifier = $this->entity->$attributeSetterName();
        // End of user code
    
        return $identifier;
    }

    /**
     * Set the value of an entity attribute from its
     * mapped mysql column name.
     *
     * @param string $columnName
     * @param string $value
     */
    public function setAttributeValue($columnName, $value)
    {
        // Start of user code MysqlEntityAttributeMapper.setAttributeValue
        if(!isset($this->entity)) {
            throw new \LogicException('No entity set');
        }
         
        if(!isset($this->entityMapping)) {
            throw new \LogicException('No entity mapping set');
        }
        
        foreach($this->entityMapping->getAttributeMappings()->toNativeArray() 
            as $attributeName => $attributeMapping
        ) {
            if($attributeMapping
                ->getDataSourceAttributeMappingConfiguration()
                ->getColumnName()
                == $columnName
            ) {
                $attributeFound = $attributeMapping;
                break;
            }                                     
        }       
        
        if(!isset($attributeFound)) {
            throw new \LogicException(
                sprintf('column \'%s\' is not mapped to any attribute', $columnName)
            );
        }

        $converter = DataSourceTypeConvertersRegistry::getTypeConverter(
            $attributeFound
                ->getType()
                ->get('name')
            ,
            'mysql'
        );

        // Define converter parameters from type configuration of the attribute 
        $attributeTypeParameters = clone $attributeFound->getType();
        $attributeTypeParameters->remove('name');
        $converter->setParameters($attributeTypeParameters);

        $attributeSetterName = 'set'
            . ucfirst($attributeFound->getName())
        ;
         
        $this->entity->$attributeSetterName($converter->reverse($value));
        // End of user code
    }

    /**
     * Set the identifier value of an entity.
     *
     * @param int $identifier
     */
    public function setIdentifier($identifier)
    {
        // Start of user code MysqlEntityAttributeMapper.setIdentifier
        if(!isset($this->entity)) {
            throw new \LogicException('No entity set');
        }
        
        if(!isset($this->entityMapping)) {
            throw new \LogicException('No entity mapping set');
        }

        foreach($this->entityMapping->getAttributeMappings()->toNativeArray() 
            as $attributeName => $attributeMapping
        ) {
            if($attributeMapping->getIsIdentifier()) {
                $columnName = $attributeMapping
                    ->getDataSourceAttributeMappingConfiguration()
                    ->getColumnName()
                ;
                break;
            }                                     
        }       
        
        if(!isset($columnName)) {
            throw new \LogicException('Entity has no identifier attribute mapped');
        }
        
        $this->setAttributeValue($columnName, (string)$identifier);
        // End of user code
    }

    /**
     * Get the attribute name which hold the identifier of 
     * an entity.
     *
     * @return string $attributeName
     */
    public function getIdentifierAttributeName()
    {
        // Start of user code MysqlEntityAttributeMapper.getIdentifierAttributeName
        if(!isset($this->entity)) {
            throw new \LogicException('No entity set');
        }
        
        if(!isset($this->entityMapping)) {
            throw new \LogicException('No entity mapping set');
        }
        
        foreach($this->entityMapping->getAttributeMappings()->toNativeArray()
            as $attributeName => $attributeMapping
        ) {
            if($attributeMapping->getIsIdentifier()) {
                $attributeIdentifier = $attributeMapping;
                break;
            }
        }
        
        if(!isset($attributeIdentifier)) {
            throw new \LogicException('Entity has no identifier attribute mapped');
        }
        // End of user code
    
        return $attributeName;
    }

    // Start of user code MysqlEntityAttributeMapper.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
