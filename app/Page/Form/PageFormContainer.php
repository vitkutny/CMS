<?php

namespace CMS\Page\Form;

use CMS\Form\FormContainer;

class PageFormContainer extends FormContainer {

    public function __construct($page = NULL) {
        $this->addTextArea('content', 'Content')->setRequired();
        if ($page) {
            $this->setDefaults($page);
        }
    }

}
