<?php
namespace Ytnuk;

use Composer;
use Nette;
use ReflectionProperty;

final class Config
{

	public static function dump(Composer\Script\Event $event)
	{
		return call_user_func(
			function (
				Nette\Configurator $configurator,
				Composer\Repository\RepositoryInterface $repository
			) {
				$extensions = [];
				foreach ($repository->getPackages() as $package) {
					$extra = $package->getExtra();
					if (isset($extra['extensions']) && is_array($extra['extensions'])) {
						$extensions += array_filter(
							array_filter(
								$extra['extensions'],
								'is_string'
							),
							function (string $class) {
								return is_subclass_of(
									$class,
									Nette\DI\CompilerExtension::class
								);
							}
						);
					}
				}
				$parameters = new ReflectionProperty(
					Nette\Configurator::class,
					'parameters'
				);
				$parameters->setAccessible(TRUE);
				$parameters = $parameters->getValue($configurator);
				file_put_contents(
					implode(
						DIRECTORY_SEPARATOR,
						[
							$parameters['tempDir'],
							'config.neon',
						]
					),
					Nette\Neon\Neon::encode(
						['extensions' => $extensions],
						Nette\Neon\Neon::BLOCK
					)
				);
			},
			require_once __DIR__ . '/../bootstrap.php',
			$event->getComposer()->getRepositoryManager()->getLocalRepository()
		);
	}
}
