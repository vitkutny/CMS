<?php

namespace CMS\Menu\Form;

use CMS\Form\FormContainer;

class NodeFormContainer extends FormContainer {

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
