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

    public function render($group, $file, $directory = NULL) {
        if (!$directory) {
            $directory = __DIR__ . '/templates';
        }
        $tree = $this->treeRepository->getTreeByGroup($group);
        $template = $this->template;
        $template->group = $group;
        $template->tree = $this->treeRepository->getTreeData($tree);
        $template->breadcrumb = $this->getBreadcrumb();
        $template->home = $tree->node;
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
        $breadcrumb = $this->getBreadcrumb();
        $template = $this->template;
        $template->home = array_shift($breadcrumb);
        if (count($breadcrumb)) {
            $template->current = array_pop($breadcrumb);
        }
        $template->setFile(__DIR__ . '/templates/title.latte');
        $template->render();
    }

    public function getHomeNode($group) {
        return $this->treeRepository->getTreeByGroup($group)->node;
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

    public function getParentNodeSelectData($tree, $node = NULL) {
        if (is_string($tree)) {
            $tree = $this->treeRepository->getTreeByGroup($tree);
        }
        $data = $tree->related('node')->fetchPairs('id', 'title');
        $data[$tree->node_id] = $tree->node->title;
        if ($node) {
            unset($data[$node->id]);
            foreach ($this->nodeRepository->getIdsOfChildNodes($node) as $id) {
                unset($data[$id]);
            }
        }
        return $data;
    }

    public function insert($data) {
        $node = $this->nodeRepository->getNode($data['node_id']);
        $data['tree_id'] = $node->tree_id;
        return $this->nodeRepository->insertNode($data);
    }

    public function update($node, $data) {
        return $this->nodeRepository->updateNode($node, $data);
    }

    public function remove($node) {
        return $this->nodeRepository->removeNode($node);
    }

}