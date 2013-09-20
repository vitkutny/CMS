<?php

namespace CMS\Page\Form;

use CMS\Form\FormFactory;
use CMS\Menu\Model\NodeFacade;
use CMS\Page\Model\PageFacade;

final class PageFormFactory extends FormFactory {

    private $nodeFacade;
    private $pageFacade;

    public function __construct(NodeFacade $nodeFacade, PageFacade $pageFacade) {
        $this->nodeFacade = $nodeFacade;
        $this->pageFacade = $pageFacade;
    }

    protected function addForm() {
        $this->form->addComponent($this->nodeFacade->getFormContainer('front'), 'node');
        $this->form->addComponent($this->pageFacade->getFormContainer(), 'page');
        parent::addForm();
    }

    protected function editForm($page) {
        $this->form->addComponent($this->nodeFacade->getFormContainer($page->node->tree, $page->node), 'node');
        $this->form->addComponent($this->pageFacade->getFormContainer($page), 'page');
        parent::editForm($page);
        if ($page->node->node_id) {
            $this->deleteForm($page);
        }
    }

    protected function add($data) {
        $page = $this->pageFacade->addPage($data);
        $this->presenter->redirect($page->node->link_admin, array('id' => $page->node->link_id));
    }

    protected function edit($page, $data) {
        $this->pageFacade->editPage($page, $data);
        $this->presenter->redirect('this');
    }

    protected function delete($page) {
        $this->pageFacade->deletePage($page);
        $this->presenter->redirect('Home:view');
    }

}
