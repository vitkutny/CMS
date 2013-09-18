<?php

namespace CMS\Menu\Model;

use CMS\Model\Facade;
use CMS\Menu\Model\TreeRepository;

class TreeFacade extends Facade {

    public $repository;

    public function __construct(TreeRepository $repository) {
        $this->repository = $repository;
    }

    public function getHomeNode($group) {
        $tree = $this->repository->getTreeByGroup($group);
        return $tree->node;
    }

}
