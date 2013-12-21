<?php

namespace CMS\Gallery\Model;

use CMS\Model\Facade;
use CMS\Gallery\Model\GalleryRepository;

class GalleryFacade extends Facade {

    public $repository;

    public function __construct(GalleryRepository $repository) {
        $this->repository = $repository;
    }

    public function addGallery($data) {
        return $this->repository->insert($data);
    }

    public function editGallery($gallery, $data) {
        return $this->repository->update($gallery, $data);
    }

    public function deleteGallery($gallery) {
        return $this->repository->remove($gallery);
    }

}
