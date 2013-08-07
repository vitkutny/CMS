<?php

namespace CMS\Menu\Component\Menu;

use Nette\Application\UI\Control;

final class MenuControl extends Control {

    /**
     * @inject
     * @var CMS\Menu\Model\ListRepository
     */
    public $listRepository;

    /**
     * @inject
     * @var CMS\Menu\Model\NodeRepository
     */
    public $nodeRepository;
    private $current;
    private $breadcrumb = array();

    public function render($type, $style = 'navbar') {
        $list = $this->listRepository->getListByType($type);
        $template = $this->template;
        $template->type = $type;
        $template->menu = $this->nodeRepository->getMenu($list);
        $template->breadcrumb = $this->getBreadcrumb();
        $template->home = $list->node;
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

    public function getHome($type) {
        return $this->listRepository->getListByType($type)->node;
    }

    public function setCurrent($link, $link_id = NULL) {
        if (is_string($link)) {
            $this->current = $this->nodeRepository->getNodeByLink($link, $link_id);
        } else {
            $this->current = $link;
        }
    }

    public function breadcrumbAdd($title, $link = NULL, $link_id = NULL) {
        $key = md5($title . $link . $link_id);
        $this->breadcrumb[$key] = (object) array(
                    'title' => $title,
                    'link' => $link,
                    'link_id' => $link_id,
        );
    }

    public function getBreadcrumb() {
        $breadcrumb = array();
        foreach ($this->nodeRepository->getParentNodes($this->current) as $node) {
            $breadcrumb[$node->id] = $node;
        }
        $breadcrumb[$this->current->id] = $this->current;
        foreach ($this->breadcrumb as $key => $node) {
            $breadcrumb[$key] = $node;
        }
        return $breadcrumb;
    }

    public function insert($type, $title, $link, $link_id = NULL) {
        $list = $this->listRepository->getListByType($type);
        return $this->nodeRepository->addNode($list, $title, $link, $link_id);
    }

    public function update($node, $data) {
        return $this->nodeRepository->updateNode($node, $data);
    }

    public function remove($node) {
        return $this->nodeRepository->removeNode($node);
    }

}