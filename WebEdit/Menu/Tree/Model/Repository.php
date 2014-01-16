<?php

namespace WebEdit\Menu\Tree\Model;

use WebEdit\Database;

final class Repository extends Database\Repository {

    protected $table = "tree";

    public function getTree($id) {
        return $this->getOne($id);
    }

    public function getTreeByGroup($group) {
        return $this->getOne(array('group' => $group));
    }

    public function getAllTrees($full = NULL) {
        if ($full) {
            return $this->getAll();
        } else {
            return $this->getAll(array('panel' => 'NOT NULL'));
        }
    }

}
