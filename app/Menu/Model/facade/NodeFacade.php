<?php

namespace CMS\Menu\Model;

use CMS\Model\Facade;
use CMS\Menu\Model\NodeRepository;
use CMS\Menu\Model\TreeFacade;
use CMS\Menu\Form\NodeFormContainer;
use CMS\Model\Exception\ModelException;

class NodeFacade extends Facade {

    public $repository;
    private $treeFacade;

    public function __construct(NodeRepository $repository, TreeFacade $treeFacade) {
        $this->repository = $repository;
        $this->treeFacade = $treeFacade;
    }

    public function getFormContainer($tree, $node = NULL, $home = TRUE) {
        if (is_string($tree)) {
            $tree = $this->treeFacade->repository->getTreeByGroup($tree);
        }
        $data = array();
        if ($home) {
            $data[$tree->node_id] = $tree->node->title;
        } else {
            $data[NULL] = '- select one -';
        }
        $data += $this->repository->getNodesInTree($tree);
        if ($node) {
            unset($data[$node->id]);
            foreach ($this->repository->getIdsOfChildNodes($node) as $id) {
                unset($data[$id]);
            }
        }
        return new NodeFormContainer($data, $node);
    }

    public function getParentNodes($node) {
        $nodes = array();
        while ($node->node) {
            $nodes[$node->node->id] = $node->node;
            $node = $node->node;
        }
        return array_reverse($nodes, TRUE);
    }

    public function addNode($data, $group) {
        $data['tree_id'] = $this->treeFacade->repository->getTreeByGroup($group)->id;
        return $this->repository->insert($data);
    }

    public function editNode($node, $data) {
        return $this->repository->update($node, $data);
    }

    public function deleteNode($node) {
        if ($node->id === $node->tree->node_id) {
            throw new ModelException("It's not possible to delete root node.");
        }
        $selection = $this->repository->getRelated($node, 'node', NULL, FALSE);
        $data = array('node_id' => $node->node_id);
        $this->repository->update($selection, $data);
        return $this->repository->remove($node);
    }

}
