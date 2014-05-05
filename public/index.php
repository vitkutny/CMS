<?php

$container = require_once __DIR__ . '/../bootstrap.php';
$application = $container->getService('application');
$application->run();
