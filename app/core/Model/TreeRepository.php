<?php

namespace CMS\Model;

final class TreeRepository extends BaseRepository {

    public function getTree($id) {
        return $this->table()->get($id);
    }

    public function getTreeByType($type) {
        return $this->table()->where('type', $type)->fetch();
    }

    public function getAllTrees() {
        return $this->table()->fetchAll();
    }

}