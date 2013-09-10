<?php

namespace CMS\Model;

use CMS\Model\NodeRepository;
use CMS\Model\TreeRepository;

class MenuFacade extends BaseFacade {

    private $nodeRepository;
    private $treeRepository;

    public function __construct(NodeRepository $nodeRepository, TreeRepository $treeRepository) {
        $this->nodeRepository = $nodeRepository;
        $this->treeRepository = $treeRepository;
    }

    public function getParentNodeSelectData($tree, $node = NULL) {
        if (is_string($tree)) {
            $tree = $this->treeRepository->getTreeByGroup($tree);
        }
        $data = $tree->related('node')->fetchPairs('id', 'title');
        $data[$tree->node_id] = $tree->node->title;
        if ($node) {
            unset($data[$node->id]);
            foreach ($this->nodeRepository->getIdsOfChildNodes($node) as $id) {
                unset($data[$id]);
            }
        }
        return $data;
    }

    public function addNode($data) {
        $node = $this->nodeRepository->getNode($data['node_id']);
        $data['tree_id'] = $node->tree_id;
        return $this->nodeRepository->insertNode($data);
    }

    public function editNode($node, $data) {
        return $this->nodeRepository->updateNode($node, $data);
    }

    public function deleteNode($node) {
        if ($node->id !== $node->tree->node_id) {
            $node->related('node')->update(array('node_id' => $node->node_id));
            return $this->nodeRepository->removeNode($node);
        }
    }

}
