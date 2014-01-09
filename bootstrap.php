<?php

require_once __DIR__ . '/vendor/autoload.php';
$configurator = new Nette\Configurator;
//$configurator->setDebugMode(TRUE);
$configurator->enableDebugger(__DIR__ . '/log');
$configurator->setTempDirectory(__DIR__ . '/temp');

$configurator->extensionMethod('configLoader', function($configurator, $directory) {
    foreach (new DirectoryIterator($directory) as $node) {
        if ($node->isDir() && !$node->isDot() && file_exists($config = $node->getPathname() . '/config.neon')) {
            $configurator->addConfig($config);
        } elseif ($node->getBasename() === 'config.neon') {
            $configurator->addConfig($node->getPathname());
        }
    }
});

$configurator->configLoader(__DIR__ . '/CMS');
foreach (new DirectoryIterator(__DIR__ . '/vendor/vitkutny') as $module) {
    if ($module->isDir() && !$module->isDot()) {
        $configurator->configLoader($module->getPathname());
    }
}

$container = $configurator->createContainer();
$application = $container->getService('application');
$application->run();
