<?php

namespace CMS\Admin\Page;

final class HomePresenter extends BasePresenter {

    private $pages;

    /**
     * @inject
     * @var \CMS\Page\Model\PageFacade
     */
    public $pageFacade;

    public function actionView() {
        $this->pages = $this->pageFacade->repository->getPages();
    }

    public function renderView() {
        $this->template->pages = $this->pages;
    }

}
