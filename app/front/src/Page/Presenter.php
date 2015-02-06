<?php

namespace Front\Page;

use Ytnuk;

/**
 * Class Presenter
 *
 * @package Ytnuk\Page
 */
final class Presenter extends Ytnuk\Page\Presenter
{

	public function renderView()
	{
		//TODO: this method should be in admin as preview, current admin renderView should be renderEdit
		$this[Ytnuk\Web\Control::class][Ytnuk\Menu\Control::class]->setActive($this->page->menu);
	}
}
