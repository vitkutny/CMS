<?php

namespace CMS\Page\Form;

use CMS\Form;

class Container extends Form\Container {

    public function __construct($page = NULL) {
        $this->addTextArea('content', 'cms.admin.page.form.content.label')->setRequired();
        if ($page) {
            $this->setDefaults($page);
        }
    }

}
