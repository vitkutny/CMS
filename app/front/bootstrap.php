<?php
/**
 * @var Ytnuk\Config\Factory $configurator
 */
$configurator = require_once __DIR__ . '/../bootstrap.php';
$configurator->setDebugMode(TRUE);
$configurator->enableDebugger(__DIR__ . '/temp');
return $configurator;
