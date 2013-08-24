<?php

namespace CMS\Model;

final class TreeRepository extends BaseRepository {

    public function getTree($id) {
        return $this->find($id);
    }

    public function getTreeByType($type) {
        $row = $this->connection->select('*')->from($this->getTable())->where('type = %s', $type)->fetch();
        return $this->createEntity($row);
    }

    public function getAllTrees() {
        return $this->findAll();
    }

}