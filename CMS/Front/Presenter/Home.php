<?php

namespace CMS\Front\Presenter;

use CMS\Front\Presenter\Base;

final class Home extends Base {

    /**
     * @inject
     * @var \CMS\Menu\Tree\Model\Facade
     */
    public $treeFacade;

    protected function startup() {
        parent::startup();
        $home = $this->treeFacade->getHomeNode('front');
        $this->forward($home->link, array('id' => $home->link_id));
    }

}
