<?php
return call_user_func(function () : Nette\Configurator {
	return call_user_func(function (Composer\Autoload\ClassLoader $classLoader) : Nette\Configurator {
		Tracy\Debugger::$errorTemplate = __DIR__ . '/maintenance.php';
		if ( ! ($configurator = is_file($local = __DIR__ . '/local.php') ? require_once $local : NULL) instanceof Nette\Configurator) {
			$configurator = new Nette\Configurator;
		}
		$configurator->addParameters([
			'composer' => $composer = json_decode(file_get_contents(__DIR__ . '/../composer.json'), TRUE),
		]);
		if ( ! is_dir($directory = implode(DIRECTORY_SEPARATOR, [
			sys_get_temp_dir(),
			$composer['name'],
		]))
		) {
			@mkdir($directory, 0777, TRUE);
		}
		$configurator->enableDebugger($directory);
		$configurator->setTempDirectory($directory);
		$configurator->addConfig(__DIR__ . '/../vendor/config.neon');
		$configurator->addConfig(__DIR__ . '/config.neon');
		if (is_file($local = __DIR__ . '/local.neon')) {
			$configurator->addConfig($local);
		}

		return $configurator;
	}, require_once __DIR__ . '/../vendor/autoload.php');
});
