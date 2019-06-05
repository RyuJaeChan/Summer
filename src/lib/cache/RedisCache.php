<?php
/**
 * Created by PhpStorm.
 * User: jcY
 * Date: 2019-05-31
 * Time: 오후 2:35
 */

namespace wor\lib\cache;


class RedisCache implements \Cache
{
    private $redis;
    public function __construct(\Redis $redis)
    {
        $this->redis = $redis;
        $this->redis->connect("127.0.0.1", 6379, 1000);
    }

    public function get($key)
    {
        $this->redis->get($key);
    }

    public function set($key, $value)
    {
        $this->redis->set($key, $value);
    }

    public function __call($name, $arguments)
    {
        $this->redis->$name(... $arguments);
    }
}
