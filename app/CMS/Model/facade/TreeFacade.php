<?php

namespace CMS\Model;

use CMS\Model\TreeRepository;

class TreeFacade extends BaseFacade {

    public $repository;

    public function __construct(TreeRepository $repository) {
        $this->repository = $repository;
    }

}
