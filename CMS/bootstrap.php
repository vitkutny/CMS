<?php

require_once __DIR__ . '/../vendor/autoload.php';
$configurator = new Nette\Configurator;
//$configurator->setDebugMode(TRUE);
$configurator->enableDebugger(__DIR__ . '/../log');
$configurator->setTempDirectory(__DIR__ . '/../temp');

$configurator->addConfig(__DIR__ . '/config.neon');

$directory = __DIR__ . '/../vendor/vitkutny';
foreach (new DirectoryIterator($directory) as $node) {
    $config = $directory . '/' . $node . '/CMS/config.neon';
    if ($node->isDir() && !$node->isDot() && file_exists($config)) {
        $configurator->addConfig($config);
    }
}

$container = $configurator->createContainer();
$application = $container->getService('application');
$application->run();
