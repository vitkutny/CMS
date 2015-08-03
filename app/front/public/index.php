<?php
$configurator = require_once __DIR__ . '/../bootstrap.php';
if ($configurator instanceof Nette\Configurator) {
	$container = $configurator->createContainer();
	$application = $container->getByType(Nette\Application\Application::class);
	if ($application instanceof Nette\Application\Application) {
		$application->run();
	}
}
