<?php

namespace CMS\Menu\Model;

use CMS\Model\BaseRepository as Repository;
use Nette\Database\Table;

final class NodeRepository extends Repository {

    private $temp;

    /**
     * 
     * @param int $id
     * @return Table\ActiveRow
     */
    public function getNode($id) {
        return $this->table()->get($id);
    }

    /**
     * 
     * @param string $link
     * @param int|null $link_id
     * @return Table\ActiveRow
     */
    public function getNodeByLink($link, $link_id = NULL) {
        return $this->table()->where(array('link' => $link, 'link_id' => $link_id))->fetch();
    }

    /**
     * @param Table\ActiveRow $list
     * @return Table\Selection
     */
    public function getMenu($list) {
        return $list->node->related('node')->where('list_id', $list->id);
    }

    /**
     * 
     * @param Table\ActiveRow $node
     * @return Table\ActiveRow
     */
    public function setRootNode($node) {
        $rootNode = $node->list->node;
        $rootNode->related('node')->update(array('node_id' => $node->id));
        $node->update(array('node_id' => $rootNode->node_id));
        $rootNode->update(array('node_id' => $node->id));
    }

    /**
     * 
     * @param Table\ActiveRow $node
     * @return array
     */
    public function getIdsOfChildNodes($node) {
        $this->temp = array();
        $this->compileIdsOfChildNodes($node);
        return $this->temp;
    }

    /**
     * 
     * @param Table\ActiveRow $node
     */
    private function compileIdsOfChildNodes($node) {
        foreach ($node->related('node') as $child) {
            $this->temp[] = $child->id;
            $this->compileIdsOfChildNodes($child);
        }
    }

    /**
     * 
     * @param Table\ActiveRow $node
     * @return array
     */
    public function getParentNodes($node) {
        $this->temp = array();
        while ($node->node) {
            $this->temp[] = $node->node;
            $node = $node->node;
        }
        return array_reverse($this->temp);
    }

    /**
     * 
     * @param Table\ActiveRow $node
     */
    public function getParentNodeSelect($node) {
        $data = $node->list->related('node')->fetchPairs('id', 'title');
        $data[$node->list->node_id] = $node->list->node->title;
        unset($data[$node->id]);
        foreach ($this->getIdsOfChildNodes($node) as $id) {
            unset($data[$id]);
        }
        return $data;
    }

    /**
     * 
     * @param string $title
     * @param string $link
     * @param int|null $link_id
     * @param string $list
     * @return Table\ActiveRow
     */
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

    /**
     * 
     * @param Table\ActiveRow $node
     * @param array $data
     * @return Table\ActiveRow
     */
    public function updateNode($node, $data) {
        return $node->update($data);
    }

    /**
     * 
     * @param Table\ActiveRow $node
     * @return boolean
     */
    public function removeNode($node) {
        if ($node->id !== $node->list->node_id) {
            $node->related('node')->update(array('node_id' => $node->node_id));
            return $node->delete();
        }
        return false;
    }

}