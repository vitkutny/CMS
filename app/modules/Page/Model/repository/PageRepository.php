<?php

namespace CMS\Page\Model;

use CMS\Model\Repository;

final class PageRepository extends Repository {

    public function getPage($id) {
        return $this->table()->get($id);
    }

    public function getPages() {
        return $this->table()->fetchAll();
    }

    public function insertPage(array $data) {
        return $this->table()->insert($data);
    }

    public function updatePage($page, array $data) {
        return $page->update($data);
    }

    public function removePage($page) {
        return $page->delete();
    }

}
