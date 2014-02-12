<?php

namespace WebEdit\Front;

use WebEdit;

abstract class Presenter extends WebEdit\Presenter {

    /**
     * @inject
     * @var \WebEdit\Menu\Control\Factory
     */
    public $menuFactory;

    protected function beforeRender() {
        parent::beforeRender();
        $this->template->layout = __DIR__ . '/@layout.latte';
    }

    protected function createComponentMenu() {
        return $this->menuFactory->create('front');
    }

}
