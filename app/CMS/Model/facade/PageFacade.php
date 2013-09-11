<?php

namespace CMS\Model;

use CMS\Model\PageRepository;
use CMS\Model\NodeFacade;

class PageFacade extends BaseFacade {

    public $repository;
    private $nodeFacade;

    public function __construct(PageRepository $repository, NodeFacade $nodeFacade) {
        $this->repository = $repository;
        $this->nodeFacade = $nodeFacade;
    }

    public function addPage(array $data) {
        $data['node']['link'] = ':Front:Page:view';
        $data['node']['link_admin'] = ':Admin:Page:Page:edit';
        $node = $this->nodeFacade->addNode($data['node']);
        $data['page']['node_id'] = $node->id;
        $page = $this->repository->insertPage($data['page']);
        $this->nodeFacade->editNode($node, array('link_id' => $page->id));
        return $page;
    }

    public function editPage($page, array $data) {
        $this->nodeFacade->editNode($page->node, $data['node']);
        return $this->repository->updatePage($page, $data['page']);
    }

    public function deletePage($page) {
        if ($this->nodeFacade->deleteNode($page->node)) {
            return $this->repository->removePage($page);
        }
    }

}
