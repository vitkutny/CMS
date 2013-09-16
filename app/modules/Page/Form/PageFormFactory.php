<?php

namespace CMS\Page\Form;

use CMS\Form\FormFactory;
use Nette\Application\UI\Form;
use CMS\Menu\Model\NodeFacade;
use CMS\Page\Model\PageFacade;
use CMS\Menu\Form\NodeFormContainer;
use CMS\Page\Form\PageFormContainer;

final class PageFormFactory extends FormFactory {

    private $nodeFacade;
    private $pageFacade;

    public function __construct(NodeFacade $nodeFacade, PageFacade $pageFacade) {
        $this->nodeFacade = $nodeFacade;
        $this->pageFacade = $pageFacade;
    }

    protected function addForm() {
        $form = parent::addForm();
        $data = $this->nodeFacade->getParentNodeSelectData('front');
        $form['node'] = new NodeFormContainer($data);
        $form['page'] = new PageFormContainer();
        $form->addSubmit('add', 'Add page');
        return $form;
    }

    protected function editForm($page) {
        $form = parent::editForm($page);
        $data = $this->nodeFacade->getParentNodeSelectData($page->node->tree, $page->node);
        $form['node'] = new NodeFormContainer($data, $page->node);
        $form['page'] = new PageFormContainer($page);
        $form->addSubmit('edit', 'Edit page');
        if ($page->node->node_id) {
            $form->addSubmit('delete', 'Delete page')->setAttribute('class', 'btn-danger');
        }
        return $form;
    }

    public function addFormSuccess(Form $form) {
        $page = $this->pageFacade->addPage($form->getValues(TRUE));
        $this->presenter->redirect($page->node->link_admin, array('id' => $page->node->link_id));
    }

    public function editFormSuccess(Form $form, $page) {
        if ($form->isSubmitted()->getHtmlName() == 'delete') {
            $this->pageFacade->deletePage($page);
            $this->presenter->redirect('Home:view');
        } else {
            $this->pageFacade->editPage($page, $form->getValues(TRUE));
            $this->presenter->redirect('this');
        }
    }

}
