<?php

namespace CMS\Admin\Page;

use CMS\Admin\BasePresenter as Presenter;

abstract class BasePresenter extends Presenter {

    /**
     * @inject
     * @var \CMS\Model\PageRepository
     */
    public $pageRepository;

    /**
     * @var Nette\Database\Table\Selection
     */
    protected $pages;

    protected function startup() {
        parent::startup();
        $this->menu->setActive(':Admin:Page:Home:view');
        $this->pages = $this->pageRepository->getPages();
    }

    protected function beforeRender() {
        parent::beforeRender();
        $this->template->pages = $this->pages;
    }

}