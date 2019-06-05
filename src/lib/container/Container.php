<?php

namespace wor\lib\container;

use wor\lib\common\Singleton;

class Container
{
    use Singleton;

    public function __instance()
    {
        #initialize
    }

    /**
     * Instance list
     */
    private $instances = array();

    public function get(string $class)
    {
        if (isset($this->instances[$class])) {
            return $this->instances[$class];
        }

        $instance = $this->make($class);

        $this->instances[$class] = $instance;
        return $instance;
    }

    private function make(string $class)
    {
        try {
            $reflectClass = new \ReflectionClass($class);
        } catch (\ReflectionException $e) {
            throw new \Exception("Target class[$class] doesn't exist.", 0, $e);
        }

        $constructor = $reflectClass->getConstructor();

        if (is_null($constructor)) {
            return new $class;
        }

        $dependencies = $constructor->getParameters();

        $param = $this->resolveParam($dependencies);


        return $reflectClass->newInstanceArgs($param);
    }

    private function resolveParam(array $dependencies)
    {
        $res = [];

        foreach ($dependencies as $dependency) {
            $res[] = is_null($dependency->getClass())
                ? $dependency->isDefaultValueAvailable()
                    ? $dependency->getDefaultValue() : null
                : $this->get($dependency->getClass()->name);
        }

        return $res;
    }

    public function bind($abstract, $concrete = null)
    {
        #일단 냅두고...
        #$this->get($abstract);

        try {
            $reflectClass = new \ReflectionClass($abstract);
        } catch (\ReflectionException $e) {
            throw new \Exception("Target class[$abstract] doesn't exist.", 0, $e);
        }

        #throw error??
        if ($reflectClass->isInstantiable()) {
            #$this->get($abstract);
            return;
        }

        #if concrete is null, then throw error
        if (!$concrete) {
            return;
        }

        $this->instances[$abstract] = $this->make($concrete);
    }
}
