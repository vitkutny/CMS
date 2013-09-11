<?php

namespace CMS\Admin\Menu;

final class HomePresenter extends BasePresenter {

    public function renderView() {
        $this->template->trees = $this->treeRepository->getAllTrees();
    }

}
