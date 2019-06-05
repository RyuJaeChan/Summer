<?php

namespace wor\lib\lock;

class SpinLock
{
    private $memcache;

    /**
     * @param $key
     * @throws \Exception
     */
    public function lock($key)
    {
        $maxTry = 5;
        $try = 1;
        $delay = 100; //ms
        $expire = 1; //s

        while (true) {
            if ($try >= $maxTry) {
                throw new \Exception("over try count");
            }

            $lock = $this->memcache->add($key, 0, false, $expire);
            if ($lock) {
                break; // acquire lock success!!
            } else { // acquire lock false :(
                $try++;
                usleep($delay);
            }
        }
    }


    public function unlock($key)
    {
        $this->memcache->delete($key);
    }
}
