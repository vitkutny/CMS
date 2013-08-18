<?php

namespace CMS\Admin\Menu;

use CMS\Admin\BasePresenter as Presenter;

abstract class BasePresenter extends Presenter {

    /**
     * @inject
     * @var \CMS\Model\NodeRepository
     */
    public $nodeRepository;

    /**
     * @inject
     * @var \CMS\Model\ListRepository
     */
    public $listRepository;

    protected function startup() {
        parent::startup();
        $this->menu->setActive(':Admin:Menu:Home:view');
    }

}