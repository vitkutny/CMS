<?php

namespace CMS\Menu\Model;

use CMS\Model\DatabaseRepository;

final class TreeRepository extends DatabaseRepository {

    private $temp;

    public function getTree($id) {
        return $this->getOne($id);
    }

    public function getTreeByGroup($group) {
        return $this->getOne(array('group' => $group));
    }

    public function getTreeData($tree) {
        $this->temp = $this->getRelated($tree, 'node', array('position', 'title'));
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

}
