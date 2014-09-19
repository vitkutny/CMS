<?php

require_once __DIR__ . '/../vendor/autoload.php';

use WebEdit\Bootstrap;

$configurator = new Bootstrap\Configurator;
return $configurator->setTempDirectory(__DIR__ . '/temp')
    ->setVendorDirectory(__DIR__ . '/../vendor')
    ->createContainer();