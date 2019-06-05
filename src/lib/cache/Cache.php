<?php

namespace wor\lib\cache;

/**
 * Interface Cache
 * - 캐시 시스템 인터페이스
 *
 * @package wor\lib\cache
 */
interface Cache
{
    public function get($key);
    public function set($key, $value);
}
