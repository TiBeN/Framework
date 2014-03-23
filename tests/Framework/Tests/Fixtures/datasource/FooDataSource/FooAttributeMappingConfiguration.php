<?php
/**
 * DataSourceAttributeConfiguration for the Dummy DataSource 
 * used to test entity layer
 */
class FooAttributeMappingConfiguration implements DataSourceAttributeMappingConfiguration
{
    public $field;  
    
	public static function create(AssociativeArray $config) {
	    $famc = new self;	      
        $famc->setField($config->get('field'));
        return $famc;        	   
	}
	
    public function getField() {
        return $this->field;
    }
    public function setField($field) {
        $this->field = $field;
        return $this;
    }
	

}