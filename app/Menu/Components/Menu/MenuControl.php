<?php

namespace CMS\Menu\Component;

use Nette\Application\UI\Control;
use CMS\Menu\Model\ListRepository;
use CMS\Menu\Model\NodeRepository;

class MenuControl extends Control {

    /**
     * @var ListRepository
     */
    private $listRepository;

    /**
     * @var NodeRepository
     */
    private $nodeRepository;
    private $current;
    private $home;
    private $breadcrumb = array();

    /**
     * 
     * @param NodeRepository $pageRepository
     */
    public function __construct(ListRepository $listRepository, NodeRepository $nodeRepository) {
        parent::__construct();
        $this->listRepository = $listRepository;
        $this->nodeRepository = $nodeRepository;
    }

    /**
     * @param string $list
     */
    public function renderNavbar($list) {
        $template = $this->template;
        $list = $this->listRepository->getListByType($list);
        $template->menu = $this->nodeRepository->getRootNode($list)->related('node');
        $template->breadcrumb = $this->getBreadcrumb();
        $template->setFile(__DIR__ . '/templates/navbar.latte');
        $template->render();
    }

    public function renderBreadcrumb() {
        $template = $this->template;
        $template->breadcrumb = $this->getBreadcrumb();
        $template->setFile(__DIR__ . '/templates/breadcrumb.latte');
        $template->render();
    }

    public function renderTitle() {
        $template = $this->template;
        $template->home = $this->home;
        if (count($this->getBreadcrumb(FALSE)) > 1) {
            $template->current = $this->current;
        }
        $template->setFile(__DIR__ . '/templates/title.latte');
        $template->render();
    }

    public function insert($list, $title, $link, $link_id = NULL) {
        $list = $this->listRepository->getListByType($list);
        return $this->nodeRepository->addNode($list, $title, $link, $link_id);
    }

    public function update($node, $data) {
        return $this->nodeRepository->updateNode($node, $data);
    }

    public function remove($node) {
        return $this->nodeRepository->removeNode($node);
    }

    public function setHome($list) {
        $this->home = $this->nodeRepository->getRootNode($this->listRepository->getListByType($list));
        return $this->home;
    }

    public function getHome() {
        return $this->home;
    }

    public function setCurrent($source, $type = NULL) {
        switch ($type) {
            case 'node':
                $this->current = $source;
                break;
            case 'link':
                $this->current = $this->nodeRepository->getNodeByLink($source);
                break;
            default:
                $this->current = $this->nodeRepository->getNode($source);
        };
    }

    public function getCurrent() {
        return $this->current;
    }

    public function breadcrumbAdd($title, $link = NULL, $link_id = NULL) {
        return $this->breadcrumb[$title] = array('title' => $title, 'link' => $link, 'link_id' => $link_id);
    }

    public function getBreadcrumb($full = TRUE) {
        if ($this->current) {
            foreach ($this->nodeRepository->getBreadcrumb($this->current) as $node) {
                $breadcrumb[$node->id] = array('title' => $node->title, 'link' => $node->link, 'link_id' => $node->link_id);
            }
        }
        if ($full) {
            foreach ($this->breadcrumb as $key => $node) {
                $breadcrumb[$key] = $node;
            }
        }
        return $breadcrumb;
    }

}