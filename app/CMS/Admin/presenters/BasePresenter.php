<?php

namespace CMS\Admin;

use CMS\BasePresenter as Presenter;

abstract class BasePresenter extends Presenter {

    protected function startup() {
        parent::startup();
        $this->menu->setCurrent($this->menu->setHome('admin'));
    }

}
