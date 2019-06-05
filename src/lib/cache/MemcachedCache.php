<?php

namespace wor\lib\cache;

use wor\lib\config\Configuration;
use wor\lib\container\Container;
use \Memcached;

class MemcachedCache implements Cache
{
    private $memcache;

    public function __construct(Memcached $memcached)
    {
        $this->memcache = $memcached;
        $this->memcache->addServer('127.0.0.1', 11211);
    }

    public function get($key)
    {
        return $this->memcache->get($key);
    }

    public function set($key, $value)
    {
        $this->memcache->set($key, $value);
    }

    public function __call($method, $param)
    {
        $this->memcache->$method(... $param);
    }
}
