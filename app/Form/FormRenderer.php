<?php

namespace CMS\Form;

use Nette\Forms\Rendering\DefaultFormRenderer;
use Nette\Forms\Form;

class FormRenderer extends DefaultFormRenderer {

    public function __construct() {
        $this->wrappers['controls']['container'] = NULL;
        $this->wrappers['pair']['container'] = 'div class=form-group';
        $this->wrappers['pair']['.error'] = 'has-error';
        $this->wrappers['control']['container'] = 'div class=col-sm-9';
        $this->wrappers['label']['container'] = 'div class="col-sm-3 control-label"';
        $this->wrappers['control']['description'] = 'span class=help-block';
        $this->wrappers['control']['errorcontainer'] = 'span class=help-block';
    }

    public function render(Form $form) {
        $form->getElementPrototype()->class('form-horizontal');
        return parent::render($form);
    }

}
