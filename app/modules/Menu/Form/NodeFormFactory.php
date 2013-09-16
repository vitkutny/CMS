<?php

namespace CMS\Menu\Form;

use Nette\Application\UI\Form;
use CMS\Form\FormFactory;
use CMS\Menu\Model\NodeFacade;
use CMS\Menu\Form\NodeFormContainer;

final class NodeFormFactory extends FormFactory {

    private $nodeFacade;

    public function __construct(NodeFacade $nodeFacade) {
        $this->nodeFacade = $nodeFacade;
    }

    protected function editForm($node) {
        $form = parent::editForm($node);
        $data = $this->nodeFacade->getParentNodeSelectData($node->tree, $node);
        $form['node'] = new NodeFormContainer($data, $node);
        $form->addSubmit('save', 'Save');
        return $form;
    }

    public function editFormSuccess(Form $form, $node) {
        $data = $form->getValues(TRUE);
        $this->nodeFacade->editNode($node, $data['node']);
        $this->presenter->redirect('this');
    }

}
