<?php

namespace CMS\Admin\Presenter;

use CMS\Presenter;

abstract class Base extends Presenter\Base {

    /**
     * @inject
     * @var \CMS\Menu\AdminControl
     */
    public $menu;

    protected function startup() {
        parent::startup();
        $this->menu->setActive(':Admin:Home:view');
    }

}
