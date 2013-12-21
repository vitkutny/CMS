<?php

namespace CMS\Gallery\Model;

use CMS\Model\DatabaseRepository;

final class VideoRepository extends DatabaseRepository {

    public function getVideo($id) {
        return $this->getOne($id);
    }

}
