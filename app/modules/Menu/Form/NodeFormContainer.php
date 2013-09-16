<?php

namespace CMS\Menu\Form;

use Nette\Forms\Container;

class NodeFormContainer extends Container {

    public function __construct($data, $node = NULL) {
        $this->addText('title', 'Title')->setRequired();
        if ($data) {
            $this->addSelect('node_id', 'Parent node', $data)->setRequired();
        }
        if ($node) {
            $this->setDefaults($node);
        }
    }

}
