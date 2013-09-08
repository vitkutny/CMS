<?php

namespace CMS\Admin\Page\Form;

use CMS\Form\BaseFormFactory;
use Nette\Application\UI\Form;
use CMS\Component\Menu\MenuControl;
use CMS\Model\PageRepository;
use CMS\Admin\Menu\Form\NodeFormContainer;
use CMS\Admin\Page\Form\PageFormContainer;

final class PageFormFactory extends BaseFormFactory {

    private $menu;
    private $pageRepository;

    public function __construct(MenuControl $menu, PageRepository $pageRepository) {
        $this->menu = $menu;
        $this->pageRepository = $pageRepository;
    }

    protected function createAdd() {
        $form = parent::createAdd();
        $form['node'] = new NodeFormContainer($this->menu, 'front');
        $form['page'] = new PageFormContainer();
        $form->addSubmit('add', 'Add page');
        return $form;
    }

    protected function createEdit($page) {
        $form = parent::createEdit($page);
        $form['node'] = new NodeFormContainer($this->menu, $page->node->tree, $page->node);
        $form['page'] = new PageFormContainer($page);
        $form->addSubmit('edit', 'Edit page');
        if ($page->node->node_id) {
            $form->addSubmit('remove', 'Remove page')->setAttribute('class', 'btn-danger');
        }
        return $form;
    }

    public function successAdd(Form $form) {
        $page = $this->pageRepository->addPage($form->getValues(TRUE));
        $this->presenter->redirect($page->node->link_admin, array('id' => $page->node->link_id));
    }

    public function successEdit(Form $form, $page) {
        if ($form->isSubmitted()->getHtmlName() == 'remove') {
            $this->pageRepository->removePage($page);
            $this->presenter->redirect('Home:view');
        } else {
            $this->pageRepository->editPage($page, $form->getValues(TRUE));
            $this->presenter->redirect('this');
        }
    }

}
