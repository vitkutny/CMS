<?php

namespace CMS\Front;

final class HomePresenter extends BasePresenter {

    /**
     * @inject
     * @var \CMS\Menu\Model\TreeFacade
     */
    public $treeFacade;

    protected function startup() {
        parent::startup();
        $home = $this->treeFacade->getHomeNode('front');
        $this->redirect($home->link, array('id' => $home->link_id));
    }

}
