<?php

require_once __DIR__ . '/../vendor/autoload.php';
$configurator = new WebEdit\Config\Factory;
$configurator->enableDebugger(__DIR__ . '/../temp');
$configurator->setTempDirectory(__DIR__ . '/../temp');
$configurator->addConfig(__DIR__ . '/config.neon');
$manager = new \Fuel\Alias\Manager;
$manager->register();
$manager->aliasPattern('Admin\*', 'WebEdit\\$1');
$manager->aliasPattern('Front\*', 'WebEdit\\$1');
//TODO: webedit/alias extension
//default config
//alias:
//	prepend: TRUE
//	class: []
//	namespace: []
//	pattern: []
//let web/extension add patterns for webs
//Fuel\Alias\Manager should be registered in every app request
//implement cache $cache = new Fuel\Alias\Cache('/path/to/cache');
//delete cache while extension compile
return $configurator;
