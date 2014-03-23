<?php
class FooDataSource implements \DataSource {
    
    private $name;
    
    private $sourceFolder;    
    
    public function update(EntityMapping $entityMapping, Entity $entity) {
        // TODO Auto-generated method stub
    }
    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }    
    public function delete(EntityMapping $entityMapping, Entity $entity) {
        // TODO Auto-generated method stub
    }
    public function read(EntityMapping $entityMapping, CriteriaSet $criteriaSet) {
        // TODO Auto-generated method stub
    }
    public function create(EntityMapping $entityMapping, Entity $entity) {
        // TODO Auto-generated method stub
    }    
	public static function getEntityMappingConfigurationClassName() {
		return 'FooEntityMappingConfiguration';
	}
	public static function getAttributeMappingConfigurationClassName() {
	    return 'FooAttributeMappingConfiguration';
	}	
    
    public function getSourceFolder() {
        return $this->sourceFolder;
    }    
    
    public function setSourceFolder($sourceFolder) {
        $this->sourceFolder = $sourceFolder;
    }    
}