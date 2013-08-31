<?php

namespace CMS\Component\Menu;

use CMS\Component\BaseControl;
use CMS\Model\TreeRepository;
use CMS\Model\NodeRepository;

final class MenuControl extends BaseControl {

    /**
     * @var TreeRepository
     */
    private $treeRepository;

    /**
     * @var NodeRepository
     */
    private $nodeRepository;
    private $active;
    private $breadcrumb = array();

    public function __construct(TreeRepository $treeRepository, NodeRepository $nodeRepository) {
        $this->treeRepository = $treeRepository;
        $this->nodeRepository = $nodeRepository;
    }

    public function render($type, $style = 'list') {
        $tree = $this->treeRepository->getTreeByType($type);
        $template = $this->template;
        $template->type = $type;
        $template->tree = $this->treeRepository->getTreeData($tree);
        $template->breadcrumb = $this->getBreadcrumb();
        $template->home = $tree->node;
        $template->setFile(__DIR__ . "/templates/$style.latte");
        $template->render();
    }

    public function renderBreadcrumb() {
        $template = $this->template;
        $template->breadcrumb = $this->getBreadcrumb();
        $template->setFile(__DIR__ . '/templates/breadcrumb.latte');
        $template->render();
    }

    public function renderTitle() {
        $breadcrumb = $this->getBreadcrumb();
        $template = $this->template;
        $template->home = array_shift($breadcrumb);
        if (count($breadcrumb)) {
            $template->current = array_pop($breadcrumb);
        }
        $template->setFile(__DIR__ . '/templates/title.latte');
        $template->render();
    }

    public function getRootNode($type) {
        return $this->treeRepository->getTreeByType($type)->node;
    }

    public function setActive($link, $link_id = NULL) {
        if (is_string($link)) {
            $this->active = $this->nodeRepository->getNodeByLink($link, $link_id);
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

    public function getBreadcrumb() {
        $breadcrumb = array();
        foreach ($this->nodeRepository->getParentNodes($this->active) as $node) {
            $breadcrumb[$node->id] = $node;
        }
        $breadcrumb[$this->active->id] = $this->active;
        foreach ($this->breadcrumb as $key => $node) {
            $breadcrumb[$key] = $node;
        }
        return $breadcrumb;
    }

    public function insert($title, $link, $link_id = NULL, $type = 'front') {
        $list = $this->treeRepository->getTreeByType($type);
        return $this->nodeRepository->insertNode($list, $title, $link, $link_id);
    }

    public function update($node, $data) {
        return $this->nodeRepository->updateNode($node, $data);
    }

    public function remove($node) {
        return $this->nodeRepository->removeNode($node);
    }

}