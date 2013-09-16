<?php

namespace CMS\Admin;

use CMS\BasePresenter as Presenter;

abstract class BasePresenter extends Presenter {

    protected function beforeRender() {
        parent::beforeRender();
        $this->template->home = $this->menu->getHome('admin');
    }

}
