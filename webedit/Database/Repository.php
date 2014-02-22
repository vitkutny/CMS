<?php

namespace WebEdit\Database;

use WebEdit;
use Nette\Database\Context;

abstract class Repository extends WebEdit\Repository {

    private $context;

    public function __construct(Context $context) {
        parent::__construct();
        $this->context = $context;
    }

    protected function storage($name = NULL) {
        if (!$name) {
            $name = $this->name;
        }
        return $this->context->table($name);
    }

    public function tempFix(&$data) { //TODO
        array_walk_recursive($data, function($item, $key) use (&$data) {
            if ($item === '') {
                $data[$key] = NULL;
            }
        });
    }

    public function insert(array $data) {
        $this->tempFix($data);
        return $this->storage()->insert($data);
    }

    public function update($selection, array $data) {
        $this->tempFix($data);
        return $selection->update($data);
    }

    public function remove($selection) {
        return $selection->delete();
    }

}
