<?php

namespace wor\lib\module;

interface BeforeModule
{
    public function handle($req, $res);
}