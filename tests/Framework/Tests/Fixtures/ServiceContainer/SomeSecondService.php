<?php

namespace TiBeN\Framework\Tests\Fixtures\ServiceContainer;

/**
 * Fixture class used to test the ServiceContainer
 */
class SomeSecondService
{
    
    private $firstService;

    public function __construct($firstService)
    {
        $this->firstService = $firstService;
    }

    public function getFirstService() 
    {
        return $this->firstService;
    }
} 
