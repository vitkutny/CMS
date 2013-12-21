<?php

namespace CMS\Menu\Component\Menu;

use CMS\Menu\Component\Menu\MenuControl;

class FrontMenuControl extends MenuControl {

    public function renderSidebar($group) {
        $template = $this->sidebar($group);
        $template->setFile(__DIR__ . '/templates/sidebar.latte');
        $template->render();
    }

    public function renderBreadcrumb() {
        $template = $this->template;
        $template->breadcrumb = $this->getBreadcrumb();
        $template->setFile(__DIR__ . '/templates/breadcrumb.latte');
        $template->render();
    }

}
