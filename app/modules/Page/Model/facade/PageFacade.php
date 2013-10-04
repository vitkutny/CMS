<?php

namespace CMS\Page\Model;

use CMS\Model\Facade;
use CMS\Page\Model\PageRepository;
use CMS\Menu\Model\NodeFacade;
use CMS\Page\Form\PageFormContainer;

class PageFacade extends Facade {

    public $repository;
    private $nodeFacade;

    public function __construct(PageRepository $repository, NodeFacade $nodeFacade) {
        $this->repository = $repository;
        $this->nodeFacade = $nodeFacade;
    }

    public function getFormContainer($page = NULL) {
        return new PageFormContainer($page);
    }

    public function addPage(array $data) {
        $data['node']['link'] = ':Front:Page:view';
        $data['node']['link_admin'] = ':Admin:Page:Page:edit';
        $node = $this->nodeFacade->addNode($data['node'], 'front');
        $data['page']['node_id'] = $node->id;
        $page = $this->repository->insert($data['page']);
        $this->nodeFacade->editNode($node, array('link_id' => $page->id));
        return $page;
    }

    public function editPage($page, array $data) {
        $this->nodeFacade->editNode($page->node, $data['node']);
        return $this->repository->update($page, $data['page']);
    }

    public function deletePage($page) {
        if ($this->nodeFacade->deleteNode($page->node)) {
            return $this->repository->remove($page);
        }
    }

}
