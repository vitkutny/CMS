<?php

namespace Admin\Page;

use WebEdit;
use WebEdit\Database;
use WebEdit\Page;

/**
 * Class Presenter
 *
 * @package WebEdit\Page
 */
final class Presenter extends WebEdit\Page\Presenter
{

	public function renderView()
	{
		$this['menu'][] = 'page.presenter.action.edit';
	}
}
