<?php
return call_user_func(
	function () : Nette\Configurator {
		return call_user_func(
			function (Nette\Configurator $configurator) : Nette\Configurator {
				$configurator->enableDebugger(__DIR__ . '/temp');

				return $configurator;
			},
			require_once __DIR__ . '/../bootstrap.php'
		);
	}
);