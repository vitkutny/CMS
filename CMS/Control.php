<?php

namespace CMS;

use Nette\Application\UI;

abstract class Control extends UI\Control {

    public function __construct() {
        parent::__construct();
    }

    protected function createTemplate($class = NULL) {
        $template = parent::createTemplate($class);
        $template->registerHelperLoader(callback($this->presenter->translator->createTemplateHelpers(), 'loader'));
        return $template;
    }

}
