<?php
return call_user_func(
	function () : Nette\Application\Application {
		return call_user_func(
			function (Nette\Configurator $configurator) : Nette\Application\Application {
				return call_user_func(
					function (Nette\DI\Container $container) : Nette\Application\Application {
						return call_user_func(
							function (Nette\Application\Application $application) : Nette\Application\Application {
								$application->run();

								return $application;
							},
							$container->getByType(Nette\Application\Application::class)
						);
					},
					$configurator->createContainer()
				);
			},
			require_once __DIR__ . '/../bootstrap.php'
		);
	}
);