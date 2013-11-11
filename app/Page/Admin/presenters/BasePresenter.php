<?php

namespace CMS\Admin\Page;

use CMS\Admin\BasePresenter as Presenter;

abstract class BasePresenter extends Presenter {

    protected function startup() {
        parent::startup();
        $this->menu->setActive(':Admin:Page:Home:view');
        $this->menu->breadcrumbAdd(
                $this->translator->translate('page.admin.overview'), 'Home:view');
    }

}
