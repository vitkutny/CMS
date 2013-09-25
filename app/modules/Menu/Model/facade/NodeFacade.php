<?php

namespace CMS\Menu\Model;

use CMS\Model\Facade;
use CMS\Menu\Model\NodeRepository;
use CMS\Menu\Model\TreeFacade;
use CMS\Menu\Form\NodeFormContainer;

class NodeFacade extends Facade {

    public $repository;
    private $treeFacade;

    public function __construct(NodeRepository $repository, TreeFacade $treeFacade) {
        $this->repository = $repository;
        $this->treeFacade = $treeFacade;
    }

    public function getFormContainer($tree, $node = NULL, $home = TRUE) {
        $data = array(NULL => '- select one -') + $this->getParentNodeSelectData($tree, $node, $home);
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

    public function getParentNodeSelectData($tree, $node = NULL, $home = TRUE) {
        if (is_string($tree)) {
            $tree = $this->treeFacade->repository->getTreeByGroup($tree);
        }
        $data = $tree->related('node')->fetchPairs('id', 'title');
        if ($home) {
            $data[$tree->node_id] = $tree->node->title;
        }
        if ($node) {
            unset($data[$node->id]);
            foreach ($this->repository->getIdsOfChildNodes($node) as $id) {
                unset($data[$id]);
            }
        }
        return $data;
    }

    public function addNode($data) {
        $node = $this->repository->getNode($data['node_id']);
        $data['tree_id'] = $node->tree_id;
        return $this->repository->insert($data);
    }

    public function editNode($node, $data) {
        return $this->repository->update($node, $data);
    }

    public function deleteNode($node) {
        if ($node->id !== $node->tree->node_id) {
            $node->related('node')->update(array('node_id' => $node->node_id));
            return $this->repository->remove($node);
        }
    }

}