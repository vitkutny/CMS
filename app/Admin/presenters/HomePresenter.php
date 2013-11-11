<?php

namespace CMS\Admin;

final class HomePresenter extends BasePresenter {

    protected function startup() {
        parent::startup();
        $this->menu->setActive(':Admin:Home:view');
        $this->menu->breadcrumbAdd($this->translator->translate('admin.dashboard'), 'Home:view');
    }

}
