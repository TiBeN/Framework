<?php

namespace TiBeN\Framework\Tests\Fixtures\Datatype;

use TiBeN\Framework\Datatype\Converter;

/**
 * Some Fixture Converter for testing ProxyAbleGenericCollection
 */
class SomeItemToSomeOtherItemConverter implements Converter 
{
    
    private $TType = 'TiBeN\\Framework\\Tests\\Fixtures\\Datatype\\SomeItem';
    
    private $UType = 'TiBeN\\Framework\\Tests\\Fixtures\\Datatype\\SomeOtherItem';
    
    public function getUType() {
        return $this->UType;
    }
    
    public function getTType() {
        return $this->TType;
    }    
    
    /**
     * Emulate Templates (generics) in PHP. Check if the type of the object match
     * type specified in constructor.
     * If no type (null) if specified in the constructor, then type is not checked.
     */
    private static function checkType($type, $variable) {
    
        if($type == NULL) {
            return;
        }
    
        $varType = is_object($variable)
            ? get_class($variable)
            : gettype($variable)
        ;
    
        if($varType != $type) {
            throw new \InvalidArgumentException(sprintf('expects parameter to be %s, %s given', $type, $varType));
        }
    }    
         
    /* (non-PHPdoc)
     * @see CollectionItemConverter::convertFromProxyToSource()
     */
    public function reverse($itemToConvert) {
        
        $this->checkType($this->UType, $itemToConvert);     
        
        $convertedItem = new SomeItem();
        $convertedItem->someData = $itemToConvert->someData;
        if(isset($itemToConvert->tempFarenheit)) {
            $convertedItem->tempCelsius = ($itemToConvert->tempFarenheit - 32)/1.8; //(T(°F) - 32)/1,8
        }
        return $convertedItem;      
    }
    
    public function convert($itemToReverse) {
        
        $this->checkType($this->TType, $itemToReverse);
        
        $reversedItem = new SomeOtherItem();
        $reversedItem->someData = $itemToReverse->someData;
        if(isset($itemToReverse->tempCelsius)) {
            $reversedItem->tempFarenheit = $itemToReverse->tempCelsius * 1.8 + 32; //T(°C)×1,8 + 32
        }
        return $reversedItem;   
    }

}   
