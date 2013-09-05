<?php

namespace CMS\Admin\Menu;

use Nette\Application\UI\Form;
use CMS\Form\FormRenderer;
use CMS\Admin\Menu\Form\NodeFormContainer;

final class NodePresenter extends BasePresenter {

    private $node;

    public function actionEdit($id) {
        $this->node = $this->nodeRepository->getNode($id);
        if (!$this->node) {
            $this->error();
        }
    }

    public function renderEdit() {
        $this->menu->breadcrumbAdd('Edit list: ' . $this->node->tree->title, ':Admin:Menu:Tree:edit', $this->node->tree_id);
        $this->menu->breadcrumbAdd('Edit node: ' . $this->node->title);
    }

    protected function createComponentNodeFormEdit() {
        $form = new Form;
        $form->setRenderer(new FormRenderer);
        $form['node'] = new NodeFormContainer($this->menu, $this->node);
        $form->addSubmit('save', 'Save');
        $form->onSuccess = $this->processNodeForm;
        return $form;
    }

    public function processNodeForm(Form $form) {
        $data = $form->getValues(TRUE);
        $this->nodeRepository->updateNode($this->node, $data['node']);
        $this->redirect('Tree:edit', array('id' => $this->node->tree_id));
    }

}
