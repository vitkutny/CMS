<?php

namespace CMS\Page;

final class PagePresenter extends BasePresenter {

    /**
     * @var Nette\Database\Table\ActiveRow
     */
    private $page;

    /**
     * @param int $id
     */
    public function actionView($id) {
        $this->page = $this->pageRepository->getPage($id);
        if (!$this->page) {
            $this->error();
        }
        $this->menu->setCurrent($this->page->node, 'node');
    }

    public function renderView() {
        $this->template->page = $this->page;
    }

}