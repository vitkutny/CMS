<?php

namespace CMS\Admin\Page;

use Nette\Application\BadRequestException;

final class PagePresenter extends BasePresenter {

    private $page;

    /**
     * @inject
     * @var \CMS\Page\Model\PageFacade
     */
    public $pageFacade;

    /**
     * @inject
     * @var \CMS\Page\Form\PageFormFactory
     */
    public $pageFormFactory;

    public function renderAdd() {
        $this->menu->breadcrumbAdd(
                $this->translator->translate('page.admin.page.add'), 'Page:add');
    }

    public function actionEdit($id) {
        $this->page = $this->pageFacade->repository->getPage($id);
        if (!$this->page) {
            throw new BadRequestException;
        }
    }

    public function renderEdit() {
        $this->menu->breadcrumbAdd(
                $this->translator->translate('page.admin.page.edit', NULL, ['page' => $this->page->node->title]), 'Page:edit', $this->page->id);
        $this->template->page = $this->page;
    }

    protected function createComponentPageFormAdd() {
        return $this->pageFormFactory->create();
    }

    protected function createComponentPageFormEdit() {
        return $this->pageFormFactory->create($this->page);
    }

}
