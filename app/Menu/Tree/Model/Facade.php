<?php

namespace CMS\Menu\Tree\Model;

use CMS\Model,
    CMS\Menu\Tree;

class Facade extends Model\Facade {

    /**
     * @var TreeRepository
     */
    public $repository;

    public function __construct(Tree\Model\Repository $repository) {
        $this->repository = $repository;
    }

    public function getHomeNode($group) {
        $tree = $this->repository->getTreeByGroup($group);
        return $tree->node;
    }

}
