<?php

namespace CMS\Admin\Menu;

use Nette\Application\UI\Form;
use CMS\Component\Form\FormRenderer;

final class NodePresenter extends BasePresenter {

    /**
     *
     * @var \Nette\Database\Table\ActiveRow
     */
    private $node;

    public function actionEdit($id) {
        $this->node = $this->nodeRepository->getNode($id);
        if (!$this->node) {
            $this->error();
        }
    }

    public function renderEdit() {
        $this->menu->breadcrumbAdd('Edit node');
    }

    protected function createComponentNodeEditForm() {
        $form = new Form;
        $form->setRenderer(new FormRenderer);
        $form->addText('title', 'Title')->setRequired();
        if ($this->node->node) {
            $form->addSelect('node_id', 'Parent node', $this->nodeRepository->getParentNodeSelect($this->node))->setRequired();
        }
        $form->addText('position', 'Position number')->addRule(Form::INTEGER)->setType('number')->setRequired();
        $form->setDefaults($this->node);
        $form->addSubmit('save', 'Save');
        $form->onSuccess = $this->nodeEditFormSuccess;
        return $form;
    }

    /**
     * 
     * @param Form $form
     */
    public function nodeEditFormSuccess(Form $form) {
        $data = $form->getValues(TRUE);
        $this->nodeRepository->updateNode($this->node, $data);
        $this->redirect('List:edit', array('id' => $this->node->list->id));
    }

}