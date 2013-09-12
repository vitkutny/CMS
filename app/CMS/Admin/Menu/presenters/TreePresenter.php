<?php

namespace CMS\Admin\Menu;

final class TreePresenter extends BasePresenter {

    /**
     * @var \Nette\Database\Table\ActiveRow 
     */
    private $tree;

    /**
     * @inject
     * @var \CMS\Model\TreeFacade
     */
    public $treeFacade;

    public function actionEdit($id) {
        $this->tree = $this->treeFacade->repository->getTree($id);
        if (!$this->tree) {
            $this->error();
        }
    }

    public function renderEdit() {
        $this->menu->breadcrumbAdd('Edit list: ' . $this->tree->title);
        $this->template->tree = $this->treeFacade->repository->getTreeData($this->tree);
    }

}
