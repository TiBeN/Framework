<?php
/**
 * Some Entity for testing purposes
 * @author tiben
 */
class TestEntity implements \Entity {
    
    private $id;
    
    /**
     * @var string
     */
    private $stringField;
    
    /**
     * @var int
     */    
    private $intField;
    
    /**
     * @var float
     */
    private $decimalField;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }    
    
    /**
     * @return string
     */
    public function getStringField() {
        return $this->stringField;
    }
    
    /**
     * @param string $stringField            
     */
    public function setStringField($stringField) {
        $this->stringField = $stringField;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getIntField() {
        return $this->intField;
    }
    
    /**
     * @param int $intField            
     */
    public function setIntField($intField) {
        $this->intField = $intField;
        return $this;
    }
    
    /**
     * @return float
     */
    public function getDecimalField() {
        return $this->decimalField;
    }
    
    /**
     * @param float $decimalField            
     */
    public function setDecimalField($decimalField) {
        $this->decimalField = $decimalField;
        return $this;
    }    
}