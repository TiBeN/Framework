<?php

namespace TiBeN\Framework\Entity;

use TiBeN\Framework\DataSource\DataSourcesRegistry;
use TiBeN\Framework\DataSource\DataSource;

// Start of user code EntityRepository.useStatements
// Place your use statements here.
// End of user code

/**
 * 
 *
 * @package TiBeN\Framework\Entity
 * @author TiBeN
 */
class EntityRepository
{
    /**
     * @var EntityMapping
     */
    public $entityMapping;

    /**
     * @var DataSource
     */
    public $dataSource;

    public function __construct()
    {
        // Start of user code EntityRepository.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code EntityRepository.destructor
        // End of user code
    }

    /**
     * @return EntityMapping
     */
    public function getEntityMapping()
    {
        // Start of user code Getter EntityRepository.getEntityMapping
        // End of user code
        return $this->entityMapping;
    }

    /**
     * @param EntityMapping $entityMapping
     */
    public function setEntityMapping(EntityMapping $entityMapping)
    {
        // Start of user code Setter EntityRepository.setEntityMapping
        // End of user code
        $this->entityMapping = $entityMapping;
    }

    /**
     * @return DataSource
     */
    public function getDataSource()
    {
        // Start of user code Getter EntityRepository.getDataSource
        // End of user code
        return $this->dataSource;
    }

    /**
     * @param DataSource $dataSource
     */
    public function setDataSource(DataSource $dataSource)
    {
        // Start of user code Setter EntityRepository.setDataSource
        // End of user code
        $this->dataSource = $dataSource;
    }

    /**
     * @param Entity $entity
     */
    public function delete(Entity $entity)
    {
        // Start of user code EntityRepository.delete
        $this->dataSource->delete($this->entityMapping, $entity);
        // End of user code
    }

    /**
     * @param CriteriaSet $criteriaSet
     * @return EntityCollection $entities
     */
    public function find(CriteriaSet $criteriaSet)
    {
        // Start of user code EntityRepository.find
        $entities = $this->dataSource->read($this->entityMapping, $criteriaSet);
        // End of user code
    
        return $entities;
    }

    /**
     * @param Entity $entity
     */
    public function persist(Entity $entity)
    {
        // Start of user code EntityRepository.persist
        $identifierAttributeMapping = $this
            ->entityMapping
            ->getIdentifierAttributeMapping()
        ;

        $identifierGetterMethodName = 'get' . $identifierAttributeMapping->getName();
        $identifierValue = $entity->$identifierGetterMethodName();
        if(is_null($identifierValue)) {
            $this->dataSource->create($this->entityMapping, $entity);
        } else {
            $this->dataSource->update($this->entityMapping, $entity);
        }
        // End of user code
    }

    /**
     * @param string $entityClassName
     * @return EntityRepository $entityRepository
     */
    public static function instantiateFromEntityClassName($entityClassName)
    {
        // Start of user code EntityRepository.instantiateFromEntityClassName
        $entityRepository = new self;
        $entityMapping = EntityMappingsRegistry::getEntityMapping($entityClassName);
        
        $entityRepository->setEntityMapping($entityMapping);
        $entityRepository->setDataSource(
            DataSourcesRegistry::getDataSource($entityMapping->getDataSourceName())
        );
        // End of user code
    
        return $entityRepository;
    }

    // Start of user code EntityRepository.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
