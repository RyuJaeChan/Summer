<?php

namespace wor\lib\performance;

class PerformanceMeasurer
{
    private $startTime;
    private $endTime;

    public function start()
    {
        $this->startTime = $this->getTime();
    }

    public function end()
    {
        $this->endTime = $this->getTime();
    }

    public function result()
    {
        return $this->endTime - $this->startTime;
    }

    private function getTime()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }
}
