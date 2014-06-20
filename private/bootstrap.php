<?php

require_once __DIR__ . '/../vendor/autoload.php';

use WebEdit\Application;

$configurator = new Application\Configurator;
$configurator->enableDebugger(__DIR__ . '/log');
$configurator->setTempDirectory(__DIR__);

$configurator->addConfig(__DIR__ . '/config.neon');
$configurator->addConfig(__DIR__ . '/../vendor/config.neon');
$configurator->addConfig(__DIR__ . '/../local/config.neon');

return $configurator->createContainer();
