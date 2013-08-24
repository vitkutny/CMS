<?php

namespace CMS\Admin\Menu;

use Nette\Application\UI\Form;
use CMS\Component\Form\FormRenderer;

final class NodePresenter extends BasePresenter {

    private $node;

    public function actionEdit($id) {
        $this->node = $this->nodeRepository->getNode($id);
        if (!$this->node) {
            $this->error();
        }
    }

    public function renderEdit() {
        $this->menu->breadcrumbAdd('Edit list: ' . $this->node->tree->title, ':Admin:Menu:List:edit', $this->node->tree->id);
        $this->menu->breadcrumbAdd('Edit node: ' . $this->node->title);
    }

    protected function createComponentNodeEditForm() {
        $form = new Form;
        $form->setRenderer(new FormRenderer);
        $form->addText('title', 'Title')->setRequired();
        if ($this->node->node) {
            $form->addSelect('node_id', 'Parent node', $this->nodeRepository->getParentNodeSelectData($this->node))->setRequired();
        }
        $form->addText('position', 'Position number')->addRule(Form::INTEGER)->setType('number')->setRequired();
        $form->setDefaults($this->node->getRowData());
        $form->addSubmit('save', 'Save');
        $form->onSuccess = $this->nodeEditFormSuccess;
        return $form;
    }

    public function nodeEditFormSuccess(Form $form) {
        $data = $form->getValues(TRUE);
        $this->nodeRepository->updateNode($this->node, $data);
        $this->redirect('List:edit', array('id' => $this->node->list->id));
    }

}