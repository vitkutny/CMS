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

$configurator->addConfig(__DIR__ . '/config.neon');
foreach (new DirectoryIterator(__DIR__ . '/../vendor/vitkutny') as $file) {
    if ($file->isDot()) {
        continue;
    }
    if ($file->isDir()) {
        $configurator->addConfig(__DIR__ . "/../vendor/vitkutny/$file/CMS/config.neon");
    }
}

$container = $configurator->createContainer();
$application = $container->getService('application');
$application->run();
