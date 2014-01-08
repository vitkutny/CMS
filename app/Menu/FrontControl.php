<?php

namespace CMS\Menu;

use CMS\Menu\Control;

class FrontControl extends Control {

    public function renderNavbar($group) {
        $template = $this->getMenuTemplate($group);
        $template->setFile(__DIR__ . '/templates/Front/navbar.latte');
        $template->render();
    }

    public function renderSidebar($group) {
        $template = $this->getMenuTemplate($group);
        $template->setFile(__DIR__ . '/templates/Front/sidebar.latte');
        $template->render();
    }

    public function renderBreadcrumb() {
        $template = $this->template;
        $template->breadcrumb = $this->getBreadcrumb();
        $template->setFile(__DIR__ . '/templates/Front/breadcrumb.latte');
        $template->render();
    }

}
