<?php

namespace TiBeN\Framework\Entity;

use TiBeN\Framework\Datatype\ProxyAbleGenericCollection;

// Start of user code EntityCollection.useStatements
// Place your use statements here.
// End of user code

/**
 * Collection that holds entities.
 *
 * @package TiBeN\Framework\Entity
 * @author TiBeN
 */
class EntityCollection extends ProxyAbleGenericCollection
{
    /**
     * Type of the element T
     * @var String
     */
    protected $TType;

    // Start of user code EntityCollection.surchargedConstructorsDestructors
    public function __construct()
    {
        return parent::__construct('TiBeN\\Framework\\Entity\\Entity');
    }
    // End of user code

    /**
     * T type getter
     * @var String
     */
    public function getTType()
    {
        return $this->TType;
    }

    /**
     * Emulate Templates (generics) in PHP. Check if the type of the object match
     * type specified in constructor.
     * If no type (null) if specified in the constructor, then type is not checked.
     *
     * @param string $type
     * @param <$type> $variable
     * @return boolean 
     */
    private static function typeHint($type, $variable)
    {
        if ($type == null || $variable == null) {
            return;
        }

        if (is_object($variable)) {
            $hint = is_a($variable, $type);
            $varType = get_class($variable);
        } else {
            $varType = gettype($variable);
            $hint = $varType == $type;
        }

        if (!$hint) {
            throw new \InvalidArgumentException(
                sprintf('expects parameter to be %s, %s given', $type, $varType)
            );
        }
    }


    // Start of user code EntityCollection.surchargedMethods
    // Surcharge Methods here
    // End of user code

    // Start of user code EntityCollection.implementationSpecificMethods
    // Place your implementation specific methods here
    // End of user code
}
