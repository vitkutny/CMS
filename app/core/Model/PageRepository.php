<?php

namespace CMS\Model;

use CMS\Component\Menu\MenuControl;

final class PageRepository extends BaseRepository {

    /**
     * @var MenuControl 
     */
    private $menu;

    public function __construct(\DibiConnection $connection, MenuControl $menu) {
        parent::__construct($connection);
        $this->menu = $menu;
    }

    public function getPage($id) {
        return $this->find($id);
    }

    public function getPages() {
        return $this->findAll();
    }

    public function addPage(array $data) {
        $node = $this->menu->insert($data['title'], ':Front:Page:view');
        unset($data['title']);
        $data['node_id'] = $node->id;
        $page = $this->table()->insert($data);
        $this->menu->update($node, array('link_id' => $page->id));
        return $page;
    }

    public function editPage($page, array $data) {
        return $page->update($data);
    }

    public function removePage($page) {
        if ($this->menu->remove($page->node)) {
            return $page->delete();
        } else {
            return false;
        }
    }

}