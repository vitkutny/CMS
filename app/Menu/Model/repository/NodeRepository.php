<?php

namespace CMS\Menu\Model;

use CMS\Model\DatabaseRepository;

final class NodeRepository extends DatabaseRepository {

    private $temp;

    public function getNode($id) {
        return $this->getOne($id);
    }

    public function getNodeByLink($link, $link_id = NULL) {
        return $this->getOne(array('link' => $link, 'link_id' => $link_id));
    }

    public function getNodesInNode($node) {
        return $this->getRelated($node, 'node');
    }

    public function getNodesInTree($tree) {
        $related = $this->getRelated($tree, 'node', NULL, FALSE);
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
