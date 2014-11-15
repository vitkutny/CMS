<?php

namespace Admin\Menu;

use WebEdit;
use WebEdit\Database;
use WebEdit\Menu;

/**
 * Class Presenter
 *
 * @package WebEdit\Menu
 */
final class Presenter extends WebEdit\Web\Presenter
{

	/**
	 * @var Menu\Repository
	 */
	private $repository;

	/**
	 * @var Menu\Entity
	 */
	private $menu;

	/**
	 * @param Menu\Repository $repository
	 */
	public function __construct(Menu\Repository $repository)
	{
		$this->repository = $repository;
	}

	/**
	 * @param $id
	 *
	 * @throws \Nette\Application\BadRequestException
	 */
	public function actionView($id)
	{
		$this->menu = $this->repository->getById($id);
		if ( ! $this->menu) {
			$this->error();
		}
		$this['menu']->setMenu($this->menu);
	}

	public function renderView()
	{
		$this['menu'][] = 'menu.presenter.action.edit';
	}
}
