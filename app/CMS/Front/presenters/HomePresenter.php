<?php

namespace CMS\Front;

final class HomePresenter extends BasePresenter {

    protected function startup() {
        parent::startup();
        $this->redirect($this->menu->getHome()->link, array('id' => $this->menu->getHome()->link_id));
    }

}