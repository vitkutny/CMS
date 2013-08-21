<?php

namespace CMS\Model;

use Nette\Database\Table;
use Nette\Database\SelectionFactory;
use CMS\Component\Menu\MenuControl;

final class PageRepository extends BaseRepository {

    /**
     * @var MenuControl 
     */
    private $menu;

    public function __construct(SelectionFactory $db, MenuControl $menu) {
        parent::__construct($db);
        $this->menu = $menu;
    }

    /**
     * 
     * @param int $id
     * @return Table\ActiveRow
     */
    public function getPage($id) {
        return $this->table()->get($id);
    }

    /**
     * 
     * @return Table\Selection
     */
    public function getPages() {
        return $this->table();
    }

    /**
     * 
     * @param array $data
     * @return Table\ActiveRow
     */
    public function addPage(array $data) {
        $node = $this->menu->insert('front', $data['title'], ':Front:Page:view');
        unset($data['title']);
        $data['node_id'] = $node->id;
        $page = $this->table()->insert($data);
        $this->menu->update($node, array('link_id' => $page->id));
        return $page;
    }

    /**
     * 
     * @param Table\ActiveRow $page
     * @param array $data
     * @return Table\ActiveRow
     */
    public function editPage($page, array $data) {
        return $page->update($data);
    }

    /**
     * 
     * @param Table\ActiveRow $page
     * @return boolean
     */
    public function removePage($page) {
        if ($this->menu->remove($page->node)) {
            return $page->delete();
        } else {
            return false;
        }
    }

}