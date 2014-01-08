<?php

namespace CMS\Menu;

use CMS,
    CMS\Menu\Tree,
    CMS\Menu\Node;

abstract class Control extends CMS\Control {

    private $treeFacade;
    private $nodeFacade;
    private $active;

    /**
     * @var array
     */
    protected $breadcrumb = array();
    protected $tempNodes;
    protected $tempTrees;

    public function __construct(Tree\Model\Facade $treeFacade, Node\Model\Facade $nodeFacade) {
        $this->treeFacade = $treeFacade;
        $this->nodeFacade = $nodeFacade;
    }

    protected function getMenuTemplate($group) {
        $tree = $this->treeFacade->repository->getTreeByGroup($group);
        $template = $this->template;
        $template->group = $group;
        $template->tree = $this->getTreeData($tree);
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

    protected function getBreadcrumb($onlyCustom = FALSE) {
        if ($onlyCustom) {
            return $this->breadcrumb;
        }
        $breadcrumb = $this->nodeFacade->getParentNodes($this->active);
        $breadcrumb[$this->active->id] = $this->active;
        return $breadcrumb + $this->breadcrumb;
    }

    protected function getTreeData($tree) { //TODO: refactor this shit!
        $this->tempNodes = $this->nodeFacade->repository->getAllNodes();
        $this->tempTrees = $this->treeFacade->repository->getAllTrees();
        if ($tree->group == 'front') {
            foreach ($this->tempTrees as $tempTree) {
                foreach ($this->tempNodes as $tempNode) {
                    if ($tempTree->node_id == $tempNode->node_id) {
                        unset($this->tempNodes[$tempNode->id]);
                    }
                }
            }
        }
        return $this->compileTreeData($tree->node_id);
    }

    public function compileTreeData($id) {
        $tree = array();
        foreach ($this->tempNodes as $node) {
            if ($node->node_id === $id && $node->link) {
                $tree[] = (object) array(
                            'data' => $node,
                            'children' => $this->compileTreeData($node->id),
                );
            }
        }
        return $tree;
    }

}
