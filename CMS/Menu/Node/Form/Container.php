<?php

namespace CMS\Menu\Node\Form;

use CMS\Form;

class Container extends Form\Container {

    public function __construct($data, $node = NULL) {
        $this->addText('title', 'menu.admin.node.form.title.label')->setRequired();
        if ($data) {
            $this->addSelect('node_id', 'menu.admin.node.form.parent.label', $data)->setRequired();
        }
        if ($node) {
            $this->setDefaults($node);
        }
    }

}
