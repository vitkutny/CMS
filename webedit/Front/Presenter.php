<?php

namespace WebEdit\Front;

use WebEdit;

abstract class Presenter extends WebEdit\Presenter {

    protected function beforeRender() {
        parent::beforeRender();
        $this->template->layout = __DIR__ . '/@layout.latte';
    }

}
