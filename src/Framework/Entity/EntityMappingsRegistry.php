<?php

namespace TiBeN\Framework\Entity;

/**
 * 
 *
 * @package Entity
 * @author TiBeN
 */
class EntityMappingsRegistry
{
    /**
     * @var AssociativeArray
     */
    private static $entityMappings;

    public function __construct()
    {
        // Start of user code EntityMappingsRegistry.constructor
        // End of user code
    }

    public function __destruct()
    {
        // Start of user code EntityMappingsRegistry.destructor
        // End of user code
    }

    /**
     * @return AssociativeArray
     */
    private static function getEntityMappings()
    {
        // Start of user code Static getter EntityMappingsRegistry.getEntityMappings
        // End of user code
        return self::$entityMappings;
    }

    /**
     * @param AssociativeArray $entityMappings
     */
    private static function setEntityMappings(AssociativeArray $entityMappings)
    {
        // Start of user code Static setter EntityMappingsRegistry.setEntityMappings
        // End of user code
        self::$entityMappings = $entityMappings;
    }

    /**
     * @param EntityMapping $entityMapping
     */
    public static function registerEntityMapping(EntityMapping $entityMapping)
    {
        // Start of user code EntityMappingsRegistry.registerEntityMapping
        // TODO should be implemented.
        // End of user code
    }

    /**
     * @param string $entityName
     * @return EntityMapping $entityMapping
     */
    public static function getEntityMapping($entityName)
    {
        // Start of user code EntityMappingsRegistry.getEntityMapping
        // TODO should be implemented.
        // End of user code
    
        return $entityMapping;
    }

    /**
     * @param string $entityName
     */
    public static function clearEntityMapping($entityName)
    {
        // Start of user code EntityMappingsRegistry.clearEntityMapping
        // TODO should be implemented.
        // End of user code
    }

    // Start of user code EntityMappingsRegistry.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
