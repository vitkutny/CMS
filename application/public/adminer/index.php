<?php
call_user_func(function () {
	$container = call_user_func(function () : Nette\Di\Container {
		return call_user_func(function (Nette\Configurator $configurator) : Nette\Di\Container {
			return call_user_func(function (Nette\DI\Container $container) use
			(
				$configurator
			) : Nette\Di\Container {
				if ( ! $configurator->isDebugMode()) {
					call_user_func(function (Nette\Application\Application $application) {
						$application->run();
						exit;
					}, $container->getByType(Nette\Application\Application::class));
				}

				return $container;
			}, $configurator->createContainer());
		}, require_once __DIR__ . '/../../bootstrap.php');
	});
	call_user_func(function (Nextras\Dbal\Connection $connection) {
		global $adminer_config;
		$adminer_config = $connection->getConfig() + [
				'host' => 'localhost',
				'user' => $username = posix_getpwuid(posix_geteuid())['name'] ?? NULL,
				'password' => $username,
			];
		if ( ! isset($_GET['db'])) {
			$_GET['db'] = $username;
		}
		if (isset($adminer_config['driver'])) {
			$_GET['username'] = $_GET[$adminer_config['driver']] = '';
		}
	}, $container->getByType(Nextras\Dbal\Connection::class));
});
function adminer_object()
{
	global $adminer_config;

	return new class($adminer_config)
		extends Adminer
	{

		/**
		 * @var array
		 */
		private $config = [];

		public function __construct(array $config)
		{
			$this->config = $config;
		}

		public function credentials()
		{
			return [
				$this->config['host'],
				$this->config['user'],
				$this->config['password'],
			];
		}
	};
}

return require_once __DIR__ . '/../../../vendor/dg/adminer-custom/adminer.php';
