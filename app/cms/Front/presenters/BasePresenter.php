<?php

namespace CMS\Front;

use CMS\BasePresenter as Presenter;

abstract class BasePresenter extends Presenter {

    protected function startup() {
        parent::startup();
        $this->menu->setHome('front');
    }

}
