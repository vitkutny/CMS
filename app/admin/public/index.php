<?php
/**
 * @var Ytnuk\Config\Factory $configurator
 */
$configurator = require_once __DIR__ . '/../bootstrap.php';
$container = $configurator->createContainer();
/**
 * @var Nette\Application\Application $application
 */
$application = $container->getByType(Nette\Application\Application::class);
$application->run();
