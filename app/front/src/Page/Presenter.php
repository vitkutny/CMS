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
		$this[Ytnuk\Web\Control::class][Ytnuk\Menu\Control::class]->setActive($this->page->menu);
	}
}
