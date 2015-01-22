<?php

require_once __DIR__ . '/../vendor/autoload.php';
$configurator = new Ytnuk\Config\Factory;
$configurator->addConfig(__DIR__ . '/config.neon');
return $configurator;
