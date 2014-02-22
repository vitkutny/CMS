<?php

namespace WebEdit\Session;

use WebEdit;
use Nette\Http\Session;

abstract class Repository extends WebEdit\Repository {

    private $session;
    private $storages = array();
    protected $storage;

    public function __construct(Session $session) {
        parent::__construct();
        $this->session = $session;
        $this->storage = $this->storage($this->name);
    }

    protected function storage($name) {
        if (!isset($this->storages[$name])) {
            $this->storages[$name] = $this->session->getSection($name);
        }
        return $this->storages[$name];
    }

}
