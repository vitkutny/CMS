<?php

namespace CMS\Admin\Menu\Form;

use CMS\Form\BaseFormFactory;
use Nette\Application\UI\Form;
use CMS\Component\Menu\MenuControl;
use CMS\Model\NodeRepository;
use CMS\Admin\Menu\Form\NodeFormContainer;

final class NodeFormFactory extends BaseFormFactory {

    private $menu;
    private $nodeRepository;

    public function __construct(MenuControl $menu, NodeRepository $nodeRepository) {
        $this->menu = $menu;
        $this->nodeRepository = $nodeRepository;
    }

    protected function editForm($node) {
        $form = parent::editForm($node);
        $form['node'] = new NodeFormContainer($this->menu, $node->tree, $node);
        $form->addSubmit('save', 'Save');
        return $form;
    }

    public function editFormSuccess(Form $form, $node) {
        $data = $form->getValues(TRUE);
        $this->nodeRepository->updateNode($node, $data['node']);
        $this->presenter->redirect('this');
    }

}
