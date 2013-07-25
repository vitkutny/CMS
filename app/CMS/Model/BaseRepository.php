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

    /**
     * 
     * @param SelectionFactory $db
     */
    public function __construct(SelectionFactory $db) {
        $this->connection = $db;
    }

    /**
     * @param null $name
     * @return Table\Selection
     */
    protected function table($name = null) {
        if ($name) {
            return $this->connection->table($name);
        } else {
            preg_match('#(\w+)Repository$#', get_class($this), $m);
            return $this->connection->table(lcfirst($m[1]));
        }
    }

}