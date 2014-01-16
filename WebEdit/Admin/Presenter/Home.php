<?php

namespace WebEdit\Admin\Presenter;

use WebEdit\Admin\Presenter\Base;

final class Home extends Base {

    protected function startup() {
        parent::startup();
        $this->menu->setActive(':Admin:Home:view');
    }

}
