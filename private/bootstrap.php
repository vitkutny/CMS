<?php

require_once __DIR__ . '/../vendor/autoload.php';

use WebEdit\Bootstrap;

$configurator = new Bootstrap\Configurator;
$configurator->setTempDirectory(__DIR__ . '/temp');
$configurator->addConfig(__DIR__ . '/config.neon');
return $configurator->createContainer();
