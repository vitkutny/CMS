<?php

namespace CMS\Admin\Presenter;

use CMS\Admin\Presenter\Base;

final class Home extends Base {

    protected function startup() {
        parent::startup();
        $this->menu->breadcrumbAdd($this->translator->translate('cms.admin.dashboard'), 'Home:view');
    }

}
