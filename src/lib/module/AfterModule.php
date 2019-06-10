<?php

namespace wor\lib\module;

interface AfterModule
{
    public function handle($req, $res);
}