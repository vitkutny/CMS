<?php

namespace CMS\Menu\Component\Menu;

use CMS\Menu\Component\Menu\MenuControl;

class AdminMenuControl extends MenuControl {

    public function renderSidebar($group) {
        $template = $this->sidebar($group);
        $template->setFile(__DIR__ . '/templates/sidebar_admin.latte');
        $template->render();
    }

    public function renderBreadcrumb() {
        $template = $this->template;
        $template->breadcrumb = $this->breadcrumb;
        $template->setFile(__DIR__ . '/templates/breadcrumb_admin.latte');
        $template->render();
    }

}
