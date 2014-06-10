<?php

namespace TiBeN\Framework\Tests\Fixtures\DataSource;

use TiBeN\Framework\DataSource\DataSource;
use TiBeN\Framework\Entity\EntityMapping;
use TiBeN\Framework\Entity\CriteriaSet;
use TiBeN\Framework\Entity\Entity;

/**
 * Stub datasource for testing purposes
 * 
 * @author TiBeN
 */
class TestDataSource implements DataSource 
{
    private $name;
    
    public function update(EntityMapping $entityMapping, Entity $entity) 
    {
        // TODO Auto-generated method stub
    }
    
    public function getName() 
    {
        return $this->name;
    }
    
    public function delete(EntityMapping $entityMapping, Entity $entity) 
    {
        // TODO Auto-generated method stub
    }

    public function read(EntityMapping $entityMapping, CriteriaSet $criteriaSet) 
    {
        // TODO Auto-generated method stub
    }
    
    public function setName($name) 
    {
        $this->name = $name;
    }

    public function create(EntityMapping $entityMapping, Entity $entity) 
    {
        // TODO Auto-generated method stub
    }
    
    public static function getEntityMappingConfigurationClassName() 
    {
        return null;        
    }

    public static function getAttributeMappingConfigurationClassName() 
    {
        return null;
    }
}
