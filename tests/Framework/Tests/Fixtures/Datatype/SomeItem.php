<?php

namespace TiBeN\Framework\Tests\Fixtures\Datatype;

/**
 * Lambda class used for testing Collections objects
 * 
 * @author tiben
 */
class SomeItem 
{
    public $someData;
    
    public $tempCelsius;
    
    public function __construct($someData = null)
    {
        $this->someData = $someData;
    }
}
