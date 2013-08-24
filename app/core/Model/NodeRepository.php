<?php

namespace CMS\Model;

final class NodeRepository extends BaseRepository {

    private $temp;

    public function getNode($id) {
        return $this->find($id);
    }

    public function getNodeByLink($link, $link_id = NULL) {
        if ($link_id) {
            $row = $this->connection->select('*')->from($this->getTable())->where('link = %s', $link)->where('link_id = %i', $link_id)->fetch();
        } else {
            $row = $this->connection->select('*')->from($this->getTable())->where('link = %s', $link)->where('link_id IS NULL')->fetch();
        }
        return $this->createEntity($row);
    }

    public function getNodesInTree($tree) {
        $rows = $this->connection->select('*')->from($this->getTable())->where('tree_id = %i', $tree->id)->orderBy('position')->orderBy('title')->fetchAll();
        return $this->createEntities($rows);
    }

    public function getTree($tree) {
        $this->temp = $this->getNodesInTree($tree);
        return $this->compileTree($tree->node->id);
    }

    public function compileTree($id) {
        $tree = array();
        foreach ($this->temp as $node) {
            if ($node->node) {
                if ($node->node->id == $id) {
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
        foreach ($node->nodes as $child) {
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
        $data = $this->connection->select('id,title')->from($this->getTable())->where('tree_id = %i', $node->tree->id)->fetchPairs('id', 'title');
        $data[$node->tree->node->id] = $node->tree->node->title;
        unset($data[$node->id]);
        foreach ($this->getIdsOfChildNodes($node) as $id) {
            unset($data[$id]);
        }
        return $data;
    }

    public function insertNode($list, $title, $link, $link_id = NULL) {
        $data = array(
            'node_id' => $list->node_id,
            'list_id' => $list->id,
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
        if ($node->id !== $node->list->node_id) {
            $node->related('node')->update(array('node_id' => $node->node_id));
            return $node->delete();
        }
        return false;
    }

}