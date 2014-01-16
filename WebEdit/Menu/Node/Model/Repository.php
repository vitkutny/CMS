<?php

namespace WebEdit\Menu\Node\Model;

use WebEdit\Database;

//TODO: move some to facade
final class Repository extends Database\Repository {

    protected $table = "node";
    private $temp;

    public function getNode($id) {
        return $this->getOne($id);
    }

    public function getNodeByLink($link, $link_id = NULL) {
        return $this->getOne(array('link' => $link, 'link_id' => $link_id));
    }

    public function getAllNodes() {
        return $this->getAll(NULL, array('position', 'title'));
    }

    public function getNodesInNode($node) {
        return $this->getRelated($node, 'node');
    }

    public function getChildNodes($node) {
        $related = $this->getAll(array('id' => $this->getIdsOfChildNodes($node)), NULL, FALSE);
        return $this->getPairs('id', 'title', $related);
    }

    public function getIdsOfChildNodes($node) {
        $this->temp = array();
        $this->compileIdsOfChildNodes($node);
        return $this->temp;
    }

    private function compileIdsOfChildNodes($node) {
        foreach ($this->getNodesInNode($node) as $child) {
            $this->temp[] = $child->id;
            $this->compileIdsOfChildNodes($child);
        }
    }

}
