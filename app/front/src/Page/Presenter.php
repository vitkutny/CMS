<?php

namespace Front\Page;

use Kutny;

/**
 * Class Presenter
 *
 * @package Kutny\Page
 */
final class Presenter extends Kutny\Page\Presenter
{

	public function renderView()
	{
		$this['menu']->setActive($this->page->menu);
	}
}
