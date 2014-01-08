<?php

namespace CMS\Menu;

use CMS\Menu\Control;

class AdminControl extends Control {

    public function renderNavbar($group) {
        $template = $this->getMenuTemplate($group);
        $template->setFile(__DIR__ . '/templates/Admin/navbar.latte');
        $template->render();
    }

    public function renderSidebar($group) {
        $template = $this->getMenuTemplate($group);
        $template->setFile(__DIR__ . '/templates/Admin/sidebar.latte');
        $template->render();
    }

    public function renderBreadcrumb() {
        $template = $this->template;
        $template->breadcrumb = $this->getBreadcrumb(TRUE);
        $template->setFile(__DIR__ . '/templates/Admin/breadcrumb.latte');
        $template->render();
    }

}
