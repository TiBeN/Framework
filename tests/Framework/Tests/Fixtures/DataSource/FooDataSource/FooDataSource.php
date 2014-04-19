<?php

namespace TiBeN\Framework\Tests\Fixtures\DataSource\FooDataSource;

use TiBeN\Framework\DataSource\DataSource;
use TiBeN\Framework\Entity\EntityMapping;
use TiBeN\Framework\Entity\CriteriaSet;
use TiBeN\Framework\Entity\Entity;

/**
 * Fixture Datasource used in unit tests
 * 
 * @author TiBeN
 */
class FooDataSource implements DataSource 
{
    private $name;
    
    private $sourceFolder;    
    
    public function update(EntityMapping $entityMapping, Entity $entity) 
    {
        // TODO Auto-generated method stub
    }

    public function getName() 
    {
        return $this->name;
    }
    
    public function setName($name) 
    {
        $this->name = $name;
    }    
    
    public function delete(EntityMapping $entityMapping, Entity $entity) 
    {
        // TODO Auto-generated method stub
    }

    public function read(EntityMapping $entityMapping, CriteriaSet $criteriaSet) 
    {
        // TODO Auto-generated method stub
    }
    
    public function create(EntityMapping $entityMapping, Entity $entity) 
    {
        // TODO Auto-generated method stub
    }    

	public static function getEntityMappingConfigurationClassName() 
    {
        $namespace = 'TiBeN\\Framework\\Tests\\Fixtures\\DataSource\\FooDataSource';
		return $namespace . '\\FooEntityMappingConfiguration';
	}

	public static function getAttributeMappingConfigurationClassName() 
    {
        $namespace = 'TiBeN\\Framework\\Tests\\Fixtures\\DataSource\\FooDataSource';
	    return $namespace . '\\FooAttributeMappingConfiguration';
	}	
    
    public function getSourceFolder() 
    {
        return $this->sourceFolder;
    }    
    
    public function setSourceFolder($sourceFolder) 
    {
        $this->sourceFolder = $sourceFolder;
    }    
}
