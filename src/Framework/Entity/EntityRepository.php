<?php

namespace TiBeN\Framework\Entity;

use TiBeN\Framework\DataSource\DataSourcesRegistry;
use TiBeN\Framework\DataSource\DataSource;

// Start of user code EntityRepository.useStatements
// Place your use statements here.
// End of user code

/**
 * Service which allow entity fetching and persistance.  
 * 
 * The entity repository acts as an abstract layer of 
 * datasources which allow datasource agnostic entity manipulation.
 * 
 * Despite the fact that this class can be instanciated, it is
 * recommended to extend this class and put your custom domain
 *  entity manipulation logic into. 
 *
 * @package TiBeN\Framework\Entity
 * @author TiBeN
 */
class EntityRepository
{
    /**
     * @var DataSource
     */
    public $dataSource;

    /**
     * @var EntityMapping
     */
    public $entityMapping;

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
     * Persist the state of an entity to its datasource.
     *
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
     * Factory method that instanciate an
     * entity factory from an entity classname.
     * 
     *
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

    /**
     * Fetch entities from datasource that matches some criteria 
     * set.
     *
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
     * Delete an entity from its datasource.
     *
     * @param Entity $entity
     */
    public function delete(Entity $entity)
    {
        // Start of user code EntityRepository.delete
        $this->dataSource->delete($this->entityMapping, $entity);
        // End of user code
    }

    // Start of user code EntityRepository.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
