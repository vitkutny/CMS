<?php

namespace CMS\Admin\Page;

final class HomePresenter extends BasePresenter {

    private $pages;

    public function actionView() {
        $this->pages = $this->pageRepository->getPages();
    }

    public function renderView() {
        $this->template->pages = $this->pages;
    }

}