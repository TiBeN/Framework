<?php

namespace TiBeN\Framework\ServiceContainer;

use TiBeN\Framework\Datatype\AssociativeArray;

// Start of user code ServiceContainer.useStatements
// Place your use statements here.
// End of user code

/**
 * A simple parameters and services classes 
 * container enabling dependency injection.
 *
 * @package TiBeN\Framework\ServiceContainer
 * @author TiBeN
 */
class ServiceContainer
{
    /**
     * @var AssociativeArray
     */
    private static $parameters;

    /**
     * @var AssociativeArray
     */
    private static $services;

    /**
     * @return AssociativeArray
     */
    private static function getParameters()
    {
        // Start of user code Static getter ServiceContainer.getParameters
        if(is_null(self::$parameters)) {
            self::$parameters = new AssociativeArray();
        }
        // End of user code
        return self::$parameters;
    }

    /**
     * @param AssociativeArray $parameters
     */
    private static function setParameters(AssociativeArray $parameters)
    {
        // Start of user code Static setter ServiceContainer.setParameters
        // End of user code
        self::$parameters = $parameters;
    }

    /**
     * @return AssociativeArray
     */
    private static function getServices()
    {
        // Start of user code Static getter ServiceContainer.getServices
        if(is_null(self::$services)) {
            self::$services = new AssociativeArray();
        }
        // End of user code
        return self::$services;
    }

    /**
     * @param AssociativeArray $services
     */
    private static function setServices(AssociativeArray $services)
    {
        // Start of user code Static setter ServiceContainer.setServices
        // End of user code
        self::$services = $services;
    }

    /**
     * Remove a service.
     *
     * @param string $key
     */
    public static function remove($key)
    {
        // Start of user code ServiceContainer.remove
        self::getServices()->remove($key);
        // End of user code
    }

    /**
     * Return the value of a parameter
     *
     * @param string $key
     * @return string $value
     */
    public static function getParameter($key)
    {
        // Start of user code ServiceContainer.getParameter
        try {
            $value = self::getParameters()->get($key);
        } catch (\Exception $e) {
            throw new \LogicException(
                sprintf(
                    'The parameter "%s" doesn\'t exists',
                    $key
                )
            );
        }
        // End of user code
    
        return $value;
    }

    /**
     * Register a new service, it's dependencies and 
     * optionnaly the static factory method name used to 
     * instantiate the service. 
     * The dependancies will be resolved from theirs 
     * key names and passed as parameters to the factory 
     * method ( constructor is not specified).
     * If the key if preceded by a '@' then the dependancy 
     * is resolved as a service. If the key is preceded by a '%' 
     * then the dependancy is resolved as a parameter. Others 
     * cases are used as raw value.
     *
     * @param string $key
     * @param string $className
     * @param array $dependencies
     * @param string $factoryMethodName
     */
    public static function register($key, $className, array $dependencies = NULL, $factoryMethodName = NULL)
    {
        // Start of user code ServiceContainer.register
        self::getServices()
            ->set(
                $key, 
                array(
                    'class_name' => $className,
                    'dependencies' => $dependencies,
                    'factory_method_name' => $factoryMethodName
                )
            )
        ;
        // End of user code
    }

    /**
     * Unset a parameter.
     *
     * @param string $key
     */
    public static function removeParameter($key)
    {
        // Start of user code ServiceContainer.removeParameter
        self::getParameters()->remove($key);
        // End of user code
    }

    /**
     * Return a service 
     *
     * @param string $key
     * @return string $service
     */
    public static function get($key)
    {
        // Start of user code ServiceContainer.get
        try {
            $service = self::getServices()->get($key);
        } catch (\Exception $e) {
            throw new \LogicException(
                sprintf(
                    'The service "%s" doesn\'t exists',
                    $key
                )
            );
        }

        // Is not already instanciated ? instantiate it..
        if (!is_object($service)) {
            
            $className = $service['class_name'];
            $dependencies = $service['dependencies'];
            $factoryMethodName = $service['factory_method_name'];

            if (!class_exists($service['class_name'])) {
                throw new \LogicException(
                    sprintf('The class "%s" doesn\'t exists', $service['class_name'])
                );
            }

            // Register the service into the registration stack
            array_push(self::$servicesInstantiationStack, $key);

            // Resolve dependencies
            if (!empty($dependencies)) {
                array_walk_recursive($dependencies, function(&$value, $key){
                    if (is_string($value)) {
                        
                        $matches = array();
                        
                        // Is a parameter ?
                        if (preg_match('/^\%(.+)$/', $value, $matches)) {
                            $value = ServiceContainer::getParameter($matches[1]);

                        // Is a service ?    
                        } elseif (preg_match('/^\@(.+)$/', $value, $matches)) {
                            if (in_array(
                                $matches[1], 
                                ServiceContainer::$servicesInstantiationStack
                            )) {
                                throw new \LogicException(
                                    sprintf(
                                        'The service "%s" contain circular dependencies'
                                        . ' then can\'t be instanciated',
                                        $matches[1]
                                    )
                                );
                            }

                            $value = ServiceContainer::get($matches[1]);
                        }

                    }

                });
            }

            // Instanciate the service
            $serviceClassReflection = new \ReflectionClass($className);
            if (is_null($factoryMethodName)) {
                $service = $serviceClassReflection->newInstanceArgs($dependencies);
            } else {
                if (!$serviceClassReflection->hasMethod($factoryMethodName)) {
                    throw new \LogicException(
                        sprintf(
                            'The service class "%s" doesn\'t contain any factory method "%"',
                            $className,
                            $factoryMethodName
                        )
                    );
                }
                $factoryMethodReflection = $serviceClassReflection->getMethod(
                    $factoryMethodName
                );
                if (!$factoryMethodReflection->isStatic()) {
                    throw new \LogicException(
                        sprintf(
                            'The factory method "%s::%s" is not static',
                            $className,
                            $factoryMethodName
                        )
                    );
                }
                $service = $factoryMethodReflection->invokeArgs(null, $dependencies);
            }

            // Unregister the service from the instantiation stack
            // since it is now fully instantiated.
            array_pop(self::$servicesInstantiationStack);
            
            self::getServices()->set($key, $service);

        }
        // End of user code
    
        return $service;
    }

    /**
     * Determine whether the service container contain
     * a service
     * 
     *
     * @param string $key
     * @return bool $boolean
     */
    public function has($key)
    {
        // Start of user code ServiceContainer.has
        $boolean = self::getServices()->has($key);
        // End of user code
    
        return $boolean;
    }

    /**
     * Define (or redefine) the value of a parameter.
     *
     * @param string $key
     * @param string $value
     */
    public static function setParameter($key, $value)
    {
        // Start of user code ServiceContainer.setParameter
        self::getParameters()->set($key, $value);
        // End of user code
    }

    /**
     * Determine whether the service container contain
     * a parameter
     * 
     *
     * @param string $key
     * @return bool $boolean
     */
    public function hasParameter($key)
    {
        // Start of user code ServiceContainer.hasParameter
        $boolean = self::getParameters()->has($key);
        // End of user code
    
        return $boolean;
    }

    // Start of user code ServiceContainer.implementationSpecificMethods
    
    /**
     * Array stack used to prevent circular references 
     * during service dependencies instantiation
     *
     * @var GenericCollection
     */
    public static $servicesInstantiationStack = array();
    // End of user code
}
