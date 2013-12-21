<?php

namespace CMS\Gallery\Model;

use CMS\Model\DatabaseRepository;

final class PhotoRepository extends DatabaseRepository {

    public function getPhoto($id) {
        return $this->getOne($id);
    }

}
