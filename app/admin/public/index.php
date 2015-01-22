<?php

$configurator = require_once __DIR__ . '/../bootstrap.php';
use Nette;

$container = $configurator->createContainer();
$application = $container->getByType(Nette\Application\Application::class);
$application->run();
