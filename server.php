<?php

require_once "vendor/autoload.php";

define("__ROOT__", dirname(__FILE__));

$app = new \wor\lib\app\SummerFramework();
$app->run(
    $_SERVER["REQUEST_URI"],
    $_SERVER["REQUEST_METHOD"]
);
