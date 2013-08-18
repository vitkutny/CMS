<?php

require_once __DIR__ . '/../vendor/autoload.php';
$configurator = new Nette\Configurator;
//$configurator->setDebugMode(TRUE);
$configurator->enableDebugger(__DIR__ . '/../log');
$configurator->setTempDirectory(__DIR__ . '/../temp');
$configurator->createRobotLoader()
        ->addDirectory(__DIR__)
        ->addDirectory(__DIR__ . '/../vendor/others')
        ->register();

$configurator->addConfig(__DIR__ . '/core/config.neon');
foreach (new DirectoryIterator(__DIR__ . '/modules') as $file) {
    if ($file->isDot()) {
        continue;
    }
    if ($file->isDir()) {
        $configurator->addConfig(__DIR__ . "/modules/$file/config.neon");
    }
}

$container = $configurator->createContainer();
$container->application->run();