<?php

namespace CMS\Model;

final class PageRepository extends BaseRepository {

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
