<?php

namespace TiBeN\Framework\Tests\Fixtures\Entity;

use TiBeN\Framework\Entity\Entity;

class SomeEntity implements Entity
{

    protected $id;
    
    protected $attributeA;
    
    protected $attributeB;
    
    protected $attributeC;    
    
    public function getAttributeA() {
        return $this->attributeA;
    }
    
    public function setAttributeA($attributeA) {
        $this->attributeA = $attributeA;
        return $this;
    }
    
    public function getAttributeB() {
        return $this->attributeB;
    }
    
    public function setAttributeB($attributeB) {
        $this->attributeB = $attributeB;
        return $this;
    }
    
    public function getAttributeC() {
        return $this->attributeC;
    }
    
    public function setAttributeC($attributeC) {
        $this->attributeC = $attributeC;
        return $this;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
}
