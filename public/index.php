<?php

$container = require_once __DIR__ . '/../private/bootstrap.php';
$application = $container->getService('application');
$application->run();
