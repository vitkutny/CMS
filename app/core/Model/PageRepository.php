<?php

namespace CMS\Model;

use CMS\Component\Menu\MenuControl;
use Nette\Database\SelectionFactory;

final class PageRepository extends BaseRepository {

    /**
     * @var MenuControl 
     */
    private $menu;

    public function __construct(SelectionFactory $connection, MenuControl $menu) {
        parent::__construct($connection);
        $this->menu = $menu;
    }

    public function getPage($id) {
        return $this->table()->get($id);
    }

    public function getPages() {
        return $this->table()->fetchAll();
    }

    public function addPage(array $data) {
        $data['node']['link'] = ':Front:Page:view';
        $data['node']['link_admin'] = ':Admin:Page:Page:Edit';
        $node = $this->menu->insert($data['node']);
        $data['page']['node_id'] = $node->id;
        $page = $this->table()->insert($data['page']);
        $this->menu->update($node, array('link_id' => $page->id));
        return $page;
    }

    public function editPage($page, array $data) {
        $this->menu->update($page->node, $data['node']);
        return $page->update($data['page']);
    }

    public function removePage($page) {
        if ($this->menu->remove($page->node)) {
            return $page->delete();
        }
    }

}
