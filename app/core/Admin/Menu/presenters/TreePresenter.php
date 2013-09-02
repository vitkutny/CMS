<?php

namespace CMS\Admin\Menu;

final class TreePresenter extends BasePresenter {

    /**
     * @var \Nette\Database\Table\ActiveRow 
     */
    private $tree;

    public function actionEdit($id) {
        $this->tree = $this->treeRepository->getTree($id);
        if (!$this->tree) {
            $this->error();
        }
    }

    public function renderEdit() {
        $this->menu->breadcrumbAdd('Edit list: ' . $this->tree->title);
        $this->template->tree = $this->treeRepository->getTreeData($this->tree);
    }

}