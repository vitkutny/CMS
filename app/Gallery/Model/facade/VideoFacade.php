<?php

namespace CMS\Gallery\Model;

use CMS\Model\Facade;
use CMS\Gallery\Model\VideoRepository;

class VideoFacade extends Facade {

    public $repository;

    public function __construct(VideoRepository $repository) {
        $this->repository = $repository;
    }

    public function addVideo($data) {
        return $this->repository->insert($data);
    }

    public function editVideo($video, $data) {
        return $this->repository->update($video, $data);
    }

    public function deleteVideo($video) {
        return $this->repository->remove($video);
    }

}
