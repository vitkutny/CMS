<?php

namespace CMS\Front;

final class HomePresenter extends BasePresenter {

    /**
     * @inject
     * @var \CMS\Model\TreeFacade
     */
    public $treeFacade;

    protected function startup() {
        parent::startup();
        $home = $this->treeFacade->getHome('front');
        $this->forward($home->link, array('id' => $home->link_id));
    }

}
