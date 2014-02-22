<?php

namespace WebEdit;

use Nette\Object;

abstract class Repository extends Object {

    protected $name;

    public function __construct() {
        $this->name = $this->getName();
    }

    protected function getName() {
        $reflection = $this->getReflection();
        $namespace = $reflection->getNameSpaceName();
        preg_match('#^[\w]+\\\\(?<table>[\w\\\\]+)$#', $namespace, $matches);
        return str_replace('\\', '_', strtolower($matches['table']));
    }

}
