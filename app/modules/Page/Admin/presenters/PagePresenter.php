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
        $this->menu->breadcrumbAdd('Add new page');
    }

    public function actionEdit($id) {
        $this->page = $this->pageFacade->repository->getPage($id);
        if (!$this->page) {
            throw new BadRequestException;
        }
    }

    public function renderEdit() {
        $this->menu->breadcrumbAdd('Edit page: ' . $this->page->node->title);
    }

    protected function createComponentPageFormAdd() {
        return $this->pageFormFactory->create();
    }

    protected function createComponentPageFormEdit() {
        return $this->pageFormFactory->create($this->page);
    }

}
