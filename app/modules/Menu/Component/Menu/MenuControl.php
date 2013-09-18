<?php

namespace CMS\Menu\Component\Menu;

use CMS\Component\BaseControl;
use CMS\Menu\Model\TreeFacade;
use CMS\Menu\Model\NodeFacade;

final class MenuControl extends BaseControl {

    /**
     * @var TreeFacade
     */
    private $treeFacade;

    /**
     * @var NodeFacade
     */
    private $nodeFacade;
    private $active;
    private $breadcrumb = array();

    public function __construct(TreeFacade $treeFacade, NodeFacade $nodeFacade) {
        $this->treeFacade = $treeFacade;
        $this->nodeFacade = $nodeFacade;
    }

    public function render($group, $file, $directory = NULL) {
        if (!$directory) {
            $directory = __DIR__ . '/templates';
        }
        $tree = $this->treeFacade->repository->getTreeByGroup($group);
        $template = $this->template;
        $template->group = $group;
        $template->tree = $this->treeFacade->repository->getTreeData($tree);
        $template->breadcrumb = $this->getBreadcrumb();
        $template->home = $tree->node;
        $template->active = $this->active;
        $template->setFile($directory . '/' . $file . '.latte');
        $template->render();
    }

    public function renderNavbar($group) {
        $this->render($group, 'navbar');
    }

    public function renderSidebar($group) {
        $this->render($group, 'sidebar');
    }

    public function renderUl($group) {
        $this->render($group, 'ul');
    }

    public function renderOl($group) {
        $this->render($group, 'ol');
    }

    public function renderAdmin($group) {
        $this->render($group, 'admin');
    }

    public function renderBreadcrumb() {
        $template = $this->template;
        $template->breadcrumb = $this->getBreadcrumb();
        $template->setFile(__DIR__ . '/templates/breadcrumb.latte');
        $template->render();
    }

    public function renderTitle() {
        $template = $this->template;
        $template->home = 'KissCMS';
        $breadcrumb = $this->getBreadcrumb();
        $template->current = array_pop($breadcrumb);
        $template->setFile(__DIR__ . '/templates/title.latte');
        $template->render();
    }

    public function setActive($link, $link_id = NULL) {
        if (is_string($link)) {
            $this->active = $this->nodeFacade->repository->getNodeByLink($link, $link_id);
        } else {
            $this->active = $link;
        }
    }

    public function breadcrumbAdd($title, $link = NULL, $link_id = NULL) {
        $this->breadcrumb[uniqid()] = (object) array(
                    'title' => $title,
                    'link' => $link,
                    'link_id' => $link_id,
        );
    }

    private function getBreadcrumb() {
        $breadcrumb = $this->nodeFacade->getParentNodes($this->active);
        $breadcrumb[$this->active->id] = $this->active;
        return $breadcrumb + $this->breadcrumb;
    }

}
