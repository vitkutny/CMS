<?php

namespace CMS\Admin\Menu\Form;

use Nette\Forms\Container;
use Nette\Database\Table\ActiveRow;

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
