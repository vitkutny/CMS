<?php

namespace CMS\Front;

final class PagePresenter extends BasePresenter {

    /**
     * @inject
     * @var \CMS\Model\PageRepository
     */
    public $pageRepository;

    /**
     * @var Nette\Database\Table\ActiveRow
     */
    private $page;
    private $pageTemplate;

    /**
     * @param int $id
     */
    public function actionView($id) {
        $this->page = $this->pageRepository->getPage($id);
        if (!$this->page) {
            $this->error();
        }
        $this->pageTemplate = $this->createTemplate('Nette\Templating\Template');
        $this->pageTemplate->setSource($this->page->content);
        $this->menu->setActive($this->page->node);
    }

    public function renderView() {
        $this->template->page = $this->page;
        $this->template->pageTemplate = $this->pageTemplate;
    }

}
