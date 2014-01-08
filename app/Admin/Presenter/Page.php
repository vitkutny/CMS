<?php

namespace CMS\Admin\Presenter;

use CMS\Admin\Presenter\Base;

final class Page extends Base {

    private $page;

    /**
     * @inject
     * @var \CMS\Page\Model\Facade
     */
    public $pageFacade;

    /**
     * @inject
     * @var \CMS\Page\Form\Factory
     */
    public $pageFormFactory;

    public function renderAdd() {
        $this->menu->breadcrumbAdd(
                $this->translator->translate('cms.admin.page.add'), 'Page:add');
    }

    public function actionEdit($id) {
        $this->page = $this->pageFacade->repository->getPage($id);
        if (!$this->page) {
            $this->error();
        }
    }

    public function renderEdit() {
        $this->menu->breadcrumbAdd(
                $this->translator->translate('cms.admin.page.edit', NULL, ['page' => $this->page->node->title]), 'Page:edit', $this->page->id);
        $this->template->page = $this->page;
    }

    protected function createComponentPageFormAdd() {
        return $this->pageFormFactory->create();
    }

    protected function createComponentPageFormEdit() {
        return $this->pageFormFactory->create($this->page);
    }

}
