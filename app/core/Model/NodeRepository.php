<?php

namespace CMS\Model;

final class NodeRepository extends BaseRepository {

    private $temp;

    public function getNode($id) {
        return $this->table()->get($id);
    }

    public function getNodeByLink($link, $link_id = NULL) {
        return $this->table()->where('link', $link)->where('link_id', $link_id)->fetch();
    }

    public function getNodesInTree($tree) {
        return $this->table()->where('tree_id', $tree->id)->order('position')->order('title')->fetchAll();
    }

    public function getTree($tree) {
        $this->temp = $this->getNodesInTree($tree);
        return $this->compileTree($tree->node_id);
    }

    public function compileTree($id) {
        $tree = array();
        foreach ($this->temp as $node) {
            if ($node->node) {
                if ($node->node_id == $id) {
                    $tree[] = (object) array(
                                'data' => $node,
                                'children' => $this->compileTree($node->id),
                    );
                }
            }
        }
        return $tree;
    }

    /*
      public function setRootNode($node) {
      $rootNode = $node->list->node;
      $rootNode->related('node')->update(array('node_id' => $node->id));
      $node->update(array('node_id' => $rootNode->node_id));
      $rootNode->update(array('node_id' => $node->id));
      }
     */

    public function getIdsOfChildNodes($node) {
        $this->temp = array();
        $this->compileIdsOfChildNodes($node);
        return $this->temp;
    }

    private function compileIdsOfChildNodes($node) {
        foreach ($node->related('node') as $child) {
            $this->temp[] = $child->id;
            $this->compileIdsOfChildNodes($child);
        }
    }

    public function getParentNodes($node) {
        $this->temp = array();
        while ($node->node) {
            $this->temp[] = $node->node;
            $node = $node->node;
        }
        return array_reverse($this->temp);
    }

    public function getParentNodeSelectData($node) {
        $data = $this->table()->where('tree_id', $node->tree_id)->fetchPairs('id', 'title');
        $data[$node->tree->node_id] = $node->tree->node->title;
        unset($data[$node->id]);
        foreach ($this->getIdsOfChildNodes($node) as $id) {
            unset($data[$id]);
        }
        return $data;
    }

    public function insertNode($tree, $title, $link, $link_id = NULL) {
        $data = array(
            'node_id' => $tree->node_id,
            'tree_id' => $tree->id,
            'title' => $title,
            'link' => $link,
            'link_id' => $link_id,
            'position' => 0
        );
        return $this->table()->insert($data);
    }

    public function updateNode($node, $data) {
        return $node->update($data);
    }

    public function removeNode($node) {
        if ($node->id !== $node->tree->node_id) {
            $node->related('node')->update(array('node_id' => $node->node_id));
            return $node->delete();
        }
        return false;
    }

}