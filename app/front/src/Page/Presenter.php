<?php

namespace Front\Page;

use WebEdit;

/**
 * Class Presenter
 *
 * @package WebEdit\Page
 */
final class Presenter extends WebEdit\Page\Presenter
{

	public function renderView()
	{
		$this['menu']->setActive($this->page->menu);
	}
}
