<?php

namespace WebEdit;

use Nette\Application\UI;

abstract class Control extends UI\Control {

    protected function createTemplate($class = NULL) {
        $template = parent::createTemplate($class);
        $template->registerHelperLoader(callback($this->presenter->translator->createTemplateHelpers(), 'loader'));
        return $template;
    }

}
