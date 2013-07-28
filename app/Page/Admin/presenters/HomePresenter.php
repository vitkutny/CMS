<?php

namespace CMS\Admin\Page;

final class HomePresenter extends BasePresenter {

    /**
     * @var Nette\Database\Table\Selection
     */
    private $pages;

    /**
     * @param int $id
     */
    public function actionView() {
        $this->pages = $this->pageRepository->getPages();
    }

    public function renderView() {
        $this->template->pages = $this->pages;
    }

}