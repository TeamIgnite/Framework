<?php

function app_path($path = '') {
    return getcwd() . '/tests/Framework/Tests/app/' . $path;
}

$autoloader = require(__DIR__ . '/../vendor/autoload.php');
$autoloader->add('Framework\Tests', __DIR__);
