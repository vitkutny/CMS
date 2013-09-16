<?php

namespace CMS\Admin\Menu;

use CMS\Admin\BasePresenter as Presenter;

abstract class BasePresenter extends Presenter {

    protected function startup() {
        parent::startup();
        $this->menu->setActive(':Admin:Menu:Home:view');
    }

}
