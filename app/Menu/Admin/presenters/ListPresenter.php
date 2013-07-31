<?php

namespace CMS\Admin\Menu;

use Nette\Application\UI\Form;

final class ListPresenter extends BasePresenter {

    /**
     * @var Nette\Database\Table\ActiveRow 
     */
    private $list;

    public function actionEdit($id) {
        $this->list = $this->listRepository->getList($id);
        if (!$this->list) {
            $this->error();
        }
    }

    public function renderEdit() {
        $this->menu->breadcrumbAdd('Edit list');
        $this->template->menu = $this->nodeRepository->getMenu($this->list);
    }

}