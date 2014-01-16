<?php

namespace WebEdit\Front\Presenter;

use WebEdit\Front\Presenter\Base;

final class Home extends Base {

    /**
     * @inject
     * @var \WebEdit\Menu\Tree\Model\Facade
     */
    public $treeFacade;

    protected function startup() {
        parent::startup();
        $home = $this->treeFacade->getHomeNode('front');
        $this->forward($home->link, array('id' => $home->link_id));
    }

}
