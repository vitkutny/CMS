<?php

require_once __DIR__ . '/../libs/autoload.php';
$configurator = new Nette\Configurator;
//$configurator->setDebugMode(TRUE);
$configurator->enableDebugger(__DIR__ . '/../log');
$configurator->setTempDirectory(__DIR__ . '/../temp');
$configurator->createRobotLoader()
        ->addDirectory(__DIR__)
        ->addDirectory(__DIR__ . '/../libs')
        ->register();

foreach (new DirectoryIterator(__DIR__) as $file) {
    if ($file->isDot() OR $file->getFilename() === 'cms') {
        continue;
    }
    if ($file->isDir()) {
        $configurator->addConfig(__DIR__ . '/' . $file . '/config.neon');
    }
}
$configurator->addConfig(__DIR__ . '/cms/config.neon');

$container = $configurator->createContainer();

$container->application->run();