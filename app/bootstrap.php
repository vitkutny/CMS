<?php
return call_user_func(
	function () : Nette\Configurator {
		return call_user_func(
			function (Composer\Autoload\ClassLoader $classLoader) : Nette\Configurator {
				$configurator = new Nette\Configurator;
				$configurator->setDebugMode('ytnuk@172.28.128.1');
				$configurator->enableDebugger(__DIR__ . '/temp');
				$configurator->setTempDirectory(__DIR__ . '/temp');
				$configurator->addConfig(__DIR__ . '/../vendor/config.neon');
				$configurator->addConfig(__DIR__ . '/config.neon');

				return $configurator;
			},
			require_once __DIR__ . '/../vendor/autoload.php'
		);
	}
);
