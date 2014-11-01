<?php

require_once __DIR__ . '/../vendor/autoload.php';
use WebEdit\Config;

$configurator = new Config\Factory;
$configurator->enableDebugger(__DIR__ . '/temp');
return $configurator->setTempDirectory(__DIR__ . '/temp')
	->addConfig(__DIR__ . '/config.neon')
	->createContainer();