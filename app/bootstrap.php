<?php
return call_user_func(
	function () : Nette\Configurator {
		return call_user_func(
			function (Composer\Autoload\ClassLoader $classLoader) : Nette\Configurator {
				$configurator = new Nette\Configurator;
				$configurator->setDebugMode(TRUE);
				$configurator->addConfig(__DIR__ . '/config.neon');
				$configurator->setTempDirectory(__DIR__ . '/temp');
				$configurator->enableDebugger(__DIR__ . '/temp');

				return $configurator;
			},
			require_once __DIR__ . '/../vendor/autoload.php'
		);
	}
);
