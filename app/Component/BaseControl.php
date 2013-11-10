<?php

namespace CMS\Component;

use Nette\Application\UI\Control;

abstract class BaseControl extends Control {

    /**
     * @inject
     * @var \Kdyby\Translation\Translator
     */
    public $translator;

    public function __construct() {
        parent::__construct();
    }

    protected function createTemplate($class = NULL) {
        $template = parent::createTemplate($class);
        $template->registerHelperLoader(callback($this->translator->createTemplateHelpers(), 'loader'));

        return $template;
    }

}
