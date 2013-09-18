<?php

namespace CMS\Menu\Form;

use CMS\Form\FormFactory;
use CMS\Menu\Model\NodeFacade;

final class NodeFormFactory extends FormFactory {

    private $nodeFacade;

    public function __construct(NodeFacade $nodeFacade) {
        $this->nodeFacade = $nodeFacade;
    }

    protected function editForm($node) {
        $this->form->addComponent($this->nodeFacade->getFormContainer($node->tree, $node), 'node');
        $this->form->addSubmit('save', 'Save');
    }

    protected function edit($node, $data) {
        $this->nodeFacade->editNode($node, $data['node']);
        $this->presenter->redirect('this');
    }

}
