<?php

namespace CMS\Admin;

use CMS\BasePresenter as Presenter;

abstract class BasePresenter extends Presenter {

    /**
     * @inject
     * @var \CMS\Menu\Model\TreeFacade
     */
    public $treeFacade;

    protected function beforeRender() {
        parent::beforeRender();
        $this->template->home = $this->treeFacade->getHomeNode('admin');
    }

}
