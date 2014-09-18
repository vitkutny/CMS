<?php

require_once __DIR__ . '/../vendor/autoload.php';

use WebEdit\Bootstrap;

$configurator = new Bootstrap\Configurator();
return $configurator->setTempDirectory(__DIR__ . '/temp')
    ->addConfig(__DIR__ . '/config.neon')
    ->addConfig(__DIR__ . '/../vendor/config.json')
    ->createContainer();
