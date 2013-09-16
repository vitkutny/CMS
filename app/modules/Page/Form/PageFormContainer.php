<?php

namespace CMS\Page\Form;

use Nette\Forms\Container;

class PageFormContainer extends Container {

    public function __construct($page = NULL) {
        $this->addTextArea('content', 'Content')->setRequired();
        if ($page) {
            $this->setDefaults($page);
        }
    }

}
