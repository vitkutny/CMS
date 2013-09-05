<?php

namespace CMS\Admin\Page;

use Nette\Application\UI\Form;
use Nette\Application\BadRequestException;
use CMS\Form\FormRenderer;
use CMS\Admin\Menu\Form\NodeFormContainer;
use CMS\Admin\Page\Form\PageFormContainer;

final class PagePresenter extends BasePresenter {

    /**
     * @persistent int|NULL
     */
    public $id;
    private $page;

    public function renderAdd() {
        $this->menu->breadcrumbAdd('Add new page');
    }

    public function actionEdit($id) {
        $this->page = $this->pageRepository->getPage($id);
        if (!$this->page) {
            throw new BadRequestException;
        }
    }

    public function renderEdit() {
        $this->menu->breadcrumbAdd('Edit page: ' . $this->page->node->title);
    }

    protected function createComponentPageFormAdd() {
        $form = new Form();
        $form->setRenderer(new FormRenderer);
        $form['node'] = new NodeFormContainer($this->menu, 'front');
        $form['page'] = new PageFormContainer();
        $form->onSuccess[] = $this->processPageForm;
        $form->addSubmit('add', 'Add page');
        return $form;
    }

    protected function createComponentPageFormEdit() {
        $form = new Form();
        $form->setRenderer(new FormRenderer);
        $form['node'] = new NodeFormContainer($this->menu, $this->page->node->tree, $this->page->node);
        $form['page'] = new PageFormContainer($this->page);
        $form->onSuccess[] = $this->processPageForm;
        $form->addSubmit('edit', 'Edit page');
        if ($this->page->node->node_id) {
            $form->addSubmit('remove', 'Remove page')->setAttribute('class', 'btn-danger');
        }
        return $form;
    }

    /**
     * @param Form $form
     */
    public function processPageForm(Form $form) {
        if ($this->id AND !$this->page) {
            throw new BadRequestException;
        }

        if ($this->id) {
            if ($form->getHttpData('remove')) {
                $this->pageRepository->removePage($this->page);
                $this->redirect('Home:view');
            } else {
                $this->pageRepository->editPage($this->page, $form->getValues(TRUE));
                $this->redirect('this');
            }
        } else {
            $page = $this->pageRepository->addPage($form->getValues(TRUE));
            $this->redirect($page->node->link_admin, array('id' => $page->node->link_id));
        }
    }

}
