<?php

namespace WebEdit\Admin\Presenter;

use WebEdit\Presenter;

abstract class Base extends Presenter\Base {

    /**
     * @inject
     * @var \WebEdit\Menu\AdminControl
     */
    public $menu;

    protected function startup() {
        parent::startup();
        $this->menu->setActive(':Admin:Home:view');
    }

}
