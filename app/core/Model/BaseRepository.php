<?php

namespace CMS\Model;

use Nette;
use Nette\Database\SelectionFactory;
use Nette\Database\Table;

abstract class BaseRepository extends Nette\Object {

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
            return $this->connection->table(lcfirst($m[1]));
        }
    }

}
