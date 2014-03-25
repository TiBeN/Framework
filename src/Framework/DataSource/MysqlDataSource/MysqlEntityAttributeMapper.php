<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

/**
 * 
 *
 * @package MysqlDataSource
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
     * @return int $identifier
     */
    public function getIdentifierValue()
    {
        // Start of user code MysqlEntityAttributeMapper.getIdentifierValue
        // TODO should be implemented.
        // End of user code
    
        return $identifier;
    }

    /**
     * @param string $columnName
     * @param string $value
     */
    public function setAttributeValue($columnName, $value)
    {
        // Start of user code MysqlEntityAttributeMapper.setAttributeValue
        // TODO should be implemented.
        // End of user code
    }

    /**
     * @param string $attributeName
     * @return string $columnValue
     */
    public function getColumnValue($attributeName)
    {
        // Start of user code MysqlEntityAttributeMapper.getColumnValue
        // TODO should be implemented.
        // End of user code
    
        return $columnValue;
    }

    /**
     * @return string $attributeName
     */
    public function getIdentifierAttributeName()
    {
        // Start of user code MysqlEntityAttributeMapper.getIdentifierAttributeName
        // TODO should be implemented.
        // End of user code
    
        return $attributeName;
    }

    /**
     * @param string $attributeName
     * @return string $columnName
     */
    public function getColumnName($attributeName)
    {
        // Start of user code MysqlEntityAttributeMapper.getColumnName
        // TODO should be implemented.
        // End of user code
    
        return $columnName;
    }

    /**
     * @param int $identifier
     */
    public function setIdentifier($identifier)
    {
        // Start of user code MysqlEntityAttributeMapper.setIdentifier
        // TODO should be implemented.
        // End of user code
    }

    // Start of user code MysqlEntityAttributeMapper.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
