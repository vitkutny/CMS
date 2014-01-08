<?php

namespace CMS\Page\Model;

use CMS\Database;

final class Repository extends Database\Repository {

    protected $table = 'page';

    public function getPage($id) {
        return $this->getOne($id);
    }

    public function getPages() {
        return $this->getAll();
    }

}
