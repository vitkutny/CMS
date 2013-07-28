<?php

namespace CMS\Page\Model;

use CMS\Model\BaseRepository as Repository;
use Nette\Database\SelectionFactory;
use Nette\Database\Table;
use Nette\Utils\Strings;
use CMS\Menu\Component\MenuFactory;
use CMS\Menu\Component\MenuControl;

class PageRepository extends Repository {

    /**
     *
     * @var MenuControl
     */
    private $menu;

    /**
     * 
     * @param Database $db
     * @param NodeRepository $menu
     */
    public function __construct(SelectionFactory $db, MenuFactory $menu) {
        parent::__construct($db);
        $this->menu = $menu->create();
    }

    /**
     * 
     * @param int $id
     * @return Table\ActiveRow
     */
    public function getPage($id) {
        return $this->table()->where('id', $id)->fetch();
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
        $node = $this->menu->insert('front', $data['title'], ':Page:Page:view');
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

    /**
     * 
     * @param string $title
     * @return int
     */
    public function filterIn($title) {
        $id = substr($title, strrpos($title, '/') + 1);
        return $id;
    }

    /**
     * 
     * @param int $id
     * @return string
     */
    public function filterOut($id) {
        $page = $this->getPage($id);
        return Strings::webalize($page->node->title) . '/' . $id;
    }

}