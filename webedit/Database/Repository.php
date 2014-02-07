<?php

namespace WebEdit\Database;

use WebEdit\Model;
use Nette\Database\Context;

abstract class Repository extends Model\Repository {

    private $context;
    protected $table;

    public function __construct(Context $context) {
        $this->context = $context;
        if (!$this->table) {
            throw new Model\Exception('Table name is not specified.');
        }
    }

    protected function table($name = NULL) {
        if (!$name) {
            $name = $this->table;
        }
        return $this->context->table($name);
    }

    public function insert(array $data) {
        return $this->table()->insert($data);
    }

    public function update($selection, array $data) {
        return $selection->update($data);
    }

    public function remove($selection) {
        return $selection->delete();
    }

}
