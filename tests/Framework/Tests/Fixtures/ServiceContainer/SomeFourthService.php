<?php

namespace TiBeN\Framework\Tests\Fixtures\ServiceContainer;

/**
 * Fixture class used to test the ServiceContainer
 */
class SomeFourthService
{

    public $param;

    public static function createNewInstance($param) 
    {
        $instance = new self();
        $instance->param = $param;
        return $instance;
    }

    public function getParam()
    {
        return $this->param;
    }
}
