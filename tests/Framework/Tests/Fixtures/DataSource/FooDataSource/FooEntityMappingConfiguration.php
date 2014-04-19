<?php

namespace TiBeN\Framework\Tests\Fixtures\DataSource\FooDataSource;

use TiBeN\Framework\Entity\DataSourceEntityMappingConfiguration;
use TiBeN\Framework\Datatype\AssociativeArray;

/**
 * EntityMappingConfiguration for the FooDataSource
 *
 * @author TiBeN
 */
class FooEntityMappingConfiguration implements DataSourceEntityMappingConfiguration 
{
    private $file;
    
    public static function create(AssociativeArray $config) 
    {
        $fooEntityMapping = new self;        
        $fooEntityMapping->setFile($config->get('file'));
        return $fooEntityMapping;
    }
    
    public function getFile() 
    {
        return $this->someFile;
    }
    
    public function setFile($file) 
    {
        $this->file = $file;
        return $this;
    }
}
