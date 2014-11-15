<?php

$configurator = require_once __DIR__ . '/../bootstrap.php';
$container = $configurator->createContainer();
$application = $container->getService('application');
$application->run();
