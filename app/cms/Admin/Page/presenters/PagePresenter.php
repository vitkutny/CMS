<?php

namespace CMS\Admin\Page;

use Nette\Application\UI\Form;
use CMS\Component\Form\FormRenderer;

final class PagePresenter extends BasePresenter {

    private $page;

    public function renderAdd() {
        $this->menu->breadcrumbAdd('Add new page');
    }

    public function actionEdit($id) {
        $this->page = $this->pageRepository->getPage($id);
        if (!$this->page) {
            $this->error();
        }
    }

    public function renderEdit() {
        $this->menu->breadcrumbAdd('Edit page: ' . $this->page->node->title);
    }

    protected function createComponentPageAddForm() {
        $form = new Form();
        $form->setRenderer(new FormRenderer);
        $form->addText('title', 'Title')->setRequired();
        $form->addTextArea('content', 'Content')->setRequired();
        $form->onSuccess[] = $this->pageAddFormSuccess;
        $form->addSubmit('add', 'Add page');
        return $form;
    }

    protected function createComponentPageEditForm() {
        $form = new Form();
        $form->setRenderer(new FormRenderer);
        $form->addTextArea('content', 'Content')->setRequired();
        $form->setDefaults($this->page);
        $form->onSuccess[] = $this->pageEditFormSuccess;
        $form->addSubmit('edit', 'Edit page');
        if ($this->page->node->node_id) {
            $form->addSubmit('remove', 'Remove page')->setAttribute('class', 'alert');
        }
        return $form;
    }

    /**
     * 
     * @param Form $form
     */
    public function pageAddFormSuccess(Form $form) {
        $this->pageRepository->addPage($form->getValues(TRUE));
        $this->redirect('Home:view');
    }

    /**
     * 
     * @param Form $form
     */
    public function pageEditFormSuccess(Form $form) {
        if ($form->getHttpData('remove')) {
            $this->pageRepository->removePage($this->page);
        } else {
            $this->pageRepository->editPage($this->page, $form->getValues(TRUE));
        }
        $this->redirect('Home:view');
    }

}