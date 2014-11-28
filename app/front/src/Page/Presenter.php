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
		$this['menu']->setActive($this->page->menu);
	}
}
