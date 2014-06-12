<?php
    
namespace TiBeN\Framework\Tests\Fixtures\ServiceContainer;

/**
 * Fixture class to test the ServiceContainer
 */
class SomeThirdService 
{

    private $constructorData;

    public function __construct($arrayOfParams, $secondParam)
    {
        $this->constructorData = array(
            $arrayOfParams,
            $secondParam
        );
    }

    public function getConstructorData()
    {
        return $this->constructorData;
    }

    public function getSecondService()
    {
        return isset($this->constructorData[0]['service']) 
            ? $this->constructorData[0]['service']
            : null
        ;
    }
}
