<?php
return call_user_func(
	function () : Nette\Configurator {
		return call_user_func(
			function (Composer\Autoload\ClassLoader $classLoader) : Nette\Configurator {
				if ( ! ($configurator = file_exists($local = __DIR__ . '/local.php') ? require_once $local : NULL) instanceof Nette\Configurator) {
					$configurator = new Nette\Configurator;
				}
				$configurator->enableDebugger(__DIR__ . '/temp');
				$configurator->setTempDirectory(__DIR__ . '/temp');
				$configurator->addConfig(__DIR__ . '/../vendor/config.neon');
				$configurator->addConfig(__DIR__ . '/config.neon');
				if (file_exists($local = __DIR__ . '/local.neon')) {
					$configurator->addConfig($local);
				}

				return $configurator;
			},
			require_once __DIR__ . '/../vendor/autoload.php'
		);
	}
);
