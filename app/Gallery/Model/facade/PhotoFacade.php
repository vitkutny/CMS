<?php

namespace CMS\Gallery\Model;

use CMS\Model\Facade;
use CMS\Gallery\Model\PhotoRepository;

class PhotoFacade extends Facade {

    public $repository;

    public function __construct(PhotoRepository $repository) {
        $this->repository = $repository;
    }

    public function addPhoto($data) {
        return $this->repository->insert($data);
    }

    public function editPhoto($photo, $data) {
        return $this->repository->update($photo, $data);
    }

    public function deletePhoto($photo) {
        return $this->repository->remove($photo);
    }

}
