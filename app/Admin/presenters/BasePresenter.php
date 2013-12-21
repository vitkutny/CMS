<?php

namespace CMS\Admin;

use CMS\BasePresenter as Presenter;

abstract class BasePresenter extends Presenter {

    /**
     * @inject
     * @var \CMS\Menu\Component\Menu\AdminMenuControl
     */
    public $menu;

}
