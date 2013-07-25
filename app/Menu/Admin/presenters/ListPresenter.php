<?php

namespace CMS\Admin\Menu;

use Nette\Application\UI\Form;

final class ListPresenter extends BasePresenter {

    private $list;

    public function actionEdit($id) {
        $this->list = $this->listRepository->getList($id);
        if (!$this->list) {
            $this->error();
        }
    }

    public function renderEdit() {
        $this->menu->breadcrumbAdd($this->list->title, $this->getAction(TRUE), $this->list->id);
        $this->template->menu = array($this->nodeRepository->getRootNode($this->list));
    }

}