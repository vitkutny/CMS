<?php
call_user_func(function () {
	call_user_func(function (Nette\Configurator $configurator) {
		if ( ! $configurator->isDebugMode()) {
			require __DIR__ . '/../index.php';
			exit;
		}
		$configurator->setDebugMode(FALSE);
		$configurator->enableDebugger();
		call_user_func(function (Nette\DI\Container $container) {
			call_user_func(function (
				Nextras\Dbal\Connection $connection,
				Nette\Http\IRequest $request,
				Nette\Http\IResponse $response
			) {
				global $adminer_config;
				$adminer_config = $connection->getConfig() + [
						'host' => 'localhost',
						'user' => $username = posix_getpwuid(posix_geteuid())['name'] ?? NULL,
						'password' => $username,
						'dbname' => $username,
					];
				$url = $request->getUrl();
				$url->setQuery([
						'username' => $adminer_config['user'],
						'db' => $adminer_config['dbname'],
						$adminer_config['driver'] => '',
					] + $query = $url->getQueryParameters());
				if ($url->getQueryParameters() !== $query) {
					$response->redirect($url);
					exit;
				}
			}, ...[
				$container->getByType(Nextras\Dbal\Connection::class),
				$container->getByType(Nette\Http\Request::class),
				$container->getByType(Nette\Http\IResponse::class),
			]);
		}, $configurator->createContainer());
	}, require __DIR__ . '/../../bootstrap.php');
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

return require __DIR__ . '/../../../vendor/dg/adminer-custom/adminer.php';
