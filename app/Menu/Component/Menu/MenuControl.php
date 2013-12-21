<?php

namespace CMS\Menu\Component\Menu;

use CMS\Component\BaseControl;
use CMS\Menu\Model\TreeFacade;
use CMS\Menu\Model\NodeFacade;

abstract class MenuControl extends BaseControl {

    /**
     * @var TreeFacade
     */
    private $treeFacade;

    /**
     * @var NodeFacade
     */
    private $nodeFacade;
    private $active;
    protected $breadcrumb = array();

    public function __construct(TreeFacade $treeFacade, NodeFacade $nodeFacade) {
        $this->treeFacade = $treeFacade;
        $this->nodeFacade = $nodeFacade;
    }

    public function renderNavbar($group) {
        $tree = $this->treeFacade->repository->getTreeByGroup($group);
        $template = $this->template;
        $template->group = $group;
        $template->tree = $this->treeFacade->repository->getTreeData($tree);
        $template->breadcrumb = $this->getBreadcrumb();
        $template->home = $tree->node;
        $template->setFile(__DIR__ . '/templates/navbar.latte');
        $template->render();
    }

    protected function sidebar($group) {
        $tree = $this->treeFacade->repository->getTreeByGroup($group);
        $template = $this->template;
        $template->group = $group;
        $template->tree = $this->treeFacade->repository->getTreeData($tree);
        $template->breadcrumb = $this->getBreadcrumb();
        $template->home = $tree->node;
        return $template;
    }

    public function renderTitle() {
        $template = $this->template;
        $template->active = $this->active;
        $template->current = $this->getCurrent();
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

    private function getCurrent() {
        $breadcrumb = $this->getBreadcrumb();
        foreach ($breadcrumb as $node) {
            if ($this->presenter->isLinkCurrent($node->link, ['id' => $node->link_id])) {
                return $node;
            }
        }
        return array_pop($breadcrumb);
    }

    public function breadcrumbAdd($title, $link = NULL, $link_id = NULL) {
        $this->breadcrumb[uniqid()] = (object) array(
                    'title' => $title,
                    'link' => $link,
                    'link_id' => $link_id,
        );
    }

    protected function getBreadcrumb() {
        $breadcrumb = $this->nodeFacade->getParentNodes($this->active);
        $breadcrumb[$this->active->id] = $this->active;
        return $breadcrumb + $this->breadcrumb;
    }

}
