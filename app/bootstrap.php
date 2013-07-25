<?php

require __DIR__ . '/../libs/autoload.php';
$configurator = new Nette\Configurator;
//$configurator->setDebugMode(FALSE);
$configurator->enableDebugger(__DIR__ . '/../log');
$configurator->setTempDirectory(__DIR__ . '/../temp');
$configurator->createRobotLoader()
        ->addDirectory(__DIR__)
        ->addDirectory(__DIR__ . '/../libs')
        ->register();
foreach (new DirectoryIterator(__DIR__) as $file){
if($file->isDot() OR $file->getFilename()==='CMS') continue;
if($file->isDir())
$configurator->addConfig(__DIR__ . '/'.$file . '/config.neon');
}
$configurator->addConfig(__DIR__ . '/CMS/config.neon');
$container = $configurator->createContainer();

return $container;
