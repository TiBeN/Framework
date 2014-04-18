<?php

namespace TiBeN\Framework\DataSource\MysqlDataSource;

use TiBeN\Framework\Datatype\Converter;

/**
 * PdoRowContainer to Row Converter.
 * @author tiben
 */
class PdoRowContainerToRowConverter implements Converter 
{
    private $TType = 'TiBeN\\Framework\\DataSource\\MysqlDataSource\\PdoRowContainer';
    
    private $UType = 'TiBeN\\Framework\\DataSource\\MysqlDataSource\\Row';	
    
    /**
     * Emulate Templates (generics) in PHP. Check if the type of the object match
     * type specified in constructor.
     * If no type (null) if specified in the constructor, then type is not checked.
     */
    private static function checkType($type, $variable) 
    {
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
	
	public function reverse($itemToConvert) 
    {
		$this->checkType($this->UType, $itemToConvert);	    
		return PdoRowContainer::createFromRawPdoRow($itemToConvert->toNativeArray());
	}			 

	public function getUType() 
    {
		return $this->UType;
	}

	public function getTType() 
    {
		return $this->TType;
	}

	public function convert($itemToConvert) 
    {
		$this->checkType($this->TType, $itemToConvert);
		$row = new Row('string');
		foreach($itemToConvert->toNativeArray() as $key => $value) {
			$row->set($key, $value);
		}
		return $row;
	}
}
