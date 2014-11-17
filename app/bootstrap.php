<?php

require_once __DIR__ . '/../vendor/autoload.php';
$configurator = new WebEdit\Config\Factory;
$configurator->enableDebugger(__DIR__ . '/../temp');
$configurator->setTempDirectory(__DIR__ . '/../temp');
$configurator->addConfig(__DIR__ . '/config.neon');
return $configurator;
