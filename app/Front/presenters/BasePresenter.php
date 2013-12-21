<?php

namespace CMS\Front;

use CMS\BasePresenter as Presenter;

abstract class BasePresenter extends Presenter {

    /**
     * @inject
     * @var \CMS\Menu\Component\Menu\FrontMenuControl
     */
    public $menu;

}
