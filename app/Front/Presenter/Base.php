<?php

namespace CMS\Front\Presenter;

use CMS\Presenter;

abstract class Base extends Presenter\Base {

    /**
     * @inject
     * @var \CMS\Menu\FrontControl
     */
    public $menu;

}
