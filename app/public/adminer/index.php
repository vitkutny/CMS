<?php
$user = posix_getpwuid(posix_geteuid());
$username = $user['name'] ?? NULL;
global $adminer_config;
$adminer_config = call_user_func(
		function () : array {
			return call_user_func(
				function (Nette\Configurator $configurator) : array {
					return call_user_func(
						function (Nette\DI\Container $container) : array {
							return call_user_func(
								function (Nextras\Dbal\Connection $connection) : array {
									return $connection->getConfig();
								},
								$container->getByType(Nextras\Dbal\Connection::class)
							);
						},
						$configurator->createContainer()
					);
				},
				require_once __DIR__ . '/../../bootstrap.php'
			);
		}
	) + [
		'host' => 'localhost',
		'user' => $username,
		'password' => $username,
	];
if ( ! isset($_GET['db'])) {
	$_GET['db'] = $username;
}
if (isset($adminer_config['driver'])) {
	$_GET['username'] = $_GET[$adminer_config['driver']] = '';
}
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

require_once __DIR__ . '/adminer-4.2.3.php';
