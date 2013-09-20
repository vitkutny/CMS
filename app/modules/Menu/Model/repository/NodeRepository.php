<?php

namespace CMS\Menu\Model;

use CMS\Model\DatabaseRepository;

final class NodeRepository extends DatabaseRepository {

    private $temp;

    public function getNode($id) {
        return $this->table()->get($id);
    }

    public function getNodeByLink($link, $link_id = NULL) {
        return $this->table()->where('link', $link)->where('link_id', $link_id)->fetch();
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

}
