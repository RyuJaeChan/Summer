<?php

namespace wor\lib\module;

class AfterPerformance implements AfterModule
{
    public function handle($req, $res)
    {
        #$res = $args[0] - $this->getTime();
        $res = 1;
        $this->printResult($res);
    }

    private function printResult($res)
    {
        var_dump($res);
    }

    private function getTime()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }
}