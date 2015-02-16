<?php
/**
 * @var Ytnuk\Config\Factory $configurator
 */
$configurator = require_once __DIR__ . '/../bootstrap.php';
$configurator->enableDebugger(__DIR__ . '/temp');
$configurator->setTempDirectory(__DIR__ . '/temp');
return $configurator;
