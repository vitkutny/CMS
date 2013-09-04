<?php

namespace CMS\Admin\Page;

use CMS\Admin\BasePresenter as Presenter;

abstract class BasePresenter extends Presenter {

    /**
     * @inject
     * @var \CMS\Model\PageRepository
     */
    public $pageRepository;

    protected function startup() {
        parent::startup();
        $this->menu->setActive(':Admin:Page:Home:view');
    }

}