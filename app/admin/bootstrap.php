<?php
$configurator = require_once __DIR__ . '/../bootstrap.php';
if ($configurator instanceof Nette\Configurator) {
	$configurator->setDebugMode(TRUE);
	$configurator->enableDebugger(__DIR__ . '/temp');
}
return $configurator;
