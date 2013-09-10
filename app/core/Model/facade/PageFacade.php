<?php

namespace CMS\Model;

use CMS\Model\PageRepository;
use CMS\Model\MenuFacade;

class PageFacade extends BaseFacade {

    private $pageRepository;
    private $menuFacade;

    public function __construct(PageRepository $pageRepository, MenuFacade $menuFacade) {
        $this->pageRepository = $pageRepository;
        $this->menuFacade = $menuFacade;
    }

    public function addPage(array $data) {
        $data['node']['link'] = ':Front:Page:view';
        $data['node']['link_admin'] = ':Admin:Page:Page:edit';
        $node = $this->menuFacade->addNode($data['node']);
        $data['page']['node_id'] = $node->id;
        $page = $this->pageRepository->insertPage($data['page']);
        $this->menuFacade->editNode($node, array('link_id' => $page->id));
        return $page;
    }

    public function editPage($page, array $data) {
        $this->menuFacade->editNode($page->node, $data['node']);
        return $this->pageRepository->updatePage($page, $data['page']);
    }

    public function deletePage($page) {
        if ($this->menuFacade->deleteNode($page->node)) {
            return $this->pageRepository->removePage($page);
        }
    }

}
