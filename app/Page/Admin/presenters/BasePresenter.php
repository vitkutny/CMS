<?php

namespace CMS\Admin\Page;

use CMS\Admin\BasePresenter as Presenter;

abstract class BasePresenter extends Presenter {

    /**
     * @inject
     * @var \CMS\Page\Model\PageRepository
     */
    public $pageRepository;

    protected function startup() {
        parent::startup();
        $this->menu->setCurrent(':Admin:Page:Home:view', 'link');
    }

}