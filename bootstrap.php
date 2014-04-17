<?php

require_once __DIR__ . '/vendor/autoload.php';
$configurator = new Nette\Configurator;
//$configurator->setDebugMode(TRUE);
$configurator->enableDebugger(__DIR__ . '/log');
$configurator->setTempDirectory(__DIR__ . '/private');
$configurator->addConfig(__DIR__ . '/config.neon');

$container = $configurator->createContainer();
$application = $container->getService('application');
$application->run();
