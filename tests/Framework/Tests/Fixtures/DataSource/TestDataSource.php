<?php
/**
 * Stub datasource for testing purposes
 * @author tiben
 */
class TestDataSource implements DataSource {
    
    private $name;
    
    public function update(EntityMapping $entityMapping, Entity $entity) {
        // TODO Auto-generated method stub
    }
    public function getName() {
        return $this->name;
    }
    public function delete(EntityMapping $entityMapping, Entity $entity) {
        // TODO Auto-generated method stub
    }
    public function read(EntityMapping $entityMapping, CriteriaSet $criteriaSet) {
        // TODO Auto-generated method stub
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function create(EntityMapping $entityMapping, Entity $entity) {
        // TODO Auto-generated method stub
    }
    
	/* (non-PHPdoc)
	 * @see DataSource::getEntityMappingConfigurationClassName()
	 */
	public static function getEntityMappingConfigurationClassName() {
		return null;		
	}

	/* (non-PHPdoc)
	 * @see DataSource::getAttributeMappingConfigurationClassName()
	 */
	public static function getAttributeMappingConfigurationClassName() {
		return null;
	}

}