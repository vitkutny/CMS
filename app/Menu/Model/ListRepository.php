<?php

namespace CMS\Menu\Model;

use CMS\Model\BaseRepository as Repository;
use Nette\Database\Table;

class ListRepository extends Repository {

    /**
     * 
     * @param int $id
     * @return Table\ActiveRow
     */
    public function getList($id) {
        return $this->table()->where('id', $id)->fetch();
    }

    /**
     * 
     * @param string $type
     * @return Table\ActiveRow
     */
    public function getListByType($type) {
        return $this->table()->where('type', $type)->fetch();
    }

    /**
     * 
     * @return Table\Selection
     */
    public function getLists() {
        return $this->table();
    }

}