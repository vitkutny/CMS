<?php

namespace CMS\Database;

use Nette\Object,
    Nette\Database\Context;
use CMS\Model;

abstract class Repository extends Object {

    private $context;
    protected $table;

    public function __construct(Context $context) {
        $this->context = $context;
        if (!$this->table) {
            throw new Exception('Table name is not specified.');
        }
    }

    protected function table($name = NULL) {
        if (!$name) {
            $name = $this->table;
        }
        return $this->context->table($name);
    }

    public function getOne($where) {
        if (is_array($where)) {
            return $this->table()->where($where)->fetch();
        } else {
            return $this->table()->get($where);
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

    public function getAll($where = NULL, $order = NULL, $fetch = TRUE) {
        $selection = $this->getSelection($where, $order);
        if ($fetch) {
            return $selection->fetchAll();
        } else {
            return $selection;
        }
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
            if ($value === "") {
                $data[$key] = NULL; //TODO: temp fix
            }
        }
        return $this->table()->insert($data);
    }

    public function update($selection, array $data) {
        foreach ($data as $key => $value) {
            if ($value === "") {
                $data[$key] = NULL; //TODO: temp fix
            }
        }
        return $selection->update($data);
    }

    public function remove($selection) {
        return $selection->delete();
    }

}
