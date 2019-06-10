<?php

namespace wor\lib\module;


class Performance
{
    private $before;
    private $after;

    public function __construct(BeforePerformance $before, AfterPerformance $after)
    {
        $this->before   = $before;
        $this->after    = $after;
    }


}