<?php

namespace CMS\Model;

use Nette;
use Nette\Database\SelectionFactory;
use Nette\Database\Table;

abstract class DatabaseRepository extends Nette\Object {

    /**
     * @var SelectionFactory
     */
    private $connection;
    protected $name;

    /**
     * @param SelectionFactory $db
     */
    public function __construct(SelectionFactory $db) {
        $this->connection = $db;
    }

    /**
     * @param string|null $name
     * @return Table\Selection
     */
    protected function table($name = NULL) {
        if ($name) {
            return $this->connection->table($name);
        } elseif ($this->name) {
            return $this->connection->table($this->name);
        } else {
            preg_match('#(\w+)Repository$#', get_class($this), $m);
            $name = trim(strtolower(preg_replace('/([A-Z])/', '_$1', $m[1])), '_');
            return $this->connection->table($name);
        }
    }

    public function insert(array $data) {
        return $this->table()->insert($data);
    }

    public function update($row, array $data) {
        return $row->update($data);
    }

    public function remove($row) {
        return $row->delete();
    }

}
