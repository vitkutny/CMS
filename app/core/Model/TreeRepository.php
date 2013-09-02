<?php

namespace CMS\Model;

final class TreeRepository extends BaseRepository {

    private $temp;

    public function getTree($id) {
        return $this->table()->get($id);
    }

    public function getTreeByGroup($group) {
        return $this->table()->where('group', $group)->fetch();
    }

    public function getTreeData($tree) {
        $this->temp = $tree->related('node')->order('position')->order('title')->fetchAll();
        return $this->compileTreeData($tree->node_id);
    }

    public function compileTreeData($id) {
        $tree = array();
        foreach ($this->temp as $node) {
            if ($node->node_id === $id) {
                $tree[] = (object) array(
                            'data' => $node,
                            'children' => $this->compileTreeData($node->id),
                );
            }
        }
        return $tree;
    }

    public function getAllTrees() {
        return $this->table()->fetchAll();
    }

}