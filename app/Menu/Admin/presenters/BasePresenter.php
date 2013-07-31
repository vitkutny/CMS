<?php

namespace CMS\Admin\Menu;

use CMS\Admin\BasePresenter as Presenter;

abstract class BasePresenter extends Presenter {

    /**
     * @inject
     * @var CMS\Menu\Model\NodeRepository
     */
    public $nodeRepository;

    /**
     * @inject
     * @var CMS\Menu\Model\ListRepository
     */
    public $listRepository;

    protected function startup() {
        parent::startup();
        $this->menu->setCurrent(':Admin:Menu:Home:view', 'link');
    }

}