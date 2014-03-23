<?php
class FooEntityMappingConfiguration implements \DataSourceEntityMappingConfiguration {
    
    private $file;
    
    public static function create(AssociativeArray $config) {
        $fooEntityMapping = new self;        
        $fooEntityMapping->setFile($config->get('file'));
        return $fooEntityMapping;
    }
    
    public function getFile() {
        return $this->someFile;
    }
    
    public function setFile($file) {
        $this->file = $file;
        return $this;
    }
	
    
}