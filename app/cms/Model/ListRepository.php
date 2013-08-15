<?php

namespace CMS\Model;

use Nette\Database\Table;

final class ListRepository extends BaseRepository {

    /**
     * @param int $id
     * @return Table\ActiveRow
     */
    public function getList($id) {
        return $this->table()->get($id);
    }

    /**
     * @param string $type
     * @return Table\ActiveRow
     */
    public function getListByType($type) {
        return $this->table()->where('type', $type)->fetch();
    }

    /**
     * @return Table\Selection
     */
    public function getAllLists() {
        return $this->table();
    }

}