<?php

namespace WebEdit\Front\Presenter;

use WebEdit\Presenter;

abstract class Base extends Presenter\Base {

    /**
     * @inject
     * @var \WebEdit\Menu\FrontControl
     */
    public $menu;

}
