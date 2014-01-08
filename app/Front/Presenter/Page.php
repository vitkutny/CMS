<?php

namespace CMS\Front\Presenter;

use CMS\Front\Presenter\Base;

final class Page extends Base {

    /**
     * @inject
     * @var \CMS\Page\Model\Facade
     */
    public $pageFacade;
    private $page;

    /**
     * @param int $id
     */
    public function actionView($id) {
        $this->page = $this->pageFacade->repository->getPage($id);
        if (!$this->page) {
            $this->error();
        }
        $this->menu->setActive($this->page->node);
    }

    public function renderView() {
        $this->template->page = $this->page;
    }

}
