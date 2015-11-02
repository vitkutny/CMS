<?php
return call_user_func(
	function () : Nette\Configurator {
		return call_user_func(
			function (Composer\Autoload\ClassLoader $classLoader) : Nette\Configurator {
				$configurator = new Nette\Configurator;
				$configurator->addConfig(__DIR__ . '/config.neon');
				$configurator->setTempDirectory(__DIR__ . '/temp');
				$configurator->setDebugMode(TRUE);

				return $configurator;
			},
			require_once __DIR__ . '/../vendor/autoload.php'
		);
	}
);
