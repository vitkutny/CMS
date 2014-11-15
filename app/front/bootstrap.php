<?php

$configurator = require_once __DIR__ . '/../bootstrap.php';
$configurator->addConfig(__DIR__ . '/config.neon');
return $configurator;
