<?php

namespace TiBeN\Framework\Entity;

use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code EntityMappingsRegistry.useStatements
// Place your use statements here.
// End of user code

/**
 * Holds the instanciated EntityMappings
 *
 * @package TiBeN\Framework\Entity
 * @author TiBeN
 */
class EntityMappingsRegistry
{
    /**
     * @var AssociativeArray
     */
    private static $entityMappings;

    /**
     * @return AssociativeArray
     */
    private static function getEntityMappings()
    {
        // Start of user code Static getter EntityMappingsRegistry.getEntityMappings
        if(!isset(self::$entityMappings)) {
            self::$entityMappings = new AssociativeArray(
                'TiBeN\\Framework\\Entity\\EntityMapping'
            );
        }       
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
     * Remove all registered EntityMappings.
     *
     * @param string $entityName
     */
    public static function clearEntityMapping($entityName)
    {
        // Start of user code EntityMappingsRegistry.clearEntityMapping
        if (!self::getEntityMappings()->has($entityName)) {
            throw new \InvalidArgumentException(
                sprintf('No entity mapping for entity "%s"', $entityName)
            );
        }
        self::getEntityMappings()->remove($entityName);
        // End of user code
    }

    /**
     * Get an EntityMapping of an Entity class from
     * its class name.
     *
     * @param string $entityName
     * @return EntityMapping $entityMapping
     */
    public static function getEntityMapping($entityName)
    {
        // Start of user code EntityMappingsRegistry.getEntityMapping
        if(!self::getEntityMappings()->has($entityName)) {
            throw new \InvalidArgumentException(
                sprintf('No entity mapping for entity "%s"', $entityName)
            );
        }
        $entityMapping = self::getEntityMappings()->get($entityName);
        // End of user code
    
        return $entityMapping;
    }

    /**
     * Set an EntityMapping in the Registry.
     *
     * @param EntityMapping $entityMapping
     */
    public static function registerEntityMapping(EntityMapping $entityMapping)
    {
        // Start of user code EntityMappingsRegistry.registerEntityMapping
        $entityName = $entityMapping->getEntityName();
        if (empty($entityName)) {
            throw new \InvalidArgumentException(
                'The entity mapping is not associated to any entity'
            );
        }
        if (!class_exists($entityName)) {
            throw new \InvalidArgumentException(
                sprintf('The entity "%s" is unknown', $entityName)
            );
        }
        self::getEntityMappings()->set($entityName, $entityMapping);
        // End of user code
    }

    // Start of user code EntityMappingsRegistry.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
