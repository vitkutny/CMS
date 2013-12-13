<?php

namespace CMS\Model;

use Nette;
use Nette\Database\SelectionFactory;
use Nette\Database\Context;
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
    public function __construct(Context $db) {
        $this->connection = $db;
        if (!$this->name) {
            preg_match('#(\w+)Repository$#', get_class($this), $m);
            $this->name = trim(strtolower(preg_replace('/([A-Z])/', '_$1', $m[1])), '_');
        }
    }

    /**
     * @param string|null $name
     * @return Table\Selection
     */
    protected function table($name = NULL) {
        if (!$name) {
            $name = $this->name;
        }
        return $this->connection->table($name);
    }

    public function getOne($where) {
        if (is_numeric($where)) {
            return $this->table()->get($where);
        } else {
            return $this->table()->where($where)->fetch();
        }
    }

    protected function getSelection($where = NULL, $order = NULL, $selection = NULL) {
        if (!$selection) {
            $selection = $this->table();
        }
        if ($where) {
            $selection->where($where);
        }
        if ($order) {
            if (is_array($order)) {
                foreach ($order as $column) {
                    $selection->order($column);
                }
            } else {
                $selection->order($order);
            }
        }
        return $selection;
    }

    public function getAll($where = NULL, $order = NULL) {
        return $this->getSelection($where, $order)->fetchAll();
    }

    public function getRelated($row, $related, $order = NULL, $fetch = TRUE) {
        $selection = $this->getSelection(NULL, $order, $row->related($related));
        if ($fetch) {
            return $selection->fetchAll();
        } else {
            return $selection;
        }
    }

    public function getPairs($key, $value = NULL, $selection = NULL) {
        if (!$selection) {
            $selection = $this->getSelection();
        }
        return $selection->fetchPairs($key, $value);
    }

    public function insert(array $data) {
        foreach ($data as $key => $value) {
            if (!$value) {
                $data[$key] = NULL; //TODO: temp fix
            }
        }
        return $this->table()->insert($data);
    }

    public function update($selection, array $data) {
        foreach ($data as $key => $value) {
            if (!$value) {
                $data[$key] = NULL; //TODO: temp fix
            }
        }
        return $selection->update($data);
    }

    public function remove($selection) {
        return $selection->delete();
    }

}
