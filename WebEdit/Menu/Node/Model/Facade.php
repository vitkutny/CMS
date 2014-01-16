<?php

namespace WebEdit\Menu\Node\Model;

use WebEdit\Model,
    WebEdit\Menu\Node,
    WebEdit\Menu\Tree;

class Facade extends Model\Facade {

    public $repository;
    private $treeFacade;

    public function __construct(Node\Model\Repository $repository, Tree\Model\Facade $treeFacade) {
        $this->repository = $repository;
        $this->treeFacade = $treeFacade;
    }

    public function getFormContainer($group, $node = NULL, $home = TRUE) {
        $tree = $this->treeFacade->repository->getTreeByGroup($group);
        $data = array();
        if ($home) {
            $data[$tree->node->id] = $tree->node->title;
        } else {
            $data[NULL] = 'form.select.empty';
        }
        $data += $this->repository->getChildNodes($tree->node);
        if ($node) {
            if ($home) {
                unset($data[$node->id]);
            }
            foreach ($this->repository->getIdsOfChildNodes($node) as $id) {
                unset($data[$id]);
            }
        }
        return new Node\Form\Container($data, $node);
    }

    public function getParentNodes($node) {
        $nodes = array();
        while ($node->node) {
            $nodes[$node->node->id] = $node->node;
            $node = $node->node;
        }
        return array_reverse($nodes, TRUE);
    }

    public function addNode($data) {
        return $this->repository->insert($data);
    }

    public function editNode($node, $data) {
        return $this->repository->update($node, $data);
    }

    public function deleteNode($node) {
        foreach ($this->treeFacade->repository->getAllTrees(TRUE) as $tree) {
            if ($tree->node_id === $node->id) {
                throw new Model\Exception("It's not possible to delete root node.");
            }
        }

        $selection = $this->repository->getRelated($node, 'node', NULL, FALSE);
        $data = array('node_id' => $node->node_id);
        $this->repository->update($selection, $data);
        return $this->repository->remove($node);
    }

}
