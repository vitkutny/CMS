<?php

namespace WebEdit\Page\Form;

use WebEdit\Form;

class Container extends Form\Container {

    public function __construct($page = NULL) {
        $this->addTextArea('content', 'webedit.admin.page.form.content.label')->setRequired();
        if ($page) {
            $this->setDefaults($page);
        }
    }

}
