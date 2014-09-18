<?php

$container = require_once __DIR__ . '/../private/bootstrap.php';
$container->getService('application')->run();
