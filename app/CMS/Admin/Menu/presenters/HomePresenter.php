<?php

namespace CMS\Admin\Menu;

final class HomePresenter extends BasePresenter {

    /**
     * @inject
     * @var \CMS\Model\TreeFacade
     */
    public $treeFacade;

    public function renderView() {
        $this->template->trees = $this->treeFacade->repository->getAllTrees();
    }

}
