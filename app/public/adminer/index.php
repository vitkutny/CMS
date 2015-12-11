<?php
global $connection;
$connection = call_user_func(
	function () : Nextras\Dbal\Connection {
		return call_user_func(
			function (Nette\Configurator $configurator) : Nextras\Dbal\Connection {
				return call_user_func(
					function (Nette\DI\Container $container) : Nextras\Dbal\Connection {
						return $container->getByType(Nextras\Dbal\Connection::class);
					},
					$configurator->createContainer()
				);
			},
			require_once __DIR__ . '/../../bootstrap.php'
		);
	}
);
$config = $connection->getConfig();
if ( ! isset($_GET['db'])) {
	$_GET['db'] = posix_getpwuid(posix_geteuid())['name'] ?? NULL;
}
if (isset($config['driver'])) {
	$_GET['username'] = $_GET[$config['driver']] = '';
}
function adminer_object()
{
	global $connection;

	return new class($connection)
		extends Adminer
	{

		/**
		 * @var Nextras\Dbal\Connection
		 */
		private $connection;

		/**
		 * @var array
		 */
		private $config = [];

		/**
		 * @var Nextras\Dbal\Bridges\NetteTracy\ConnectionPanel
		 */
		private $panel;

		public function __construct(Nextras\Dbal\Connection $connection)
		{
			$this->connection = $connection;
			$this->config = $connection->getConfig() + [
					'host' => 'localhost',
					'user' => $username = posix_getpwuid(posix_geteuid())['name'] ?? NULL,
					'password' => $username,
				];
			$this->panel = Tracy\Debugger::getBar()->getPanel(Nextras\Dbal\Bridges\NetteTracy\ConnectionPanel::class);
		}

		public function credentials()
		{
			return [
				$this->config['host'],
				$this->config['user'],
				$this->config['password'],
			];
		}

		public function selectQuery(
			$H,
			$ih
		) {
			if ($this->panel) {
				$this->panel->logQuery(
					$this->connection,
					$H,
					new class(floatval($ih))
						extends Nextras\Dbal\Result\Result
					{

						public function __construct(
							$elapsedTime
						) {
							$elapsedTimeProperty = new ReflectionProperty(
								parent::class,
								'elapsedTime'
							);
							$elapsedTimeProperty->setAccessible(TRUE);
							$elapsedTimeProperty->setValue(
								$this,
								$elapsedTime
							);
						}
					}
				);
			}

			return parent::selectQuery(
				$H,
				$ih
			);
		}
	};
}

require_once __DIR__ . '/adminer-4.2.3.php';
