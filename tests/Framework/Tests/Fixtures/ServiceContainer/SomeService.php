<?php

namespace TiBeN\Framework\Tests\Fixtures\ServiceContainer;

/**
 * Fixture class used to test the ServiceContainer
 */
class SomeService
{

    private $param;

    public function __construct($param) 
    {
        $this->param = $param;
    }

    public function getParam()
    {
        return $this->param;
    }
}
