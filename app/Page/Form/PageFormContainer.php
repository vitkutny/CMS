<?php

namespace CMS\Page\Form;

use CMS\Form\FormContainer;

class PageFormContainer extends FormContainer {

    public function __construct($page = NULL) {
        $this->addTextArea('content', 'page.form.content')->setRequired();
        if ($page) {
            $this->setDefaults($page);
        }
    }

}
