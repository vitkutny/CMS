<?php

namespace CMS\Gallery\Model;

use CMS\Model\DatabaseRepository;

final class GalleryRepository extends DatabaseRepository {

    public function getGallery($id) {
        return $this->getOne($id);
    }

}
