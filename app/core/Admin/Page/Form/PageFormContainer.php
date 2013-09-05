<?php

namespace CMS\Admin\Page\Form;

use Nette\Forms\Container;
use Nette\Database\Table\ActiveRow;

class PageFormContainer extends Container {

    /**
     * @param ActiveRow|NULL $page
     */
    public function __construct($page = NULL) {
        $this->addTextArea('content', 'Content')->setRequired();
        if ($page) {
            $this->setDefaults($page);
        }
    }

}
