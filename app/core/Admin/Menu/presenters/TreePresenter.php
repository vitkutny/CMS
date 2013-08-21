<?php

namespace CMS\Admin\Menu;

final class ListPresenter extends BasePresenter {

    /**
     * @var \Nette\Database\Table\ActiveRow 
     */
    private $tree;

    public function actionEdit($id) {
        $this->list = $this->treeRepository->getTree($id);
        if (!$this->list) {
            $this->error();
        }
    }

    public function renderEdit() {
        $this->menu->breadcrumbAdd('Edit list: ' . $this->list->title);
        $this->template->tree = $this->nodeRepository->getTree($this->list);
    }

}