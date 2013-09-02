<?php

namespace CMS\Front;

final class HomePresenter extends BasePresenter {

    protected function startup() {
        parent::startup();
        $home = $this->menu->getHomeNode('front');
        $this->redirect($home->link, array('id' => $home->link_id));
    }

}