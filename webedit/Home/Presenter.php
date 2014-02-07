<?php

namespace WebEdit\Home;

use WebEdit\Front;

final class Presenter extends Front\Presenter {

    /**
     * @inject
     * @var \WebEdit\Shop\Product\Control\Factory
     */
    public $productControlFactory;

    public function renderView() {
        $this->menu->showHeader(FALSE);
    }

    protected function createComponentProduct() {
        return $this->productControlFactory->create();
    }

}
