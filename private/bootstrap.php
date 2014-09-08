<?php

require_once __DIR__ . '/../vendor/autoload.php';

use WebEdit\Application;

$configurator = new Application\Configurator;
$configurator->setTempDirectory(__DIR__ . '/temp');
$configurator->enableDebugger(__DIR__ . '/temp');
$configurator->addConfig(__DIR__ . '/config.neon');
return $configurator->createContainer();
