<?php

namespace CMS\Page\Model;

use CMS\Model\DatabaseRepository;

final class PageRepository extends DatabaseRepository {

    public function getPage($id) {
        return $this->table()->get($id);
    }

    public function getPages() {
        return $this->table()->fetchAll();
    }

}